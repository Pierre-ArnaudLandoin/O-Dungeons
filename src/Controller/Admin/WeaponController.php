<?php

namespace App\Controller\Admin;

use App\Entity\Weapon;
use App\Form\WeaponType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/armes', name: 'app_admin_weapon_')]
class WeaponController extends AbstractController
{
    #[Route(path: '/', name: 'browser', methods: ['GET'])]
    public function browse(EntityManagerInterface $entityManager): Response
    {
        $weapons = $entityManager
            ->getRepository(Weapon::class)
            ->findAll()
        ;

        return $this->render('admin/weapon/index.html.twig', [
            'weapons' => $weapons,
            'controller' => 'WeaponController',
        ]);
    }

    #[Route(path: '/ajouter', name: 'add', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $weapon = new Weapon();
        $form = $this->createForm(WeaponType::class, $weapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($weapon);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_weapon_read', ['id' => $weapon->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/weapon/add.html.twig', [
            'weapon' => $weapon,
            'form' => $form,
            'controller' => 'WeaponController',
        ]);
    }

    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(Weapon $weapon): Response
    {
        return $this->render('admin/weapon/read.html.twig', [
            'weapon' => $weapon,
            'controller' => 'WeaponController',
        ]);
    }

    #[Route(path: '/{id}/modifier', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(Request $request, Weapon $weapon, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WeaponType::class, $weapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_weapon_read', ['id' => $weapon->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/weapon/edit.html.twig', [
            'weapon' => $weapon,
            'form' => $form,
            'controller' => 'WeaponController',
        ]);
    }

    #[Route(path: '/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Weapon $weapon, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$weapon->getId(), $request->request->get('_token'))) {
            $entityManager->remove($weapon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_weapon_browser', [], Response::HTTP_SEE_OTHER);
    }
}
