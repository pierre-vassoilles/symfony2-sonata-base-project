<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FM\ElfinderBundle\Form\Type\ElFinderType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ElFinderType.
 */
class ElFinderType extends BaseType
{

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'enable'        => true,
                'instance'      => 'form',
                'homeFolder'    => '',
            ))
            ->addAllowedTypes(array(
                'enable'        => 'bool',
                'instance'      => array('string', 'null'),
                'homeFolder'    => array('string', 'null'),
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        if (method_exists('Symfony\Component\Form\AbstractType', 'getBlockPrefix')) {
            return 'Symfony\Component\Form\Extension\Core\Type\HiddenType';
        }

        return 'hidden';
    }

    public function getBlockPrefix()
    {
        return 'elfinder';
    }

    public function getName()
    {
        return 'elfinder';
    }
}
