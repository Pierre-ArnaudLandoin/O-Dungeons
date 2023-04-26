<?php

namespace App\Form;

use App\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class RaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Le nom de la race',
                'attr' => ['placeholder' => 'Elfe'],
            ])
            ->add('fullDescription', TextareaType::class, [
                'label' => 'La description complète de la race',
            ])
            ->add('quickDescription', TextareaType::class, [
                'label' => 'La description rapide de la race',
            ])
            // Same explanation as the PlayableClassType
            ->add('imageFile', FileType::class, [
                'label' => "L'image de la race",
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PNG image',
                    ]),
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Sauvegarder cette race',
                'attr' => ['class' => 'btn-success'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Race::class,
        ]);
    }
}
