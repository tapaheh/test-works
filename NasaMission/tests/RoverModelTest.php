<?php
namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\models\{RoverModel, NavigatorModel, AreaModel};
use app\components\Input;
use app\interfaces\NavigatorInterface;

class RoverModelTest extends TestCase
{
    protected $rover;

    public function setUp()
    {
        $area = new AreaModel(Input::coordinatesFromString('5 5'));
        extract(Input::coordinatesAndDirectionFromString('1 2 N'));

        $this->rover = new RoverModel(new NavigatorModel($area, $coordinates, $direction));
    }


    public function testGetNavigator()
    {
        $this->assertInstanceOf(NavigatorInterface::class, $this->rover->getNavigator());
    }
}
