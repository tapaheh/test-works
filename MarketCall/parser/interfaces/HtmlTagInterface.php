<?php
namespace parser\interfaces;

interface HtmlTagInterface
{
    public function getName(): string ;
	public function getAttributes(): array;
	public function getAttribute(string $name): string;
}
