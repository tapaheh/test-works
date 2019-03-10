<?php
namespace app\interfaces;

interface NavigatorInterface
{
    public function turnLeft();
    public function turnRight();
    public function move();
    public function getPosition();
}