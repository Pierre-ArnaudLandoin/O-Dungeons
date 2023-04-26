<?php

namespace App\Controller\Admin;

use App\Entity\Background;
use App\Form\BackgroundType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/historique')]
class BackgroundController extends AbstractController
{
    #[Route(path: '/', name: 'app_admin_background_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $backgrounds = $entityManager
            ->getRepository(Background::class)
            ->findAll();

        return $this->render('admin/background/index.html.twig', [
            'backgrounds' => $backgrounds,
            'controller' => 'BackgroundController',
        ]);
    }

    #[Route(path: '/ajouter', name: 'app_admin_background_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $background = new Background();
        $form = $this->createForm(BackgroundType::class, $background);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($background);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_background_show', ['id' => $background->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/background/new.html.twig', [
            'background' => $background,
            'form' => $form,
            'controller' => 'BackgroundController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_background_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(Background $background): Response
    {
        return $this->render('admin/background/show.html.twig', [
            'background' => $background,
            'controller' => 'BackgroundController',
        ]);
    }

    #[Route(path: '/{id}/modifier', name: 'app_admin_background_edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(Request $request, Background $background, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BackgroundType::class, $background);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_background_index', ['id' => $background->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/background/edit.html.twig', [
            'background' => $background,
            'form' => $form,
            'controller' => 'BackgroundController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_background_delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Background $background, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$background->getId(), $request->request->get('_token'))) {
            $entityManager->remove($background);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_background_index', [], Response::HTTP_SEE_OTHER);
    }
}
