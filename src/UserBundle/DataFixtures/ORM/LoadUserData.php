<?php
/**
 * Created by PhpStorm.
 * User: pv
 * Date: 29/04/2016
 * Time: 10:30
 */

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use EntityBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $test_password = 'test';
        $factory = $this->container->get('security.encoder_factory');
        /** @var $manager \FOS\UserBundle\Doctrine\UserManager */
        $manager = $this->container->get('fos_user.user_manager');


        /** @var User $user */
        $user = $manager->createUser();
        $user->setUsername('superadmin');
        $user->setEmail('superadmin@example.com');
        $user->setFirstname('Super');
        $user->setLastname('Admin');
        $user->setRoles(array('ROLE_SUPER_ADMIN'));
        $user->setEnabled(true);
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($test_password, $user->getSalt());
        $user->setPassword($password);
        $manager->updateUser($user);
        $this->addReference('user.super_admin', $user);
        unset($user);


        /** @var User $user */
        $user = $manager->createUser();
        $user->setUsername('admin');
        $user->setPlainPassword($test_password);
        $user->setEmail('admin@example.com');
        $user->setFirstname('Basic');
        $user->setLastname('Admin');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setEnabled(true);
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
        $user->setPassword($password);
        $manager->updateUser($user);
        $this->addReference('user.admin', $user);


        /** @var User $user */
        $user = $manager->createUser();
        $user->setUsername('ref');
        $user->setPlainPassword($test_password);
        $user->setEmail('ref@example.com');
        $user->setFirstname('Admin');
        $user->setLastname('SEO');
        $user->setRoles(array('ROLE_REF'));
        $user->setEnabled(true);
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
        $user->setPassword($password);
        $manager->updateUser($user);
        $this->addReference('user.manager', $user);


        /** @var User $user */
        $user = $manager->createUser();
        $user->setUsername('demo1');
        $user->setPlainPassword($test_password);
        $user->setEmail('demo1@example.com');
        $user->setFirstname('Demo1');
        $user->setLastname('User');
        $user->setRoles(array('ROLE_USER'));
        $user->setEnabled(true);
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
        $user->setPassword($password);
        $manager->updateUser($user);
        $this->addReference('user.demo1', $user);


        /** @var User $user */
        $user = $manager->createUser();
        $user->setUsername('demo2');
        $user->setPlainPassword($test_password);
        $user->setEmail('demo2@example.com');
        $user->setFirstname('Demo2');
        $user->setLastname('User');
        $user->setRoles(array('ROLE_USER'));
        $user->setEnabled(true);
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
        $user->setPassword($password);
        $manager->updateUser($user);
        $this->addReference('user.demo2', $user);
    }
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}