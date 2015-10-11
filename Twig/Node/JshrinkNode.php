<?php

namespace Salva\JshrinkBundle\Twig\Node;

use Twig_Compiler;
use Twig_Node;
use Twig_NodeInterface;

/**
 * Jshrink Twig Extension.
 */
class JshrinkNode extends Twig_Node
{
    /**
     * JShrink configuration.
     *
     * @var array
     */
    private $config;

    /**
     * {@inheritdoc}
     */
    public function __construct(Twig_NodeInterface $body, $lineNumber, $tag = 'jshrink')
    {
        parent::__construct(array('body' => $body), array(), $lineNumber, $tag);
    }

    /**
     * Twig extension based on bundle configuration.
     *
     * @param array $config
     */
    public function setConfig(array $config = array())
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function compile(Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("echo \$context['_jshrink_cached_minifier']->minify(")
            ->raw('trim(ob_get_clean()), '.var_export($this->config, true).'')
            ->raw(");\n");
    }
}
