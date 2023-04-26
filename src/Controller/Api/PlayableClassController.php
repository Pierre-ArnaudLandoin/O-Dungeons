<?php

namespace App\Controller\Api;

use App\Entity\Ability;
use App\Entity\PlayableClass;
use App\Repository\PlayableClassRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @OA\Tag(name="O'Dungeons Api: Classes")
 *
 * @Security(name=null)
 */
#[Route(path: '/api/classes', name: 'app_api_classes_')]
class PlayableClassController extends AbstractController
{
    /**
     * Récupère toutes les classes.
     *
     * @OA\Response(
     *     response=200,
     *     description="Retourne toutes les classes",
     *
     *     @OA\JsonContent(
     *        type="array",
     *
     *        @OA\Items(ref=@Model(type=PlayableClass::class, groups={"browse_class"}))
     *     )
     * )
     */
    #[Route(path: '', name: 'browse', methods: ['GET'])]
    public function browse(PlayableClassRepository $classRepo): JsonResponse
    {
        $classes = $classRepo->findAll();

        return $this->json(
            $classes,
            Response::HTTP_OK,
            [],
            ['groups' => 'browse_class']
        );
    }

    /**
     * Récupère la classe avec cette id.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne la classe demandée via l'id",
     *
     *      @Model(type=PlayableClass::class, groups={"read_class"})
     * )
     */
    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(PlayableClass $class = null): JsonResponse
    {
        if ($class === null) {
            return $this->json("La classe demandée n'a pas été trouvée", Response::HTTP_NOT_FOUND);
        }

        return $this->json($class, Response::HTTP_OK, [], ['groups' => 'read_class']);
    }

    /**
     * Récupère tous les pouvoirs d'une classe.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne tous les pouvoirs de la classe demandée",
     *
     *      @OA\JsonContent(
     *          type="array",
     *
     *          @OA\Items(ref=@Model(type=Ability::class, groups={"browse_abilities"}))
     *      )
     * )
     */
    #[Route(path: '/{id}/abilities', name: 'readAbilities', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function readAbilities(PlayableClass $class = null): JsonResponse
    {
        if ($class === null) {
            return $this->json("La classe demandé n'a pas été trouvée", Response::HTTP_NOT_FOUND);
        }

        $abilities = $class->getAbilities();

        return $this->json($abilities, Response::HTTP_OK, [], ['groups' => 'browse_abilities']);
    }

    /**
     * Récupère deux classes au hasard.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne deux classes au hasard",
     *
     *      @OA\JsonContent(
     *        type="array",
     *
     *        @OA\Items(ref=@Model(type=PlayableClass::class, groups={"browse_class"}))
     *     )
     * )
     */
    #[Route(path: '/random', name: 'random_one', methods: ['GET'])]
    public function randomTwo(PlayableClassRepository $classRepo): JsonResponse
    {
        $class = $classRepo->findRandomTwo();

        return $this->json($class, Response::HTTP_OK, [], ['groups' => 'browse_class']);
    }
}
