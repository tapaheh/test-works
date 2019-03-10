<?php
namespace parser\models;

use parser\interfaces\HtmlTagInterface;

class HtmlTag implements HtmlTagInterface
{
    protected $name;
    protected $attributes = [];

    public function __construct(string $tag)
    {
        preg_match_all('/([a-zA-Z]*) (\w+)=[\'"]([^\'"]*)/iu', $tag,$matches);

        $this->name = $matches[1][0];

        $this->attributes = array_combine($matches[2], $matches[3]);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getAttribute(string $name): ?string
    {
        foreach ($this->attributes as $key => $value) {
            if ($key == $name) return $value;
        }

        return null;
    }
}
