<?php
namespace parser\interfaces;

interface TagInterface
{
    public function getName(): string ;
	public function getAttributes(): array;
	public function getAttribute(string $name): string;
}
