<?php
namespace app\interfaces;

interface AreaInterface
{
    public function inArea(CoordinatesInterface $coordinates): bool;
}