<?php
namespace app\interfaces;

interface RoverInterface
{
    public function getNavigator(): NavigatorInterface;

    public function makePhoto();
}