<?php

namespace Salva\JshrinkBundle\Twig\Node;

use Twig_Node;
use Twig_NodeInterface;
use Twig_Compiler;

/**
 * Jshrink
 */
class JshrinkNode extends Twig_Node
{
    /**
     * {@inheritDoc}
     */
    public function __construct(Twig_NodeInterface $body, $lineNumber, $tag = 'jshrink')
    {
        parent::__construct(array('body' => $body), array(), $lineNumber, $tag);
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
            ->write("echo \\JShrink\\Minifier::minify(trim(ob_get_clean()));\n");
    }
}
