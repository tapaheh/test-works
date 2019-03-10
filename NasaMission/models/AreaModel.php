<?php
namespace app\models;

use app\interfaces\AreaInterface;
use app\interfaces\CoordinatesInterface;

class AreaModel implements AreaInterface
{
    protected $startCoordinates;
    protected $topCoordinates;

    public function __construct(CoordinatesInterface $topCoordinates, CoordinatesInterface $startCoordinates = null)
    {
        $this->topCoordinates = $topCoordinates;
        $this->startCoordinates = $startCoordinates ?: new CoordinatesModel(0, 0);
    }

    public function inArea(CoordinatesInterface $coordinates): bool
    {
        return  $coordinates->isInside($this->startCoordinates, $this->topCoordinates);
    }
}