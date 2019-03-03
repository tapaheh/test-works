<?php
namespace app\models;

use app\interfaces\CoordinatesInterface;
use app\interfaces\DirectionInterface;

class CoordinatesModel implements CoordinatesInterface
{
    protected $x;
    protected $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function doStep(DirectionInterface $direction): void
    {
        $this->x += $direction->getXStep();
        $this->y += $direction->getYStep();
    }

    public function isInside(CoordinatesInterface $start, CoordinatesInterface $top): bool
    {
        return $start->getX() <= $this->getX() && $start->getY() <= $this->getY() &&
            $top->getX() >= $this->getX() && $top->getY() >= $this->getY();
    }

    public function toString(): string
    {
        return "{$this->x} {$this->y}";
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
}