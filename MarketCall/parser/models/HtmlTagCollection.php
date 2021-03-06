<?php
namespace parser\models;

use parser\interfaces\HtmlTagCollectionInterface;

class HtmlTagCollection implements HtmlTagCollectionInterface
{
    protected $collection;

    public function __construct(array $elements)
    {
        foreach ($elements as $element) {
            $this->collection[] = new HtmlTag($element);
        }
    }

    public function getAllTags(): array
    {
        return $this->collection;
    }

    public function getByTagName(string $tag): array
    {
        $newCollection = [];

        foreach ($this->collection as $item) {
            if ($item->getName() == $tag) {
                $newCollection[] = $item;
            }
        }

        return $newCollection;
    }
}