<?php
namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\models\{NavigatorModel, AreaModel, CoordinatesModel, DirectionModel};
use app\components\Input;

class NavigationModelTest extends TestCase
{
    protected $navigation;

    public function setUp()
    {
        $area = new AreaModel(Input::coordinatesFromString('5 5'));
        extract(Input::coordinatesAndDirectionFromString('1 2 N'));

        $this->navigation = new NavigatorModel($area, $coordinates, $direction);
    }

    public function testTurnLeft()
    {
        $this->navigation->turnLeft();

        $this->assertEquals('1 2 W', $this->navigation->getPosition());
    }

    public function testTurnRight()
    {
        $this->navigation->turnRight();

        $this->assertEquals('1 2 E', $this->navigation->getPosition());
    }

    public function testMove()
    {
        $this->navigation->move();

        $this->assertEquals('1 3 N', $this->navigation->getPosition());

        $this->navigation->turnRight();
        $this->navigation->move();

        $this->assertEquals('2 3 E', $this->navigation->getPosition());
    }

    public function testGetPosition()
    {
        $this->assertEquals('1 2 N', $this->navigation->getPosition());
    }
}
