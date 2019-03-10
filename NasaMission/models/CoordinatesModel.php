<?php
namespace app\models;

use app\interfaces\CoordinatesInterface;
use app\interfaces\DirectionInterface;

class CoordinatesModel implements CoordinatesInterface
{
    protected $x;
    protected $y;
    
    protected $xStep;
    protected $yStep;

    public function __construct(int $x, int $y, int $xStep = 1, int $yStep = 1)
    {
        $this->x = $x;
        $this->y = $y;
        
        $this->xStep = $xStep;
        $this->yStep = $yStep;
    }

    public function doStep(DirectionInterface $direction): void
    {
        $this->x += $direction->getXShift() * $this->xStep;
        $this->y += $direction->getYShift() * $this->yStep;
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
