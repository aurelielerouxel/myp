<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project_name', TextType::class, ['label' => 'Nom du projet'])
            ->add('project_description', TextType::class, ['label' => 'Description du projet'])
            // ->add('project_creation_date') Mettre (new \DateTime('now') dans le controller
            ->add('project_deadline', DateType::class, ['label' => 'Deadline'])
            ->add('project_status', TextType::class, ['label' => 'Status (O : en cours, X : terminé)'])
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
