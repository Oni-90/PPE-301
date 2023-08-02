<?php

namespace App\Form;

use App\Entity\Anne;
use App\Entity\Eleve;
use App\Entity\Classe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EleveType extends RegistrationFormType
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
                'label'=>'Confirme Password'
            ])
            ->add('classe',EntityType::class,
            [
                "class"=>Classe::class,
                "choice_label"=>"libelle",
                "label"=>'Classe'
            ])
            ->add('anne',EntityType::class,
            [
                "class"=>Anne::class,
                "choice_label"=>"code",
                "label"=>'Inscription Year',
                
            ])
            
            ->add('prenom', TextType::class, [
                'label' => 'FirstName*',
                'required'=> true,
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
            ->add('date_naissance', DateType::class, [
                'label' => 'Birthday',
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

            ->add('Adress', TextType::class , [
                'label' => 'Adress*',
                'required'=> true,
            ])
            
            ->add('description', TextareaType::class , [
                'label' => 'Description*',
                'required'=> true,
            ])


            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
