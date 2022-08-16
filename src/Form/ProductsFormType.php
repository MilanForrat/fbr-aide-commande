<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Désignation de l'article",
                "required" => true,
                'attr' => array(
                    'placeholder' => 'Exemple : Raccord PVC D40 Mâle/Femelle'
                )
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description de l'article",
                "required" => false,
                'attr' => array(
                    'placeholder' => 'Si besoin de précisions sur l\'article...'
                )
            ])
            ->add('slug')
            ->add('prixHT',NumberType::class,
            [
                "required" => false,
                'attr' => array(
                    'placeholder' => 'Exemple : 2.45'
                )
            ])
            ->add('prixTTC',NumberType::class,
            [
                "required" => false,
                'attr' => array(
                    'placeholder' => 'Exemple : 2.95'
                )
            ])
            ->add('poids',NumberType::class,
            [
                "required" => false,
                'attr' => array(
                    'placeholder' => 'Exemple : 70 (valeur en grammes)'
                )
            ])
            ->add('categories',EntityType::class,[
                "class" => Categories::class,
                "required" => false,
            ])
            ->add('created_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // 'data_class' => Products::class,
        ]);
    }
}
