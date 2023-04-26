<?php

namespace App\Controller\Admin;

use App\Entity\Subrace;
use App\Form\SubraceType;
use App\Repository\SubraceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/sous-races/', name: 'app_admin_subraces_')]
class SubraceController extends AbstractController
{
    /**
     * Browse all subraces.
     */
    #[Route(path: '', name: 'browser')]
    public function browse(SubraceRepository $subraceRepo): Response
    {
        $subraces = $subraceRepo->findAll();

        return $this->render('admin/subrace/index.html.twig', [
            'subraces' => $subraces,
            'controller' => 'SubraceController',
        ]);
    }

    /**
     * Read one specific subrace.
     */
    #[Route(path: '{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(Subrace $subrace): Response
    {
        return $this->render('admin/subrace/read.html.twig', [
            'subrace' => $subrace,
            'controller' => 'SubraceController',
        ]);
    }

    /**
     * Edit a subrace.
     */
    #[Route(path: '{id}/modifier', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(Request $request, Subrace $subrace, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(SubraceType::class, $subrace);
        $form->handleRequest($request);

        // Managing POST method
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            return $this->redirectToRoute('app_admin_subraces_read', ['id' => $subrace->getId()]);
        }

        // Managing GET method
        return $this->render('admin/subrace/add.html.twig', [
            'subrace' => $subrace,
            'form' => $form,
            'controller' => 'SubraceController',
            'title' => 'Modifier',
        ]);
    }

    /**
     * Add a subrace.
     */
    #[Route(path: 'ajouter', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $subrace = new Subrace();

        // Form creation as an Object base on the SubraceType Form template
        $form = $this->createForm(SubraceType::class, $subrace);
        // Checks if the form has been sent (if the create button has been pressed)
        $form->handleRequest($request);

        // If yes
        // Managing POST method
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($subrace);

            $em->flush();

            return $this->redirectToRoute('app_admin_subraces_browser');
        }

        // If no, gives an empty form
        // Managing GET method
        return $this->render('admin/subrace/add.html.twig', [
            'form' => $form,
            'subrace' => $subrace,
            'controller' => 'SubraceController',
            'title' => 'Ajouter',
        ]);
    }

    /**
     * Delete a subrace.
     */
    #[Route(path: '{id}', name: 'delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Subrace $subrace, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$subrace->getId(), $request->request->get('_token'))) {
            $em->remove($subrace);
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_subraces_browser');
    }

    // $this->denyAccessUnlessGranted('ROLE_ADMIN');
}
