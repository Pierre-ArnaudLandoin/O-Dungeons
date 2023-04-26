<?php

namespace App\Form;

use App\Entity\Race;
use App\Entity\Subrace;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubraceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la sous-race',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description complète de la sous-race',
            ])
            ->add('imageUrl', UrlType::class, [
                'label' => "Lien de l'image de la sous-race",
            ])
            ->add('strength', IntegerType::class, [
                'label' => 'Bonus de force octroyé par la race et la sous-race',
            ])
            ->add('dexterity', IntegerType::class, [
                'label' => 'Bonus de dextérité octroyé par la race et la sous-race',
            ])
            ->add('constitution', IntegerType::class, [
                'label' => 'Bonus de constitution octroyé par la race et la sous-race',
            ])
            ->add('wisdom', IntegerType::class, [
                'label' => 'Bonus de sagesse octroyé par la race et la sous-race',
            ])
            ->add('intelligence', IntegerType::class, [
                'label' => "Bonus d'intelligence octroyé par la race et la sous-race",
            ])
            ->add('charisma', IntegerType::class, [
                'label' => 'Bonus de charisme octroyé par la race et la sous-race',
            ])
            ->add('trait', TextareaType::class, [
                'label' => 'Traits liés à la sous-race',
            ])
            ->add('race', EntityType::class, [
                'class' => Race::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Sauvegarder',
                'attr' => ['class' => 'btn-success'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Subrace::class,
        ]);
    }
}
