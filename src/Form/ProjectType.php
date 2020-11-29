<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project_name', 
            // [
            //     'label' => 'Nom du projet',
            // ]
            )
            ->add('project_description',
            // [
            //     'label' => 'Description'
            // ]
            )
            // ->add('project_creation_date') Mettre (new \DateTime('now') dans le controller
            ->add('project_deadline',
            // [
            //     'label' => 'Deadline'
            // ]
            )
            ->add('project_status',
            // [
            //     'label' => 'Status (O:en cours, X:terminé)'
            // ]
            )
            // ->add('user') Récupérer ID de l'utilisateur connecté
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
