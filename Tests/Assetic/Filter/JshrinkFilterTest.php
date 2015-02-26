<?php

namespace Salva\JshrinkBundle\Tests\Twig\Extension;

use PHPUnit_Framework_TestCase;
use Salva\JshrinkBundle\Tests\AppKernel;
use Symfony\Component\HttpFoundation\Request;

/**
 * @coversDefaultClass \Salva\JshrinkBundle\Assetic\Filter\JshrinkFilter
 */
class JshrinkFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::filterDump
     */
    public function testDevScripts()
    {
        $kernel = new AppKernel('dev', true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $twig = $container->get('twig');

        $container->enterScope('request');
        $container->set('request', new Request(), 'request');

        $html = $twig->render('@SalvaJshrinkBundle/Tests/Resources/views/assetic.html.twig');

        $this->assertRegExp('/\s*<script src="[^\"]+"><\/script>\s*\n\s*<script src="[^\"]+"><\/script>\s*/', $html);
    }

    /**
     * @covers ::filterDump
     */
    public function testProdScripts()
    {
        $kernel = new AppKernel('dev', false);
        $kernel->boot();

        $container = $kernel->getContainer();

        $twig = $container->get('twig');

        $container->enterScope('request');
        $container->set('request', new Request(), 'request');

        $html = $twig->render('@SalvaJshrinkBundle/Tests/Resources/views/assetic.html.twig');

        $this->assertRegExp('/\s*<script src="[^\"]+"><\/script>\s*/', $html);
    }
}
