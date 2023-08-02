<?php

namespace App\Form;

use App\Entity\Presence;
use Symfony\Component\Form\AbstractType;
use App\Repository\ProffesseurRepository;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PresenceType extends AbstractType
{

    protected $proffesseurRepository;
    
    public function __construct(ProffesseurRepository $proffesseurRepository)
    {
        $this->proffesseurRepository = $proffesseurRepository;
    }



    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $proffesseur = $this->proffesseurRepository->findAll();
        $choices = [];
        
        foreach ($proffesseur as $proffesseur) {
            $choices[$proffesseur->getNom() . ' ' . $proffesseur->getPrenom()]=$proffesseur->getNom();$proffesseur->getPrenom(); // Changer "getNom()" selon la propriété que vous souhaitez afficher
        }
        $builder
        ->add('Present', CheckboxType::class, [
            'label' => 'Present',
            'required' => true, // Si la case à cocher est 
        ])
            ->add('HeureEntree')
            ->add('HeureSortie')
            ->add('Date')
            ->add('Proffesseur', ChoiceType::class, [
                'choices' => $choices,
                'label' => 'Teacher',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Presence::class,
        ]);
    }
}
