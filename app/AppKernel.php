<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            // Sonata
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\ClassificationBundle\SonataClassificationBundle(),
            new Sonata\PageBundle\SonataPageBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new Sonata\CacheBundle\SonataCacheBundle(),
            new Sonata\NotificationBundle\SonataNotificationBundle(),
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new Sonata\MediaBundle\SonataMediaBundle(),


            // Deploy bundle
            new Hpatoio\DeployBundle\DeployBundle(),
            // APC Bundle
            new Ornicar\ApcBundle\OrnicarApcBundle(),
            //KNP
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            // CKEditor
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new FM\ElfinderBundle\FMElfinderBundle(),
            // Friends Of Symfony
            new FOS\UserBundle\FOSUserBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),

            // KnpLabs
            new Knp\DoctrineBehaviors\Bundle\DoctrineBehaviorsBundle(),

            // Liip Imagine
            new Liip\ImagineBundle\LiipImagineBundle(),

            // Project Bundles
            new AdminBundle\AdminBundle(),
            new EntityBundle\EntityBundle(),
            new FrontendBundle\FrontendBundle(),
            new UserBundle\UserBundle('FOSUserBundle'),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
