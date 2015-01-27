<?php

namespace Salva\JshrinkBundle\Tests\Twig\Extension;

use PHPUnit_Framework_TestCase;
use Salva\JshrinkBundle\Tests\AppKernel;

/**
 * @coversDefaultClass \Salva\JshrinkBundle\Twig\Extension\JshrinkExtension
 * @runTestsInSeparateProcesses
 */
class JshrinkExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::load
     */
    public function testNodeWithoutComments()
    {
        $kernel = new AppKernel('Twig_Extension_JshrinkExtension_testNodeWithoutComments', true);
        $kernel->boot();

        $twig = $kernel->getContainer()->get('twig');
        $html = $twig->render('@SalvaJshrinkBundle/Tests/Resources/views/node.html.twig');

        $this->assertSame('<script>$(document).ready(function(){});</script>', $html);
    }

    /**
     * @covers ::load
     */
    public function testNodeWithComments()
    {
        $kernel = new AppKernel('Twig_Extension_JshrinkExtension_testNodeWithComments', true);
        $kernel->boot();

        $twig = $kernel->getContainer()->get('twig');
        $html = $twig->render('@SalvaJshrinkBundle/Tests/Resources/views/node.html.twig');

        $expected = '<script>/*! copyright */
$(document).ready(function(){});</script>';
        $this->assertSame($expected, $html);
    }
}
