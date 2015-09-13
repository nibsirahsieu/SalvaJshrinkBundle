<?php

namespace Salva\JshrinkBundle\Cache;

/**
 * Interface CacheInterface.
 */
interface CacheInterface
{
    /**
     * @param string $content
     * @param array  $options
     *
     * @return string
     */
    public function minify($content, $options);
}
