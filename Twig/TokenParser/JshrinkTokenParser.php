<?php

namespace Salva\JshrinkBundle\Twig\TokenParser;

use Salva\JshrinkBundle\Twig\Node\JshrinkNode;
use Twig_Token;
use Twig_TokenParser;

/**
 * Jshrink Twig Extension
 */
class JshrinkTokenParser extends Twig_TokenParser
{
    /**
     * JShrink configuration.
     *
     * @var array
     */
    private $config;

    /**
     * Twig extension based on bundle configuration.
     *
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        $this->config = $config;
    }

    /**
     * {@inheritDoc}
     */
    public function parse(Twig_Token $token)
    {
        $lineNumber = $token->getLine();

        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(function (Twig_Token $token) {
            return $token->test('endjshrink');
        }, true);
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        $node = new JshrinkNode($body, $lineNumber, $this->getTag());
        $node->setConfig($this->config);

        return $node;
    }

    /**
     * {@inheritDoc}
     */
    public function getTag()
    {
        return 'jshrink';
    }
}
