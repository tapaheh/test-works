<?php

namespace app\controllers;

use app\interfaces\RoverInterface;

class RoverController
{
    const COMMAND_LEFT = 'L';
    const COMMAND_RIGHT = 'R';
    const COMMAND_MOVE = 'M';

    protected $rover;

    protected $commandToRoverAction = [
        self::COMMAND_LEFT => 'turnLeft',
        self::COMMAND_RIGHT => 'turnRight',
        self::COMMAND_MOVE => 'move'
    ];

    public function __construct(RoverInterface $rover)
    {
        $this->rover = $rover;
    }

    public function do(string $command)
    {
        if (! in_array($command, array_keys($this->commandToRoverAction))) {
            throw new \Exception(sprintf("Commands can only be one of the following commands %s given %s",
                implode(',', array_keys($this->commandToRoverAction)),
                $command
            ));
        }

        $this->rover->getNavigator()->{$this->commandToRoverAction[$command]}();
    }
}