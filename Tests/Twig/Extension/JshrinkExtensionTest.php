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
            new JshrinkExtension(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFixturesDir()
    {
        return __DIR__.'/Fixtures/';
    }
}
