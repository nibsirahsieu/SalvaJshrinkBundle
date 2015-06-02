<?php

namespace Salva\JshrinkBundle\Cache;

/**
 * Interface CacheInterface
 *
 * @package Salva\JshrinkBundle
 */
interface CacheInterface
{
    /**
     * @param string $content
     * @param array $options
     *
     * @return string
     */
    public function minify($content, $options);
}
