<?php

namespace AdminBundle\Admin;

use CoreBundle\Entity\User;
use Doctrine\ORM\QueryBuilder;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Admin;

class UserAdmin extends AbstractAdmin
{

    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        /** @var QueryBuilder $query */
        $query = parent::createQuery($context);

        if (!$this->getConfigurationPool()->getContainer()->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            $query
                ->andWhere($query->getRootAliases()[0] . '.roles NOT LIKE :role')
                ->setParameter('role', '%ROLE_SUPER_ADMIN%')
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
            ->with('Informations de connexion', array('class' => 'col-md-6' ))
                ->add('username','text', array(
                    'label' => 'Identifiant',
                    'required' => true,
                ))
                ->add('email','email', array(
                    'label' => 'Adresse mail',
                    'required' => true,
                ))
                ->add('plainPassword','text', array(
                    'label' => 'Changer le mot de passe',
                    'required' => false,
                ))
                ->add('enabled', null, array(
                    'label' => 'Actif',
                    'required' => false,
                ))
            ->end()
            ->with('Informations personnelles', array('class' => 'col-md-6' ))
                ->add('firstname', 'text', array(
                    'label' => 'Prénom',
                    'required' => true,
                ))
                ->add('lastname', 'text', array(
                    'label' => 'Nom',
                    'required' => true,
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

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
        $this->updateUser($object);
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
        $this->updateUser($object);
    }

    /**
     * Updates User with the FOS UserManager without flush
     *
     * @param User $user
     */
    public function updateUser(User $user)
    {
        $this->getConfigurationPool()->getContainer()->get('fos_user.user_manager')->updateUser($user, false);
    }

}