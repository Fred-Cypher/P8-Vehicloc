<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CarTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('monthly_price', NumberType::class,[
                'label' => 'Prix mensuel'
            ])
            ->add('daily_price', NumberType::class, [
                'label' => 'Prix journalier'
            ])
            ->add('places', ChoiceType::class, [
                'label' => 'Nombre de places',
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9
                ]
            ])
            ->add('gearbox', ChoiceType::class, [
                'label' => 'Boîte de vitesse',
                'choices' => [
                    'Manuelle' => true,
                    'Automatique' => false
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
