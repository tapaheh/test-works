<?php
namespace app\models;

use app\interfaces\DirectionInterface;

class DirectionModel implements DirectionInterface
{
    public const NORTH = 'N';
    public const SOUTH = 'S';
    public const EAST = 'E';
    public const WEST = 'W';

    protected $xStep;
    protected $yStep;
    protected $direction;

    protected $availableDirections = [
        self::NORTH,
        self::EAST,
        self::SOUTH,
        self::WEST
    ];

    protected $directionAxisX = [
        self::NORTH => 0,
        self::EAST => 1,
        self::SOUTH => 0,
        self::WEST => -1
    ];

    protected $directionAxisY = [
        self::NORTH => 1,
        self::EAST => 0,
        self::SOUTH => -1,
        self::WEST => 0
    ];

    public function __construct(string $direction, int $xStep = 1, int $yStep = 1)
    {
        if (! in_array($direction, array_keys($this->availableDirections))) {
            throw new \Exception(sprintf("Direction can only be one of the following directions %s given %s",
                implode(',', array_keys($this->availableDirections)),
                $direction
            ));
        }

        $this->direction = $direction;
        $this->xStep = $xStep;
        $this->yStep = $yStep;
    }

    public function toLeft()
    {
        $offset = array_search($this->direction, $this->availableDirections);
        $direction = current(array_slice($this->availableDirections, --$offset, 1, true));

        $this->direction = $direction;
    }

    public function toRight()
    {
        $offset = array_search($this->direction, $this->availableDirections);
        $offset = $offset >= (count($this->availableDirections) - 1) ? 0 : ++$offset;
        $direction = current(array_slice($this->availableDirections, $offset, 1, true));

        $this->direction = $direction;
    }

    public function getXStep(): int
    {
        return $this->xStep * $this->directionAxisX[$this->direction];
    }

    public function getYStep(): int
    {
        return $this->yStep * $this->directionAxisY[$this->direction];
    }

    public function toString(): string
    {
        return $this->direction;
    }
}