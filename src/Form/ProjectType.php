<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\Length;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project_name', TextType::class, ['label' => 'Nom du projet'])
            ->add('project_description', TextType::class, [
                'required' => true,
                'constraints' => [new Length(['max' => 50])],
                'label' => 'Description du projet'
                ])
            // ->add('project_creation_date') Mettre (new \DateTime('now') dans le controller
            ->add('project_deadline', DateTimeType::class, [
                'required' => true,
                'label' => 'Deadline'
                ])
            ->add('project_status', TextType::class, [
                'required' => true,
                'constraints' => [new Length(['max' => 1])],
                'label' => 'Status (O : en cours, X : terminé)'
                ])
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
