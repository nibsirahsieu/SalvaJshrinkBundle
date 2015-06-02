<?php

namespace Salva\JshrinkBundle\Tests\Twig\Extension;

use Salva\JshrinkBundle\Twig\Extension\JshrinkExtension;
use Twig_Test_IntegrationTestCase;

/**
 * @coversDefaultClass \Salva\JshrinkBundle\Twig\Extension\JshrinkExtension
 */
class JshrinkExtensionTest extends Twig_Test_IntegrationTestCase
{
    /**
     * {@inheritdoc}
     */
    public function getExtensions()
    {
        return array(
            new JshrinkExtension($this->getCacheMock()),
        );
    }

    /**
     * @return \Salva\JshrinkBundle\Cache\CacheInterface
     */
    private function getCacheMock()
    {
        $mock = $this->getMock('\Salva\JshrinkBundle\Cache\CacheInterface');
        $mock->expects($this->any())
            ->method('minify')
            ->willReturnCallback(function ($arg) {
                return \JShrink\Minifier::minify($arg);
            });

        return $mock;
    }

    /**
     * {@inheritdoc}
     */
    public function getFixturesDir()
    {
        return __DIR__.'/Fixtures/';
    }
}
