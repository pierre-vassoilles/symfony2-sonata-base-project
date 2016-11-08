<?php
/**
 * Created by PhpStorm.
 * User: pvassoilles
 * Date: 06/10/16
 * Time: 10:07
 */

namespace AdminBundle\Form;


use Symfony\Component\Form\AbstractType;

class JsonEditorType extends AbstractType
{

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
        return 'json_editor';
    }

    public function getName()
    {
        return 'json_editor';
    }
}