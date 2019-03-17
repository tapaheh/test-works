<?php
namespace app\models\commands;

use app\interfaces\{RoverInterface, CommandInterface};

class CommandL implements CommandInterface
{
    public function do(RoverInterface $rover): void
    {
        $rover->getNavigator()->turnLeft();
    }
}