<?php
namespace parser\interfaces;

interface HtmlParserInterface
{
	public function parseTags(): HtmlTagCollectionInterface;
}
