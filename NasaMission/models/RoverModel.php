<?php
namespace app\models;

use app\interfaces\AreaInterface;
use app\interfaces\CoordinatesInterface;
use app\interfaces\DirectionInterface;
use app\interfaces\NavigatorInterface;
use app\interfaces\RoverInterface;

class RoverModel implements RoverInterface
{
    protected $navigation;

    public function __construct(NavigatorInterface $navigation)
    {
        $this->navigation = $navigation;
    }

    public function getNavigator(): NavigatorInterface
    {
        return $this->navigation;
    }

    public function makePhoto()
    {
        // TODO: Implement makePhoto() method.
    }
}