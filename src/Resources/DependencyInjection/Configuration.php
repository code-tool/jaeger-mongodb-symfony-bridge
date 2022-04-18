<?php
declare(strict_types=1);

namespace Jaeger\MongoDb\Symfony\Resources\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('jaeger_mongodb');

        // @formatter:off
        $treeBuilder->getRootNode()
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
