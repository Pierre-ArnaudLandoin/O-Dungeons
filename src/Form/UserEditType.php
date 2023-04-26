<?php

namespace App\Form;

use App\Entity\Avatar;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre E-mail',
                'attr' => ['placeholder' => 'Saisissez votre e-mail'],
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'User' => 'ROLE_USER',
                    'Manager' => 'ROLE_MANAGER',
                    'Admin' => 'ROLE_ADMIN',
                    'Superadmin' => 'ROLE_SUPERADMIN',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Votre Nom',
                'attr' => ['placeholder' => 'Saisissez votre nom'],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Votre Prénom',
                'attr' => ['placeholder' => 'Saisissez votre prénom'],
            ])
            ->add('avatar', EntityType::class, [
                'class' => Avatar::class,
                'choice_label' => 'imageUrl',
                'documentation' => [
                    'type' => 'integer',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
