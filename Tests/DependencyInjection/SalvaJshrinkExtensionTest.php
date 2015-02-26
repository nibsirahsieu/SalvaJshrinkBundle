<?php

namespace Salva\JshrinkBundle\Tests\DependencyInjection;

use PHPUnit_Framework_TestCase;
use Salva\JshrinkBundle\Tests\AppKernel;

/**
 * @coversDefaultClass \Salva\JshrinkBundle\DependencyInjection\SalvaJshrinkExtensionTest
 */
class SalvaJshrinkExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Symfony\Component\HttpKernel\Kernel
     */
    private $kernel;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->kernel = new AppKernel('dev', true);
        $this->kernel->boot();
    }

    /**
     * @covers ::load
     */
    public function testParameter()
    {
        $container = $this->kernel->getContainer();

        $this->assertTrue($container->hasParameter('salva_assetic_filter.jshrink.class'));
        $this->assertTrue($container->hasParameter('salva_twig_extension.jshrink.class'));
    }

    /**
     * @covers ::load
     */
    public function testService()
    {
        $container = $this->kernel->getContainer();

        $salvaAsseticFilter = $container->getParameter('salva_assetic_filter.jshrink.class');
        $salvaTwigExtension = $container->getParameter('salva_twig_extension.jshrink.class');

        $this->assertTrue($container->has('salva_assetic_filter.jshrink'));
        $this->assertTrue($container->has('salva_twig_extension.jshrink'));

        $this->assertInstanceOf($salvaAsseticFilter, $container->get('salva_assetic_filter.jshrink'));
        $this->assertInstanceOf($salvaTwigExtension, $container->get('salva_twig_extension.jshrink'));
    }

    /**
     * @covers ::load
     */
    public function testBundleDisabled()
    {
        $kernel = new AppKernel('bundle_disabled', true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $this->assertTrue($container->has('salva_assetic_filter.jshrink'));
        $this->assertTrue($container->has('salva_twig_extension.jshrink'));
    }

    /**
     * @covers ::load
     */
    public function testCommentsDisabled()
    {
        $kernel = new AppKernel('comments_disabled', true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $this->assertTrue($container->has('salva_assetic_filter.jshrink'));
        $this->assertTrue($container->has('salva_twig_extension.jshrink'));
    }
}
