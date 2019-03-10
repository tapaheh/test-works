<?php
namespace app\models;

use app\interfaces\DirectionInterface;

class DirectionModel implements DirectionInterface
{
    public const NORTH = 'N';
    public const SOUTH = 'S';
    public const EAST = 'E';
    public const WEST = 'W';

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

    public function __construct(string $direction)
    {
        if (! in_array($direction, array_keys($this->availableDirections))) {
            throw new \Exception(sprintf("Direction can only be one of the following directions %s given %s",
                implode(',', array_keys($this->availableDirections)),
                $direction
            ));
        }

        $this->direction = $direction;
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

    public function getXShift(): int
    {
        return $this->directionAxisX[$this->direction];
    }

    public function getYShift(): int
    {
        return $this->directionAxisY[$this->direction];
    }

    public function toString(): string
    {
        return $this->direction;
    }
}
