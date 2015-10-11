<?php

namespace Salva\JshrinkBundle\Twig\TokenParser;

use Salva\JshrinkBundle\Twig\Node\JshrinkNode;
use Twig_Token;
use Twig_TokenParser;

/**
 * Jshrink.
 */
class JshrinkTokenParser extends Twig_TokenParser
{
    /**
     * @var bool
     */
    private $enabled;

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
     * @param bool  $enabled
     */
    public function __construct(array $config = array(), $enabled = true)
    {
        $this->config = $config;
        $this->enabled = (bool) $enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function parse(Twig_Token $token)
    {
        $lineNumber = $token->getLine();

        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(function (Twig_Token $token) {
            return $token->test('endjshrink');
        }, true);
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        if ($this->enabled) {
            $node = new JshrinkNode($body, $lineNumber, $this->getTag());
            $node->setConfig($this->config);

            return $node;
        }

        return $body;
    }

    /**
     * {@inheritdoc}
     */
    public function getTag()
    {
        return 'jshrink';
    }
}
