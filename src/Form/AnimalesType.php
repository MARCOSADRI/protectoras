<?php

namespace App\Form;

use App\Entity\Animales;
use App\Entity\Especies;
use App\Entity\Razas;
use App\Entity\Tamanos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        
        $builder
             ->add('especie', EntityType::class, array(
                'required' => true,
                'placeholder' => 'Selecciona Una Especie..',
                'class' => Especies::class
            ))        
            ->add('raza', EntityType::class, array(
                'required' => true,
                'placeholder' => 'Selecciona Una Raza...',
                'class' => Razas::class
            ))
            ->add('tamano', EntityType::class, array(
                'required' => true,
                'placeholder' => 'Selecciona Tamaño...',
                'class' => Tamanos::class
            ))
            ->add('nombreA', TextType::class,['label' => 'Nombre: '])
            ->add('sexo', ChoiceType::class,  array(
                'choices'  => array(
                    'Macho' => 'Macho',
                    'Hembra' => 'Hembra'
                )))
            ->add('edad')
           /*  ->add('foto', FileType::class,
                ['label' => 'Seleccione una imagen',
                'required' => false]
            ) */
            ->add('foto', FileType::class,array(
                "label" => "FOTO:",
                "attr" =>array("class" => "form-control"),
                "data_class" => null
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animales::class,
        ]);
    }
}
