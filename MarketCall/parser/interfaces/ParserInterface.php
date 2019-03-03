<?php
namespace parser\interfaces;

interface ParserInterface
{
	public function parseTags(): TagCollectionInterface;
}
