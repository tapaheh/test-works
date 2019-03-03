<?php

namespace app\components;

use app\interfaces\CoordinatesInterface;
use app\models\CoordinatesModel;
use app\models\DirectionModel;


class Input
{
    public static function coordinatesFromString(string $input): CoordinatesInterface
    {
        $inputs = self::toArray($input);

        list($x, $y) = $inputs;

        if ($x === null || $y === null) {
            throw new \Exception(sprintf("Command must be format '%s' given '%s'",
                'X Y',
                $input
            ));
        }

        if (! is_numeric($x)) {
            throw new \Exception(sprintf("X coordinate must be integer, given '%s'",
                $x
            ));
        }

        if (! is_numeric($y)) {
            throw new \Exception(sprintf("Y coordinate must be integer, given '%s'",
                $y
            ));
        }

        return new CoordinatesModel($x, $y);
    }

    /**
     * Return ['coordinates', 'direction']
     *
     * @param string $input
     * @return array
     * @throws \Exception
     */
    public static function coordinatesAndDirectionFromString(string $input): array
    {
        $inputs = self::toArray($input);

        list($x, $y, $direction) = $inputs;

        if ($x === null || $y === null || $direction === null) {
            throw new \Exception(sprintf("Command must be format '%s' given '%s'",
                'X Y Z',
                $input
            ));
        }

        return [
            'coordinates' => self::coordinatesFromString("$x $y"),
            'direction' => new DirectionModel($direction)
        ];
    }

    public static function roverCommandsFromString(string $input): array
    {
        $inputs = self::toArray($input);

        return $inputs;
    }


    protected static function toArray(string $input): array
    {
        return array_values(
            array_map(
                'strtoupper',
                array_filter(
                    str_split (
                        trim($input)
                    ),
                    function ($val) {
                        return $val !== ' ' && $val !== '';
                    }
                )
            )
        );
    }
}