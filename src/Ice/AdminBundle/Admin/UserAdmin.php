<?php

namespace Ice\AdminBundle\Admin;

use Ice\EntityBundle\Entity\User;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Admin;

class UserAdmin extends Admin
{

    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);

        if (!$this->getConfigurationPool()->getContainer()->get('security.authorization_checker')->isGranted('ROLE_ICE')) {
            $query
                ->andWhere($query->getRootAliases()[0] . '.roles NOT LIKE :role')
                ->setParameter('role', '%ROLE_ICE%')
            ;
        }
        return $query;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->With('Infos Membre', ['class' => 'col-md-6' ])
            ->add('email','email', array(
                'label' => 'Adresse mail',
            ))
        ;
        if ($this->getSubject()->getId()) {
            $formMapper
                ->add('plainPassword','text', array(
                    'label' => 'Changer le mot de passe',
                    'required' => false,
                ));
        }
        $formMapper
            ->add('enabled', null, array(
                'label' => 'Actif',
                'required' => false,
            ))
            ->end()
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email', null, array('label' => 'Adresse mail'))
            ->add('enabled', null, array('label' => 'Actif'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('email', null, array('label' => 'Adresse mail'))
            ->add('enabled', null, array('label' => 'Actif', 'editable' => true))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' =>  array()
                )
            ))
        ;
    }

}