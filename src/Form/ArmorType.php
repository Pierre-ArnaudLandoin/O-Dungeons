<?php

namespace App\Form;

use App\Entity\Armor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArmorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('armorType', ChoiceType::class, [
                'label' => "Type d'armure",
                'choices' => [
                    'Armures légères' => 'Armures légères',
                    'Armures intermédiaires' => 'Armures intermédiaires',
                    'Armures lourdes' => 'Armures lourdes',
                    'Boucliers' => 'Boucliers',
                ],
            ])
            ->add('armorClass', TextType::class, [
                'label' => "Classe d'armure",
            ])
            ->add('strength', IntegerType::class, [
                'label' => 'Force',
            ])
            ->add('discretion', ChoiceType::class, [
                'label' => 'Discrétion',
                'choices' => [
                    'Nulle' => null,
                    'Désavantage' => 'Désavantage',
                ],
            ])
            ->add('weight', NumberType::class, [
                'label' => 'Poids',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Armor::class,
        ]);
    }
}
