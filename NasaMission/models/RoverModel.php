<?php
namespace app\models;

use app\interfaces\AreaInterface;
use app\interfaces\CoordinatesInterface;
use app\interfaces\DirectionInterface;
use app\interfaces\RoverInterface;

class RoverModel implements RoverInterface
{
    protected $area;
    protected $coordinates;
    protected $direction;

    public function __construct(AreaInterface $area, CoordinatesInterface $coordinates, DirectionInterface $direction)
    {
        $this->area = $area;

        if (! $this->area->inArea($coordinates)) {
            throw new \Exception('Rover is out of area!');
        }

        $this->coordinates = $coordinates;
        $this->direction = $direction;
    }

    public function turnLeft()
    {
        $this->direction->toLeft();
    }

    public function turnRight()
    {
        $this->direction->toRight();
    }

    public function move()
    {
        $this->coordinates->doStep($this->direction);

        if (! $this->area->inArea($this->coordinates)) {
            throw new \Exception('Rover is out of area!');
        }
    }

    public function makePhoto()
    {

    }

    public function getPosition(): string
    {
        return "{$this->coordinates->toString()} {$this->direction->toString()}";
    }
}