<?php
namespace app\models;

use app\interfaces\AreaInterface;
use app\interfaces\CoordinatesInterface;

class AreaModel implements AreaInterface
{
    protected $startCoordinates;
    protected $topCoordinates;

    public function __construct(CoordinatesInterface $startCoordinates, CoordinatesInterface $topCoordinates)
    {
        $this->startCoordinates = $startCoordinates;
        $this->topCoordinates = $topCoordinates;
    }

    public function inArea(CoordinatesInterface $coordinates): bool
    {
        return  $coordinates->isInside($this->startCoordinates, $this->topCoordinates);
    }
}