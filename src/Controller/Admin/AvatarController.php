<?php

namespace App\Controller\Admin;

use App\Entity\Avatar;
use App\Form\AvatarType;
use App\Repository\AvatarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/avatars', name: 'app_admin_avatars_')]
class AvatarController extends AbstractController
{
    #[Route(path: '/', name: 'browser', methods: ['GET'])]
    public function browse(AvatarRepository $avatarRepo): Response
    {
        $avatars = $avatarRepo->findAll();

        return $this->render('admin/avatar/index.html.twig', [
            'controller' => 'AvatarController',
            'avatars' => $avatars,
        ]);
    }

    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(Avatar $avatar): Response
    {
        return $this->render('admin/avatar/read.html.twig', [
            'controller' => 'AvatarController',
            'avatar' => $avatar,
        ]);
    }

    #[Route(path: '/{id}/modifier', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(Avatar $avatar, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(AvatarType::class, $avatar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            return $this->redirectToRoute('app_admin_avatars_read', ['id' => $avatar->getId()]);
        }

        return $this->render('admin/avatar/add.html.twig', [
            'controller' => 'AvatarController',
            'title' => 'Modifier',
            'avatar' => $avatar,
            'form' => $form,
        ]);
    }

    #[Route(path: '/ajouter', name: 'add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $manager): Response
    {
        $avatar = new Avatar();

        $form = $this->createForm(AvatarType::class, $avatar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($avatar);
            $manager->flush();

            return $this->redirectToRoute('app_admin_avatars_read', ['id' => $avatar->getId()]);
        }

        return $this->render('admin/avatar/add.html.twig', [
            'controller' => 'AvatarController',
            'title' => 'Ajouter',
            'avatar' => $avatar,
            'form' => $form,
        ]);
    }

    #[Route(path: '/{id}', name: 'delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Avatar $avatar, EntityManagerInterface $manager): Response
    {
        // This is the third way to prevent users who are not granted to access this method/route
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$avatar->getId(), $request->request->get('_token'))) {
            $manager->remove($avatar);
            $manager->flush();
        }

        return $this->redirectToRoute('app_admin_avatars_browser');
    }
}
