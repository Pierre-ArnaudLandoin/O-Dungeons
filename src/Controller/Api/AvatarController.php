<?php

namespace App\Controller\Api;

use App\Entity\Avatar;
use App\Repository\AvatarRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @OA\Tag(name="O'Dungeons Api: Avatars")
 *
 * @Security(name=null)
 */
#[Route(path: '/api/avatars', name: 'app_api_avatars_')]
class AvatarController extends AbstractController
{
    /**
     * @OA\Response(
     *     response=200,
     *     description="Returns avatars list",
     *
     *     @OA\JsonContent(
     *        type="array",
     *
     *        @OA\Items(ref=@Model(type=Avatar::class, groups={"browse_avatars"}))
     *     )
     * )
     */
    #[Route(path: '', name: 'browse', methods: ['GET'])]
    public function browse(AvatarRepository $avatarRepo): JsonResponse
    {
        $avatars = $avatarRepo->findAll();

        return $this->json(
            $avatars,
            Response::HTTP_OK,
            [],
            ['groups' => 'browse_avatars']
        );
    }
}
