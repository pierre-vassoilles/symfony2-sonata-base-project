<?php

namespace UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;

class SecurityController extends BaseController
{

    protected function renderLogin(array $data)
    {
        $route = $this->container->get('request_stack')->getCurrentRequest()->get('_route');

        if ($route == 'admin_security_login') {
            $data = array_merge(
                $data,
                array(
                    'base_template' => $this->container->get('sonata.admin.pool')->getTemplate('layout'),
                    'admin_pool'    => $this->container->get('sonata.admin.pool'),
                )
            );

            return $this->container->get('templating')->renderResponse(
                'UserBundle:Security:adminLogin.html.twig',
                $data
            );
        }

        return parent::renderLogin($data);
    }

}
