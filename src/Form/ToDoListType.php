<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Categories;
use App\Entity\ToDoList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ToDoListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categorie', EntityType::class,[
                'class' => Categorie::class,'choice_label'=>'name',
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Categories ',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('title')
            ->add('status')
            ->add("imageFile",VichImageType::class ,['required' => false,
            'attr' => [
        'class' => 'btn btn-primary mt-4'
    ],
                'label' => 'image de note'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4'
                ],
                'label' => 'add'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ToDoList::class,
        ]);
    }
}
