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
     * Extension enabled.
     *
     * @var bool
     */
    private $enabled;

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
     * @param bool  $enabled
     */
    public function __construct(array $config = array(), $enabled = true)
    {
        $this->config = $config;
        $this->enabled = (bool) $enabled;
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
            new JshrinkTokenParser($this->config, $this->enabled),
        );
    }
}
