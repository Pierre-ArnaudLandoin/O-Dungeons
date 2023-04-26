<?php

namespace App\Controller\Admin;

use App\Entity\Subclass;
use App\Form\SubclassType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/sous-classe')]
class SubclassController extends AbstractController
{
    #[Route(path: '/', name: 'app_admin_subclass_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $subclasses = $entityManager
            ->getRepository(Subclass::class)
            ->findAll()
        ;

        return $this->render('admin/subclass/index.html.twig', [
            'subclasses' => $subclasses,
            'controller' => 'SubclassController',
        ]);
    }

    #[Route(path: '/ajouter', name: 'app_admin_subclass_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $subclass = new Subclass();
        $form = $this->createForm(SubclassType::class, $subclass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($subclass);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_subclass_show', ['id' => $subclass->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/subclass/new.html.twig', [
            'subclass' => $subclass,
            'form' => $form,
            'controller' => 'SubclassController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_subclass_show', methods: ['GET'])]
    public function show(Subclass $subclass): Response
    {
        return $this->render('admin/subclass/show.html.twig', [
            'subclass' => $subclass,
            'controller' => 'SubclassController',
        ]);
    }

    #[Route(path: '/{id}/modifier', name: 'app_admin_subclass_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Subclass $subclass, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SubclassType::class, $subclass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_subclass_show', ['id' => $subclass->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/subclass/edit.html.twig', [
            'subclass' => $subclass,
            'form' => $form,
            'controller' => 'SubclassController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_subclass_delete', methods: ['POST'])]
    public function delete(Request $request, Subclass $subclass, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subclass->getId(), $request->request->get('_token'))) {
            $entityManager->remove($subclass);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_subclass_index', [], Response::HTTP_SEE_OTHER);
    }
}
