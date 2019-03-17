<?php
namespace app\models\commands;

use app\interfaces\{RoverInterface, CommandInterface};

class CommandM implements CommandInterface
{
    public function do(RoverInterface $rover): void
    {
        $rover->getNavigator()->move();
    }
}