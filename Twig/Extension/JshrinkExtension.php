<?php

namespace Salva\JshrinkBundle\Twig\Extension;

use Salva\JshrinkBundle\Twig\TokenParser\JshrinkTokenParser;
use Twig_Extension;

/**
 * Jshrink
 */
class JshrinkExtension extends Twig_Extension
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'jshrink_extension';
    }

    /**
     * {@inheritDoc}
     */
    public function getTokenParsers()
    {
        return array(
            new JshrinkTokenParser(),
        );
    }
}
