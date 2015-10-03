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
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            //new exxan\maquetteBundle\goBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            //new Exxan\Sgv3\SalesHubBundle\Sgv3SalesBundle(),
            //new Exxan\Sgv3\DocumentHubBundle\Sgv3DocBundle(),
            //new Exxan\Sgv3\DirectoryHubBundle\Sgv3DirectoryBundle(),
            //new Exxan\Sgv3\ProductionHubBundle\sgv3ProdBundle(),
            //new Exxan\Sgv3\FinancialHubBundle\sgcv3FinancialBundle(),
            //new Exxan\Sgv3\HumanRessourcesBundle\sgv3HrBundle(),
            //new Exxan\Sgv3\UserBundle\Sgv3UserBundle(),
            //new \Tbbc\MoneyBundle\TbbcMoneyBundle(),
            new Hager\TransformationBundle\TransformationBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
