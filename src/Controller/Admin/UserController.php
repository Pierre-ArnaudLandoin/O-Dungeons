<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserAddType;
use App\Form\UserEditType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route(path: '/admin/utilisateur')]
class UserController extends AbstractController
{
    #[Route(path: '/', name: 'app_admin_user_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager
            ->getRepository(User::class)
            ->findAll()
        ;

        return $this->render('admin/user/index.html.twig', [
            'users' => $users,
            'controller' => 'UserController',
        ]);
    }

    #[Route(path: '/ajouter', name: 'app_admin_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserAddType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_user_show', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/user/new.html.twig', [
            'user' => $user,
            'form' => $form,
            'controller' => 'UserController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('admin/user/show.html.twig', [
            'user' => $user,
            'controller' => 'UserController',
        ]);
    }

    #[Route(path: '/{id}/modifier', name: 'app_admin_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_user_show', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
            'controller' => 'UserController',
        ]);
    }

    #[Route(path: '/{id}/mot-de-passe', name: 'app_admin_user_edit_password', methods: ['GET', 'POST'])]
    public function editPassword(Request $request, User $user, UserPasswordHasherInterface $hasher, EntityManagerInterface $manager, ValidatorInterface $validator): Response
    {
        $oldPassword = $request->get('password_old');
        $newPassword = $request->get('password_new');
        $passwordConfirmation = $request->get('password_new_confirmation');

        if ($request->getMethod() === 'POST' && $this->isCsrfTokenValid('password'.$user->getId(), $request->request->get('_token'))) {
            if ($hasher->isPasswordValid($user, $oldPassword) && $newPassword === $passwordConfirmation) {
                $user->setPassword($newPassword);

                $errors = $validator->validate($user);

                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        $this->addFlash(
                            'error',
                            $error->getMessage()
                        );
                    }
                } else {
                    $user->setPassword($hasher->hashPassword($user, $newPassword));
                    $manager->flush();

                    return $this->redirectToRoute('app_admin_user_show', ['id' => $user->getId()]);
                }
            } else {
                $this->addFlash(
                    'error',
                    'Mot de passe incorrecte'
                );
            }
        }

        return $this->render('admin/user/edit_password.html.twig', [
            'user' => $user,
            'controller' => 'UserController',
        ]);
    }

    #[Route(path: '/{id}', name: 'app_admin_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
