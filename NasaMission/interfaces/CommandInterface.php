<?php
namespace app\interfaces;

interface CommandInterface
{
    public function do(RoverInterface $rover): void ;
}