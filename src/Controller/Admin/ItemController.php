<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Form\ItemType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/objet')]
class ItemController extends AbstractController
{
    #[Route(path: '/', name: 'app_admin_item_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $items = $entityManager
            ->getRepository(Item::class)
            ->findAll()
        ;

        return $this->render('admin/item/index.html.twig', [
            'items' => $items,
            'controller' => 'ItemController',
        ]);
    }

    #[Route(path: '/ajouter', name: 'app_admin_item_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $item = new Item();
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($item);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_item_show', ['id' => $item->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/item/new.html.twig', [
            'item' => $item,
            'form' => $form,
            'controller' => 'ItemController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_item_show', methods: ['GET'])]
    public function show(Item $item): Response
    {
        return $this->render('admin/item/show.html.twig', [
            'item' => $item,
            'controller' => 'ItemController',
        ]);
    }

    #[Route(path: '/{id}/modifier', name: 'app_admin_item_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Item $item, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_item_show', ['id' => $item->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/item/edit.html.twig', [
            'item' => $item,
            'form' => $form,
            'controller' => 'ItemController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_item_delete', methods: ['POST'])]
    public function delete(Request $request, Item $item, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$item->getId(), $request->request->get('_token'))) {
            $entityManager->remove($item);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_item_index', [], Response::HTTP_SEE_OTHER);
    }
}
