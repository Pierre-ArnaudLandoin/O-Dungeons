<?php

namespace App\Controller\Api;

use App\Entity\Ability;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @OA\Tag(name="O'Dungeons Api: Pouvoirs")
 *
 * @Security(name=null)
 */
#[Route(path: '/api/abilities', name: 'app_api_abilities_')]
class AbilityController extends AbstractController
{
    /**
     * Récupère le pouvoir avec cette id.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne le pouvoir demandée via l'id",
     *
     *      @Model(type=Ability::class, groups={"read_abilities"})
     * )
     */
    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(Ability $ability = null): JsonResponse
    {
        if ($ability === null) {
            return $this->json("Le pouvoir demandé n'a pas été trouvé", Response::HTTP_NOT_FOUND);
        }

        return $this->json($ability, Response::HTTP_OK, [], ['groups' => 'read_abilities']);
    }
}
