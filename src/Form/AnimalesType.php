<?php

namespace App\Form;

use App\Entity\Animales;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('especie', ChoiceType::class,  array(               
                'choices'  => array(
                    'Perro' => 'Perro',
                    'Gato' => 'Gato',
                    'Roedores/Varios' => 'Otros',
                )))
            /* ->add('especie', ChoiceType::class, [
                'choices' => [
                    new Animales('Cat1'),
                ],        
                // "especie" is a property path, meaning Symfony will look for a public
                // property or a public method like "getEspecie()" to define the input
                // string value that will be submitted by the form
                'choice_value' => "especie",
                // a callback to return the label for a given choice
                // if a placeholder is used, its empty value (null) may be passed but
                // its label is defined by its own "placeholder" option
                'choice_label' => function(?Animales $animales) {
                    return $animales ? strtoupper($animales->getEspecie()) : 'Falta';
                },
                // returns the html attributes for each option input (may be radio/checkbox)
                'choice_attr' => function(?Animales $animales) {
                    return $animales ? ['class' => 'Animales_'.strtolower($animales->getEspecie())] : [];
                },
                // every option can use a string property path or any callable that get
                // passed each choice as argument, but it may not be needed
                'group_by' => function() {
                    // randomly assign things into 2 groups
                    return rand(0, 1) == 1 ? 'Group A' : 'Group B';
                },
                // a callback to return whether a Animales is preferred
                'preferred_choices' => function(?Animales $animales) {
                    return $animales && 100 < $animales->getEspecie();
                },
            ]) */




            ->add('raza')
            ->add('tamano', ChoiceType::class,  array(
                'choices'  => array(
                    'Pequeño' => 'Pequeño',
                    'Mediano' => 'Mediano',
                    'Grande' => 'Grande',
                )))
            ->add('sexo', ChoiceType::class,  array(  
                'choices'  => array(
                    'Macho' => 'Macho',
                    'Hembra' => 'Hembra',
                )))
            ->add('edad')
            ->add('nombreA',TextType::class,['label' => 'Nombre: '])
            /* ->add('Adoptador') */
            /*  ->add('ficha', FichaType::class,['label' => 'FICHA: ']) */
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animales::class,
        ]);
    }
}