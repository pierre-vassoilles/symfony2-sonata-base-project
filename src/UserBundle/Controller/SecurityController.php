<?php

namespace UserBundle\Controller;

use CoreBundle\Entity\Ikos\IkosTmpContractant;
use CoreBundle\Entity\User;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use JMS\Serializer\SerializerBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Form\ActivateAccountType;

class SecurityController extends BaseController
{

    protected function renderLogin(array $data)
    {
        $route = $this->container->get('request')->get('_route');

        if ($route == 'admin_security_login') {
            $data = array_merge($data, array(
                'base_template' => $this->container->get('sonata.admin.pool')->getTemplate('layout'),
                'admin_pool' => $this->container->get('sonata.admin.pool'),
            ));

            return $this->container->get('templating')->renderResponse('UserBundle:Security:adminLogin.html.twig', $data);
        }

        return parent::renderLogin($data);
    }

}
