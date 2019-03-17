<?php
namespace app\models;

use app\interfaces\CommandInterface;

class CommandFactory
{
    public static function create(string $name): CommandInterface
    {
        $class = "app\models\commands\Command$name";
        if (class_exists($class)) {
            return new $class();
        }

        throw new ErrorException("Unknown command name - '{$name}'");
    }
}