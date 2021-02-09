<?php

declare(strict_types = 1);

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Class AppKernel. Generated by Symfony.
 */
class AppKernel extends Kernel
{
    /**
     * AppKernel constructor.
     * @param string $environment
     * @param bool $debug
     */
    public function __construct(string $environment, bool $debug)
    {
        date_default_timezone_set('UTC');
        parent::__construct($environment, $debug);
    }

    /**
     * Registered bundles.
     * @return array|iterable|\Symfony\Component\HttpKernel\Bundle\BundleInterface[]
     */
    public function registerBundles()
    {
        $bundles = [
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Snc\RedisBundle\SncRedisBundle(),
            new EightPoints\Bundle\GuzzleBundle\EightPointsGuzzleBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Nelmio\CorsBundle\NelmioCorsBundle(),
            new AppBundle\AppBundle(),
        ];

        if (in_array($this->getEnvironment(), [ 'dev', 'test' ], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        }

        return $bundles;
    }

    /**
     * Root directory of /app.
     * @return string
     */
    public function getRootDir(): string
    {
        return __DIR__;
    }

    /**
     * Cache directory.
     * @return string
     */
    public function getCacheDir(): string
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment().'/';
    }

    /**
     * Log directory.
     * @return string
     */
    public function getLogDir(): string
    {
        return dirname(__DIR__).'/var/logs';
    }

    /**
     * Loads environmental configuration.
     * @param LoaderInterface $loader
     * @throws Exception
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load($this->getProjectDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
