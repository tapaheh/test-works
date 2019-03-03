<?php
namespace parser\models;

use parser\interfaces\DataInterface;
use parser\interfaces\ParserInterface;
use parser\interfaces\TagCollectionInterface;

class HtmlParser implements ParserInterface
{
    protected $data = '';

    public function __construct(DataInterface $data)
    {
        $this->data = $data->getContent();
    }

    public function parseTags(): TagCollectionInterface
    {
        preg_match_all('/<([^\/!=].*)>/i', $this->data, $matches);

        return new TagCollection($matches[1]);
    }
}