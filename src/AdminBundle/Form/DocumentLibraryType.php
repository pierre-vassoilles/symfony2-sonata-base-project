<?php
/**
 * Created by PhpStorm.
 * User: pvasouilles
 * Date: 05/07/2016
 * Time: 15:15
 */

namespace AdminBundle\Form;


use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentLibraryType extends ElFinderType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver
            ->setDefault('instance', 'form')
            ->setDefault('enable', true)
        ;
    }

    public function getName()
    {
        return 'ef_document_type';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ef_document_type';
    }

}