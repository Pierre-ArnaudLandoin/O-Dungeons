<?php

namespace App\Controller\Admin;

use App\Entity\PlayableClass;
use App\Form\PlayableClassType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route(path: '/admin/classe')]
class PlayableClassController extends AbstractController
{
    #[Route(path: '/', name: 'app_admin_playable_class_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $playableClasses = $entityManager
            ->getRepository(PlayableClass::class)
            ->findAll()
        ;

        return $this->render('admin/playable_class/index.html.twig', [
            'playable_classes' => $playableClasses,
            'controller' => 'PlayableClassController',
        ]);
    }

    #[Route(path: '/ajouter', name: 'app_admin_playable_class_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $playableClass = new PlayableClass();
        $form = $this->createForm(PlayableClassType::class, $playableClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form['imageFile']->getData() === null) {
                $this->addFlash(
                    'error',
                    'Veuillez téléverser une image'
                );
            } else {
                $fileName = $slugger->slug($playableClass->getName())->lower().'.png';
                $file = $form['imageFile']->getData();
                $file->move('asset', $fileName);
                $playableClass->setImageUrl('asset/'.$fileName);

                $entityManager->persist($playableClass);
                $entityManager->flush();

                return $this->redirectToRoute('app_admin_playable_class_show', ['id' => $playableClass->getId()], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->render('admin/playable_class/new.html.twig', [
            'playable_class' => $playableClass,
            'form' => $form,
            'controller' => 'PlayableClassController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_playable_class_show', methods: ['GET'])]
    public function show(PlayableClass $playableClass): Response
    {
        return $this->render('admin/playable_class/show.html.twig', [
            'playable_class' => $playableClass,
            'controller' => 'PlayableClassController',
        ]);
    }

    #[Route(path: '/{id}/modifier', name: 'app_admin_playable_class_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PlayableClass $playableClass, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(PlayableClassType::class, $playableClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form['imageFile']->getData() !== null) {
                $fileName = $slugger->slug($playableClass->getName())->lower().'.png';
                $file = $form['imageFile']->getData();
                $file->move('asset', $fileName);

                $playableClass->setImageUrl('asset/'.$fileName);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_playable_class_show', ['id' => $playableClass->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/playable_class/edit.html.twig', [
            'playable_class' => $playableClass,
            'form' => $form,
            'controller' => 'PlayableClassController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_playable_class_delete', methods: ['POST'])]
    public function delete(Request $request, PlayableClass $playableClass, EntityManagerInterface $entityManager): Response
    {
        $imageFile = $playableClass->getImageUrl();
        if (file_exists($imageFile)) {
            unlink($imageFile);
        }

        if ($this->isCsrfTokenValid('delete'.$playableClass->getId(), $request->request->get('_token'))) {
            $entityManager->remove($playableClass);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_playable_class_index', [], Response::HTTP_SEE_OTHER);
    }
}
