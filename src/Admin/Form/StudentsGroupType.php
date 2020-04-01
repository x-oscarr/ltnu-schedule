<?php

namespace App\Admin\Form;

use App\Entity\StudentsGroup;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentsGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'label' => 'Назва',
            'attr' => [
                'class' => 'form-control col-md-4'
            ],
            'label_attr' => [
                'class' => 'col-sm-2 col-form-label',
            ]
        ]);
        $builder->add('course', NumberType::class, [
            'label' => 'Курс',
            'attr' => [
                'class' => 'form-control col-md-4'
            ],
            'label_attr' => [
                'class' => 'col-sm-2 col-form-label',
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StudentsGroup::class,
        ]);
    }
}
