<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                "attr"=>[
                    "class"=> "form-control"
                ]
            ])
            ->add('marque', TextType::class, [
                "attr"=>[
                    "class"=> "form-control"
                ]
            ])
            ->add('prix', TextType::class, [
                "attr"=>[
                    "class"=> "form-control"
                ]
            ])
            ->add('description', TextareaType::class, [
                "attr"=>[
                    "class"=> "form-control"
                ]
            ])
            ->add('quantite', TextType::class, [
                "attr"=>[
                    "class"=> "form-control"
                ]
            ])        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
