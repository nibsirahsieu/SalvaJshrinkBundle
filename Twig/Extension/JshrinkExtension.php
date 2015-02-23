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
     * Extension enabled
     *
     * @var bool
     */
    private $enable;

    /**
     * @param bool $enable
     */
    public function __construct($enable = true)
    {
        $this->enable = $enable;
    }

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
        return [
            new JshrinkTokenParser($this->enable),
        ];
    }
}
