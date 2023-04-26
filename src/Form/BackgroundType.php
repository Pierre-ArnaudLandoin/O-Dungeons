<?php

namespace App\Form;

use App\Entity\Background;
use App\Entity\Item;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BackgroundType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Le nom de l\'historique',
            ])
            ->add('capacities', TextType::class, [
                'label' => 'Les capacités de l\'historique',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'La description de l\'historique',
            ])
            ->add('nbLanguage', IntegerType::class, [
                'label' => 'Le nombre de language que l\'historique permet d\'apprendre',
            ])
            ->add('nbGolds', IntegerType::class, [
                'label' => 'Le nombre de pièce d\'or de départ',
            ])
            ->add('items', EntityType::class, [
                'class' => Item::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Background::class,
        ]);
    }
}
