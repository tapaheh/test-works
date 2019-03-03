<?php
namespace app\interfaces;

interface RoverInterface
{
    public function turnLeft();
    public function turnRight();
    public function move();
    public function makePhoto();
}