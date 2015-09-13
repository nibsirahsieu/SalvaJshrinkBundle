<?php

namespace Salva\JshrinkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('salva_jshrink');

        $rootNode
            ->addDefaultsIfNotSet()
            ->canBeDisabled()
            ->children()
                ->booleanNode('flaggedComments')
                    ->defaultTrue()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
