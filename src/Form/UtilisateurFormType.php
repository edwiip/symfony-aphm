<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UtilisateurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'label' => "Votre nom",
                'required' => true
            ])
            ->add('prenom', null, [
                'label' => "Votre prénom",
                'required' => true
            ])
            ->add('telephone', null, [
                'label' => "voytre numéro de téléphone",
                'required' => true
            ])
            ->add('email', null, [
                'label' => "Indiquez une adresse email valide",
                'required' => true
            ])
            ->add('piecejointe', null, [
                'label' => "Ajouter mon CV"
            ])
            ->add('message')
            ->add('service')
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
