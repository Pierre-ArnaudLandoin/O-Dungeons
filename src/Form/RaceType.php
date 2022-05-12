<?php

namespace App\Form;

use App\Entity\Race;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Le nom de la race",
                "attr" => ["placeholder" => "Elfe"]
            ])
            ->add('fullDescription', TextareaType::class, [
                "label" => "La description complète de la race"
            ])
            ->add('quickDescription', TextareaType::class, [
                "label" => "La description rapide de la race"
            ])
            ->add('imageUrl', UrlType::class, [
                "label" => "Le lien de l'image de la race"
            ])
            ->add('save', SubmitType::class, [
                "label" => "Sauvegarder cette race"
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