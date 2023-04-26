<?php

namespace App\Controller\Api;

use App\Entity\Race;
use App\Entity\Subrace;
use App\Repository\RaceRepository;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @OA\Tag(name="O'Dungeons Api: Races")
 *
 * @Security(name=null)
 */
#[Route(path: '/api/races', name: 'app_api_races_')]
class RaceController extends AbstractController
{
    /**
     * @OA\Response(
     *     response=200,
     *     description="Returns races list",
     *
     *     @OA\JsonContent(
     *        type="array",
     *
     *        @OA\Items(ref=@Model(type=Race::class, groups={"browse_race"}))
     *     )
     * )
     */
    #[Route(path: '', name: 'browse', methods: ['GET'])]
    public function browse(RaceRepository $raceRepo): JsonResponse
    {
        $races = $raceRepo->findAll();

        return $this->json(
            $races,
            Response::HTTP_OK,
            [],
            ['groups' => 'browse_race']
        );
    }

    /**
     * Récupère la classe avec cette id.
     *
     * @OA\Response(
     *     response=200,
     *     description="Returns one race by id",
     *
     *     @Model(type=Race::class, groups={"read_race"})
     *     )
     * )
     */
    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(Race $race = null): JsonResponse
    {
        if ($race === null) {
            return $this->json("La race demandée n'a pas été trouvée", Response::HTTP_NOT_FOUND);
        }

        return $this->json($race, Response::HTTP_OK, [], ['groups' => 'read_race']);
    }

    /**
     * Récupère toutes les sous-races d'une race.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne toutes les sous-races de la classe demandée",
     *
     *      @OA\JsonContent(
     *          type="array",
     *
     *          @OA\Items(ref=@Model(type=Subrace::class, groups={"browse_subraces"}))
     *      )
     * )
     */
    #[Route(path: '/{id}/subraces', name: 'readSubraces', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function readSubraces(Race $race = null): JsonResponse
    {
        if ($race === null) {
            return $this->json("La race demandée n'a pas été trouvée", Response::HTTP_NOT_FOUND);
        }

        $subraces = $race->getSubraces();

        return $this->json($subraces, Response::HTTP_OK, [], ['groups' => 'browse_subraces']);
    }

    /**
     * Récupère deux races au hasard.
     *
     * @OA\Response(
     *      response=200,
     *      description="Retourne deux races au hasard",
     *
     *      @OA\JsonContent(
     *          type="array",
     *
     *          @OA\Items(ref=@Model(type=Race::class, groups={"browse_race"}))
     *      )
     * )
     */
    #[Route(path: '/random', name: 'random_one', methods: ['GET'])]
    public function randomTwo(RaceRepository $raceRepo): JsonResponse
    {
        $race = $raceRepo->findRandomTwo();

        return $this->json($race, Response::HTTP_OK, [], ['groups' => 'browse_race']);
    }
}
