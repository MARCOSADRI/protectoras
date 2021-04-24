<?php

namespace App\Form;

use App\Entity\Animales;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use function PHPSTORM_META\type;

class AnimalesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('especie')
            ->add('raza')
            ->add('tamano')
            ->add('sexo')
            ->add('edad')
            ->add('nombreA')
            /* ->add('Adoptador') */
            ->add('ficha')/* AUTOMÁTICO */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animales::class,
        ]);
    }
}
