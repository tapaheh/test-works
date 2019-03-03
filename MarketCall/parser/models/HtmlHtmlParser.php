<?php
namespace parser\models;

use parser\interfaces\HtmlDataInterface;
use parser\interfaces\HtmlParserInterface;
use parser\interfaces\HtmlTagCollectionInterface;

class HtmlHtmlParser implements HtmlParserInterface
{
    protected $data = '';

    public function __construct(HtmlDataInterface $data)
    {
        $this->data = $data->getContent();
    }

    public function parseTags(): HtmlTagCollectionInterface
    {
        preg_match_all('/<([^\/!=].*)>/i', $this->data, $matches);

        return new HtmlHtmlTagCollection($matches[1]);
    }
}