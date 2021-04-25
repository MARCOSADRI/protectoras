<?php

namespace App\Form;

use App\Entity\Animales;
use PhpParser\Builder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
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