<?php

namespace App\Controller\Admin;

use App\Entity\Race;
use App\Form\RaceType;
use App\Repository\RaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route(path: '/admin/races', name: 'app_admin_races_')]
class RaceController extends AbstractController
{
    #[Route(path: '/', name: 'browser', methods: ['GET'])]
    public function browse(RaceRepository $raceRepo): Response
    {
        $races = $raceRepo->findAll();

        return $this->render('admin/race/index.html.twig', [
            'races' => $races,
            'controller' => 'RaceController',
        ]);
    }

    #[Route(path: '/{id}', name: 'read', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function read(Race $race): Response
    {
        return $this->render('admin/race/read.html.twig', [
            'race' => $race,
            'controller' => 'RaceController',
        ]);
    }

    #[Route(path: '/{id}/modifier', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(Request $request, Race $race, EntityManagerInterface $manager, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        // Managing POST method
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form['imageFile']->getData() !== null) {
                $fileName = $slugger->slug($race->getName())->lower().'.png';
                $file = $form['imageFile']->getData();
                $file->move('asset', $fileName);

                $race->setImageUrl('asset/'.$fileName);
            }

            $manager->flush();

            return $this->redirectToRoute('app_admin_races_read', ['id' => $race->getId()]);
        }

        // Managing GET method
        return $this->renderForm('admin/race/add.html.twig', [
            'race' => $race,
            'form' => $form,
            'controller' => 'RaceController',
            'title' => 'Modifier',
        ]);
    }

    #[Route(path: '/ajouter', name: 'add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $manager, SluggerInterface $slugger): Response
    {
        $race = new Race();

        $form = $this->createForm(RaceType::class, $race);
        $form->handleRequest($request);

        // Managing POST method
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form['imageFile']->getData() === null) {
                $this->addFlash(
                    'error',
                    'Veuillez téléverser une image'
                );
            } else {
                $fileName = $slugger->slug($race->getName())->lower().'.png';
                $file = $form['imageFile']->getData();
                $file->move('asset', $fileName);

                $race->setImageUrl('asset/'.$fileName);

                $manager->persist($race);

                $manager->flush();

                return $this->redirectToRoute('app_admin_races_read', ['id' => $race->getId()]);
            }
        }

        // Managing GET method
        return $this->renderForm('admin/race/add.html.twig', [
            'race' => $race,
            'form' => $form,
            'controller' => 'RaceController',
            'title' => 'Ajouter',
        ]);
    }

    /**
     * This is one way to prevent users who are not granted to access this method/route.
     *
     * @IsGranted("ROLE_ADMIN")
     */
    #[Route(path: '/{id}', name: 'delete', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function delete(Request $request, Race $race, EntityManagerInterface $em): Response
    {
        // Pour supprimer le fichier png dans asset.
        $imageFile = $race->getImageUrl();
        if (file_exists($imageFile)) {
            unlink($imageFile);
        }

        if ($this->isCsrfTokenValid('delete'.$race->getId(), $request->request->get('_token'))) {
            $em->remove($race);
            $em->flush();
        }

        return $this->redirectToRoute('app_admin_races_browser');
    }
}
