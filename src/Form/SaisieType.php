<?php

namespace App\Form;

use App\Entity\RequestType;
use App\Entity\Saisie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaisieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value')
            ->add('note')
            ->add('type', EntityType::class, array('class' => RequestType::class, 'choice_label' =>'value',))
            ->add('avancement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Saisie::class,
        ]);
    }
}
