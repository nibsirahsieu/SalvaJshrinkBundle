<?php

namespace Salva\JshrinkBundle\Twig\Extension;

use Salva\JshrinkBundle\Twig\TokenParser\JshrinkTokenParser;
use Twig_Extension;

/**
 * Jshrink Twig Extension
 */
class JshrinkExtension extends Twig_Extension
{
    /**
     * JShrink configuration.
     *
     * @var array
     */
    private $config;

    /**
     * Twig extension based on bundle configuration.
     *
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        $this->config = $config;
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
        return array(
            new JshrinkTokenParser($this->config),
        );
    }
}
