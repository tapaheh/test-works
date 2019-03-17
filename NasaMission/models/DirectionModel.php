<?php
namespace app\models;

use app\interfaces\DirectionInterface;

// This class could be divided into separate classes for each direction, but I think that this is superfluous in this case.
class DirectionModel implements DirectionInterface
{
    public const NORTH = 'N';
    public const SOUTH = 'S';
    public const EAST = 'E';
    public const WEST = 'W';

    protected $current;

    protected $directionsByAround = [
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
        if (! in_array($direction, array_keys($this->directionsByAround))) {
            throw new \Exception(sprintf("Direction can only be one of the following directions %s given %s",
                implode(',', array_keys($this->directionsByAround)),
                $direction
            ));
        }

        $this->current = $direction;
    }

    public function toLeft(): void
    {
        $offset = array_search($this->current, $this->directionsByAround);
        $direction = current(array_slice($this->directionsByAround, --$offset, 1, true));

        $this->current = $direction;
    }

    public function toRight(): void
    {
        $offset = array_search($this->current, $this->directionsByAround);
        $offset = $offset >= (count($this->directionsByAround) - 1) ? 0 : ++$offset;
        $direction = current(array_slice($this->directionsByAround, $offset, 1, true));

        $this->current = $direction;
    }

    public function getXShift(): int
    {
        return $this->directionAxisX[$this->current];
    }

    public function getYShift(): int
    {
        return $this->directionAxisY[$this->current];
    }

    public function toString(): string
    {
        return $this->current;
    }
}
