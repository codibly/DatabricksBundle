<?php

namespace Codibly\DatabricksBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class CodiblyDatabricksExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('databricks.username', $config['api']['username']);
        $container->setParameter('databricks.password', $config['api']['password']);
        $container->setParameter('databricks.host', $config['api']['host']);

        switch($config['api']['driver']) {
            case 'guzzle':
                $this->configureGuzzleAdapter($config, $container);
                break;
        }
    }

    private function configureGuzzleAdapter($config, ContainerBuilder $container)
    {
        $container->setAlias('databricks-adapter', 'databricks-adapter-guzzle');
    }


}
