<?php

namespace App\Form;

use App\Entity\Covoiturage;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CovoiturageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
               ->add('lieuDepart', TextType::class, [
                'label' => 'Départ',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ex: Paris'],
            ])
            ->add('lieuArrivee', TextType::class, [
                'label' => 'Arrivée',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ex: Berlin'],
            ])
            ->add('prix', MoneyType::class, [
                'label' => 'Prix',
                'currency' => 'EUR',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ex: 19.99 €'],
            ])
            ->add('vehicule', ChoiceType::class, [
                'label' => 'Véhicule',
                'choices' => [  
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ],
                'placeholder' => 'Choisissez...',
                'attr' => ['class' => 'form-control']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Covoiturage::class,
        ]);
    }
}
