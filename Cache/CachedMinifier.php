<?php

namespace Salva\JshrinkBundle\Cache;

/**
 * Class CachedMinifier.
 *
 * Cached minified content
 */
class CachedMinifier implements CacheInterface
{
    /**
     * @var string Cache dir
     */
    private $cacheDir;

    /**
     * @param $cacheDir
     */
    public function __construct($cacheDir)
    {
        $this->cacheDir = $cacheDir;
    }

    /**
     * {@inheritdoc}
     */
    public function minify($content, $options)
    {
        if ($this->cacheDir) {
            if (!file_exists($this->cacheDir)) {
                mkdir($this->cacheDir, 0777, true);
            }

            $hash = md5($content);
            $file = implode(DIRECTORY_SEPARATOR, array($this->cacheDir, $hash));
            if (!file_exists($file)) {
                file_put_contents($file, \JShrink\Minifier::minify($content, $options));
            }

            return file_get_contents($file);
        } else {
            return \JShrink\Minifier::minify($content, $options);
        }
    }
}
