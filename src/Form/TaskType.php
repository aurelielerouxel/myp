<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task_name', TextType::class, ['label' => 'Nom du projet'])
            ->add('task_description', TextType::class, ['label' => 'Description du projet'])
            // ->add('task_creation_date')
            ->add('task_deadline', DateType::class, ['label' => 'Deadline'])
            ->add('task_status', TextType::class, ['label' => 'Status (O : en cours, X : terminé)'])
            // ->add('project')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
