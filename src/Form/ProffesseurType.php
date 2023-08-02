<?php

namespace App\Form;

use App\Entity\Proffesseur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProffesseurType extends RegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);
            $builder
            ->remove('type')
            ->remove('fonction')
            ->remove('agreeTerms')
            ->remove('confirmPassword')
            ->add('security',PasswordType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
                'mapped' => false,
            ])
            ->add('nom', TextType::class, [
                'label' => 'LastName*',
                'required'=> true,
            ])
            ->add('prenom', TextType::class, [
                'label' => 'FirstName*',
                'required'=> true,
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Male' => 'Masculin',
                    'Female' =>  'Feminin',
                    
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('dateNaissance', DateType::class, [
                'label' => 'Birthday*',
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
                'years' => range(1980, date('Y')),
            ])
            ->add('lieuNaissance', TextType::class, [
                'label' => 'Birth Place*',
                'required'=> true,
            ])
            ->add('numero',TextType::class, [
                'label' => 'Number*',
                'required'=> true,
            ])
            ->add('adress',TextType::class, [
                'label' => 'Adress*',
                'required'=> true,
            ])
            ->add('diplome', ChoiceType::class, [
                'choices' => [
                    'BTS' => 'BTS',
                    'License' => 'License',
                    'Master' => 'Master',
                    'Doctorat' => 'Doctorat',
                    // Ajoutez d'autres pays selon vos besoins
                ],
                'label' => 'Diploma*',
                'required' => true,
            ])
            ->add('Domaine', TextType::class, [
                'label' => 'Domain*',
                'required'=> true,
            ])
            ->add('Description', TextareaType::class , [
                'label' => 'Description*',
                'required'=> true,
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proffesseur::class,
        ]);
    }
}
