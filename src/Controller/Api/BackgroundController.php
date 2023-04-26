<?php

namespace App\Controller\Api;

use App\Entity\Background;
use App\Repository\BackgroundRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @OA\Tag(name="O'Dungeons Api: Historiques")
 *
 * @Security(name=null)
 */
#[Route(path: '/api/backgrounds', name: 'app_api_backgrounds_')]
class BackgroundController extends AbstractController
{
    /**
     * Récupère tous les historiques.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne tous les historiques",
     *
     *      @OA\JsonContent(
     *          type="array",
     *
     *          @OA\Items(ref=@Model(type=Background::class, groups={"browse_backgrounds"}))
     *      )
     * )
     */
    #[Route(path: '', name: 'browse', methods: ['GET'])]
    public function browse(BackgroundRepository $backgroundRepository): JsonResponse
    {
        $backgrounds = $backgroundRepository->findAll();

        return $this->json($backgrounds, Response::HTTP_OK, [], ['groups' => 'browse_backgrounds']);
    }

    /**
     * @OA\Response(
     *      response=200,
     *      description="Retourne tous les historiques",
     *
     *      @Model(type=Background::class, groups={"read_backgrounds"})
     * )
     */
    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(Background $background = null): JsonResponse
    {
        if ($background === null) {
            return $this->json("L'historique demandé n'a pas été trouvé", Response::HTTP_NOT_FOUND);
        }

        return $this->json($background, Response::HTTP_OK, [], ['groups' => 'read_backgrounds']);
    }
}
