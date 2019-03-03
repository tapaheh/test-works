<?php
namespace parser\models;

use parser\interfaces\DataInterface;

class HtmlData implements DataInterface
{
    protected $content;

    public function loadByUrl(string $url): void
    {
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \Exception('Url not valid.');
        }

        if (! $this->content = file_get_contents($url)) {
            throw new \Exception("Can't load page.");
        }
    }

    public function getContent(): string
    {
        return $this->content;
    }
}