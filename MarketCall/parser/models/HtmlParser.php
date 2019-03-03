<?php
namespace parser\models;

use parser\interfaces\HtmlDataInterface;
use parser\interfaces\HtmlParserInterface;
use parser\interfaces\HtmlTagCollectionInterface;

class HtmlParser implements HtmlParserInterface
{
    protected $data = '';

    public function __construct(HtmlDataInterface $data)
    {
        $this->data = $data->getContent();
    }

    public function parseTags(): HtmlTagCollectionInterface
    {
        preg_match_all('/<([^\/!=].*)>/i', $this->data, $matches);

        return new HtmlTagCollection($matches[1]);
    }
}