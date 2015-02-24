<?php

namespace Salva\JshrinkBundle\Assetic\Filter;

use Assetic\Asset\AssetInterface;
use Assetic\Filter\FilterInterface;
use JShrink\Minifier;

class JshrinkFilter implements FilterInterface
{
    /**
     * Array containing app configurations.
     *
     * @var array
     */
    protected $options;

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->options = $options;
    }

    /**
     * {@inheritDoc}
     */
    public function filterLoad(AssetInterface $asset)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function filterDump(AssetInterface $asset)
    {
        $asset->setContent(Minifier::minify($asset->getContent(), $this->options));
    }
}
