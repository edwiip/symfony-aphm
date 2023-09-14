<?php

namespace App\Form;

use App\Entity\Utilisateur;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UtilisateurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Votre nom de famille', 'required' => true])
            ->add('prenom', TextType::class, ['label' => "Votre prénom", 'required' => true])
            ->add('telephone', TelType::class, ['label' => "voytre numéro de téléphone", 'required' => true])
            ->add('email', EmailType::class, ['label' => "Indiquez une adresse email valide", 'required' => true])
            ->add('piecejointe', FileType::class, [
                'mapped' => false,
                'label' => "Ajouter mon CV"
            ])
            ->add('message', TextareaType::class)
            ->add('service')
            ->add('submit', SubmitType::class, [
                'label' => "envoyer"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
