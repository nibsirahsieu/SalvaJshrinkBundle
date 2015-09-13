<?php

namespace Salva\JshrinkBundle\Twig\Extension;

use Salva\JshrinkBundle\Cache\CacheInterface;
use Salva\JshrinkBundle\Twig\TokenParser\JshrinkTokenParser;
use Twig_Extension;

/**
 * Jshrink Twig Extension.
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
     * Cache handler for minified content.
     *
     * @var CacheInterface
     */
    private $cache;

    /**
     * Twig extension based on bundle configuration.
     *
     * @param CacheInterface $cache
     * @param array          $config
     * @param bool           $enabled
     */
    public function __construct(CacheInterface $cache, array $config = [], $enabled = true)
    {
        $this->cache = $cache;
        $this->config = $config;
        $this->enabled = (bool) $enabled;
    }

    public function getGlobals()
    {
        return [
            '_jshrink_cached_minifier' => $this->cache,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'jshrink_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function getTokenParsers()
    {
        return [
            new JshrinkTokenParser($this->config, $this->enabled),
        ];
    }
}
