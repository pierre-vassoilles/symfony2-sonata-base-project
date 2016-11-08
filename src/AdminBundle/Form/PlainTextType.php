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

class PlainTextType extends AbstractType
{

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);

        $view->vars['raw'] = (bool)$options['raw'];
        $view->vars['property'] = (isset($options['property']) ? $options['property'] : false);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefaults(array(
                'disabled' => true,
                'required' => false,
                'raw'      => false,
            ))
        ;

        $resolver->setDefined(array(
            'property',
        ));
    }

    public function getName()
    {
        return 'plain_text';
    }

}