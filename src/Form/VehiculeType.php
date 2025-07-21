<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marque', TextType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'Ex: Renault',
                    'class' => 'form-control',
                ],
            ])
            ->add('modele', TextType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'Ex: Clio',
                    'class' => 'form-control',
                ],
            ])
            ->add('couleur', TextType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'Ex: Vert',
                    'class' => 'form-control',
                ],
            ])
            ->add('immatriculation', TextType::class, [
                'label' => 'Immatriculation',
                'required' => true,
                'attr' => [
                    'placeholder' => 'EX: AB-123-CD',
                    'maxlength' => 10,
                    'class' => 'form-control',
                ],
            ])
            ->add('date_immatriculation', DateType::class, [
                'widget' => 'single_text',
                'required' => true,
                'label' => 'Date de 1ère immatriculation',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('places_disponibles', IntegerType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'EX: 4',
                    'class' => 'form-control',
                ],
            ])
            ->add('preferences', TextareaType::class, [
                'required' => true,
                'label' => 'Vos préférences pour le trajet (ex: fumeurs, animaux, musique...)',
                'attr' => [
                    'placeholder' => 'Ex: Je préfère les trajets sans animaux. Ok pour écouter de la musique.',
                    'rows' => 6,
                    'style' => 'width: 450px;',
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
