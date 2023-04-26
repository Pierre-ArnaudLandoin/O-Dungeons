<?php

namespace App\Controller\Api;

use App\Entity\Subrace;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @OA\Tag(name="O'Dungeons Api: Sous-races")
 *
 * @Security(name=null)
 */
#[Route(path: '/api/subraces', name: 'app_api_subraces_')]
class SubraceController extends AbstractController
{
    /**
     * Récupère la sous-race avec cette id.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne la sous-race demandée via l'id",
     *
     *      @Model(type=Subrace::class, groups={"read_subraces"})
     * )
     */
    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(Subrace $subrace = null): JsonResponse
    {
        if ($subrace === null) {
            return $this->json("La sous-race demandée n'a pas été trouvée", Response::HTTP_NOT_FOUND);
        }

        return $this->json($subrace, Response::HTTP_OK, [], ['groups' => 'read_subraces']);
    }
}
