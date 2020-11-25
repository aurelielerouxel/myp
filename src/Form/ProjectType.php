<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project_name'
            // [
            //     'label' => 'Nom de votre projet'
            // ]
            )
            ->add('project_description')
            // ->add('project_creation_date') Mettre (new \DateTime('now') dans le controller
            ->add('project_deadline')
            ->add('project_status')
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
