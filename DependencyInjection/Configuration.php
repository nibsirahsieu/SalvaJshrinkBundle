<?php

namespace Salva\JshrinkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('salva_jshrink', 'array');
        $rootNode
            ->children()
                ->booleanNode('flaggedComments')->defaultTrue()->end()
            ->end();

        return $treeBuilder;
    }
}