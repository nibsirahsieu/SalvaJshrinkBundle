<?php

namespace Salva\JshrinkBundle\Twig\TokenParser;

use Salva\JshrinkBundle\Twig\Node\JshrinkNode;
use Twig_Token;
use Twig_TokenParser;

/**
 * Jshrink
 */
class JshrinkTokenParser extends Twig_TokenParser
{
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

        return new JshrinkNode($body, $lineNumber, $this->getTag());
    }

    /**
     * {@inheritDoc}
     */
    public function getTag()
    {
        return 'jshrink';
    }
}
