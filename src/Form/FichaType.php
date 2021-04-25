<?php

namespace App\Form;

use App\Entity\Ficha;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FichaType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
     {
        $builder
            ->add('esterilizado')
            ->add('estado')
        ;
    } 

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ficha::class,
        ]);
    }
}
