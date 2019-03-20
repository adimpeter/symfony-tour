<?php
/**
 * Created by PhpStorm.
 * User: ADIM
 * Date: 19/03/2019
 * Time: 8:31 PM
 */

namespace App\Form;


use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TaskType extends AbstractType{
    public function buildForm (FormBuilderInterface $builder, array $options){
        $builder->add('task', TextType::class)
                ->add('dueDate', DateType::class)
                ->add('agreeTerms', CheckboxType::class, ['mapped' => false,])
                ->add('save', SubmitType::class,['label' => 'Create Task'])
                ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}