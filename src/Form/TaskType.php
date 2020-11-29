<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task_name', TextType::class, [
                'required' => true,
                'label' => 'Nom du projet'
                ])
            ->add('task_description', TextType::class, [
                'required' => true,
                'label' => 'Description du projet'
                ])
            // ->add('task_creation_date')
            ->add('task_deadline', DateTimeType::class, [
                'required' => true,
                'label' => 'Deadline'
                ])
            ->add('task_status', TextType::class, [
                'required' => true,
                'label' => 'Status (O : en cours, X : terminé)'
                ])
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
