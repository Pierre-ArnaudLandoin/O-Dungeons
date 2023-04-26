<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Form\UserAddType;
use App\Form\UserEditType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @OA\Tag(name="O'Dungeons Api: Utilisateurs")
 */
#[Route(path: '/api/users', name: 'app_api_users_')]
class UserController extends AbstractController
{
    /**
     * @OA\Response(
     *      response=201,
     *      description="Retourne l'utilisateur créé avec son token JWT",
     *
     *      @Model(type=User::class, groups={"read_user"})
     * )
     *
     * @OA\RequestBody(
     *
     *      @Model(type=UserAddType::class)
     * )
     *
     * @Security(name=null)
     */
    #[Route(path: '', name: 'add', methods: ['POST'])]
    public function add(
        Request $request,
        SerializerInterface $serializer,
        EntityManagerInterface $em,
        ValidatorInterface $validator,
        UserPasswordHasherInterface $hasher,
        JWTTokenManagerInterface $JWTManager
    ): JsonResponse {
        try {
            $user = $serializer->deserialize($request->getContent(), User::class, 'json');
        } catch (Exception) {
            return $this->json(
                'JSON mal formé',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $errorList = $validator->validate($user);

        if (count($errorList) > 0) {
            return $this->json($errorList, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $plaintextPassword = $user->getPassword();
        $hashedPassword = $hasher->hashPassword(
            $user,
            $plaintextPassword
        );

        $user->setPassword($hashedPassword);

        $em->persist($user);
        $em->flush();

        return $this->json(['token' => $JWTManager->create($user), 'user' => $user], Response::HTTP_CREATED, [], ['groups' => 'read_user']);
    }

    /**
     * Récupère l'utilisateur avec son id.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne l'utilisateur demandé via l'id",
     *
     *      @Model(type=User::class, groups={"read_user"})
     * )
     */
    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(User $user = null): JsonResponse
    {
        if ($user === null) {
            return $this->json("L'utilisateur demandé n'a pas été trouvé", Response::HTTP_NOT_FOUND);
        }

        $this->denyAccessUnlessGranted('PROFIL_VIEW', $user);

        return $this->json($user, Response::HTTP_OK, [], ['groups' => 'read_user']);
    }

    /**
     * @OA\Response(
     *      response=200,
     *      description="Retourne l'utilisateur modifié",
     *
     *      @Model(type=User::class, groups={"read_user"})
     * )
     *
     * @OA\RequestBody(
     *
     *      @Model(type=UserEditType::class)
     * )
     */
    #[Route(path: '/{id}', name: 'edit', methods: ['PUT'], requirements: ['id' => '\d+'])]
    public function edit(
        Request $request,
        SerializerInterface $serializer,
        EntityManagerInterface $em,
        ValidatorInterface $validator,
        JWTTokenManagerInterface $JWTManager,
        User $user = null
    ): JsonResponse {
        if ($user === null) {
            return $this->json('Utilisateur non trouvé', Response::HTTP_NOT_FOUND);
        }

        try {
            $userNew = $serializer->deserialize($request->getContent(), User::class, 'json');
        } catch (Exception) {
            return $this->json(
                'JSON mal formé',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $user->setEmail($userNew->getEmail());
        $user->setLastName($userNew->getLastName());
        $user->setFirstName($userNew->getFirstName());
        $user->setAvatar($userNew->getAvatar());
        $errorList = $validator->validate($user);

        if (count($errorList) > 0) {
            return $this->json($errorList, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $this->denyAccessUnlessGranted('PROFIL_EDIT', $user);

        $em->flush();

        return $this->json(['token' => $JWTManager->create($user), 'user' => $user], Response::HTTP_OK, [], ['groups' => 'read_user']);
    }

    /**
     * @OA\Response(
     *      response=200,
     *      description="Retourne l'utilisateur modifié",
     *
     *      @Model(type=User::class, groups={"read_user"})
     * )
     *
     * @OA\RequestBody(
     *
     *      @OA\JsonContent(
     *          example={
     *             "oldPassword": "old",
     *             "newPassword": "new"
     *         }
     *      )
     * )
     */
    #[Route(path: '/{id}/password', name: 'editPassword', methods: ['PATCH'], requirements: ['id' => '\d+'])]
    public function editPassword(
        Request $request,
        EntityManagerInterface $em,
        ValidatorInterface $validator,
        UserPasswordHasherInterface $hasher,
        JWTTokenManagerInterface $JWTManager,
        User $user = null
    ): JsonResponse {
        if ($user === null) {
            return $this->json('Utilisateur non trouvé', Response::HTTP_NOT_FOUND);
        }

        try {
            $passwords = json_decode($request->getContent(), null, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return $this->json(
                'JSON mal formé',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        if ($hasher->isPasswordValid($user, $passwords->oldPassword)) {
            $user->setPassword($passwords->newPassword);

            $errorList = $validator->validate($user);

            if (count($errorList) > 0) {
                return $this->json($errorList, Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $hashedPassword = $hasher->hashPassword(
                $user,
                $passwords->newPassword
            );

            $user->setPassword($hashedPassword);
        } else {
            return $this->json('Invalid credentials.', Response::HTTP_UNAUTHORIZED);
        }

        $this->denyAccessUnlessGranted('PROFIL_EDIT', $user);

        $em->flush();

        return $this->json(['token' => $JWTManager->create($user), 'user' => $user], Response::HTTP_OK, [], ['groups' => 'read_user']);
    }
}
