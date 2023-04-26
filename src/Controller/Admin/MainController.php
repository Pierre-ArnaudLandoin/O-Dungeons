<?php

namespace App\Controller\Admin;

use App\Repository\PlayableClassRepository;
use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/', name: 'app_admin_')]
class MainController extends AbstractController
{
    #[Route(path: '', name: 'home')]
    public function index(PlayableClassRepository $classRepo, RaceRepository $raceRepo): Response
    {
        $classes = $classRepo->findFiveLast();
        $races = $raceRepo->findFiveLast();

        return $this->render('admin/main/index.html.twig', [
            'classes' => $classes,
            'races' => $races,
            'controller' => 'MainController',
        ]);
    }
}
