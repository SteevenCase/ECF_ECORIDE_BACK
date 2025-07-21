<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
         $builder
        ->add('pseudo', TextType::class, [
            'label' => 'Pseudo',
            'attr' => ['class' => 'form-control', 'id' => 'pseudoInput', 'required' => true],
            'required' => true,
        ])
        ->add('email', EmailType::class, [
            'label' => 'E-mail',
            'attr' => ['class' => 'form-control', 'id' => 'mailInput', 'required' => true],
            'required' => true,
        ])
        ->add('password', PasswordType::class, [
            'label' => 'Mot de passe',
            'attr' => ['class' => 'form-control', 'id' => 'passwordInput', 'required' => true],
            'required' => true,
        ])
        ->add('confirm_password', PasswordType::class, [
            'mapped' => false,
            'label' => 'Confirmer votre mot de passe',
            'attr' => ['class' => 'form-control', 'id' => 'validationPasswordInput', 'required' => true],
            'required' => true,
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

