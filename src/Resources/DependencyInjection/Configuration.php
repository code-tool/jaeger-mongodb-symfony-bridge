<?php
declare(strict_types=1);

namespace Jaeger\MongoDb\Symfony\Resources\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('jaeger_mongodb');
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('jaeger_mongodb');
        }

        // @formatter:off
        $rootNode
            ->children()
                ->booleanNode('auto_subscribe')
                    ->info('Register collector on bundle boot')
                    ->defaultTrue()
                ->end()
            ->end();
        // @formatter:on

        return $treeBuilder;
    }
}
