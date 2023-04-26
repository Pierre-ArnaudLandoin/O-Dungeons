<?php

namespace App\Form;

use App\Entity\Weapon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeaponType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('type', TextType::class, [
                'label' => 'Type',
            ])
            ->add('damageDice', TextType::class, [
                'label' => 'Dégâts de dés',
            ])
            ->add('damageType', TextType::class, [
                'label' => 'Type de dégâts',
            ])
            ->add('weight', NumberType::class, [
                'label' => 'Poids',
            ])
            ->add('property', TextType::class, [
                'label' => 'Propriétés',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Weapon::class,
        ]);
    }
}
