<?php
/**
 * Created by PhpStorm.
 * User: pvassoilles
 * Date: 05/10/16
 * Time: 14:13
 */

namespace AdminBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlainDateType extends AbstractType
{


    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefaults(array(
                'format' => 'd/m/Y à H:i:s',
                'disabled' => true,
                'required' => false,
            ))
        ;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);
        $view->vars['format'] = $options['format'];
    }

    public function getName()
    {
        return 'plain_date';
    }

}