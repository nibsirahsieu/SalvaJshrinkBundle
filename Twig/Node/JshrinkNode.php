<?php

namespace Salva\JshrinkBundle\Twig\Node;

use Twig_Compiler;
use Twig_Node;
use Twig_NodeInterface;

/**
 * Jshrink Twig Extension
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
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public function compile(Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("echo \\JShrink\\Minifier::minify(trim(ob_get_clean()),".var_export($this->config, true).");\n");
    }
}
