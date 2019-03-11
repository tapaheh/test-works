<?php
namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\models\{CoordinatesModel, DirectionModel};
use app\components\Input;

class CoordinatesModelTest extends TestCase
{
    protected $coordinates;

    public function setUp()
    {
        $this->coordinates = Input::coordinatesFromString('1 2');
    }

    public function testGetX()
    {
        $this->assertEquals(1, $this->coordinates->getX());
    }

    public function testGetY()
    {
        $this->assertEquals(2, $this->coordinates->getY());
    }

    public function testIsInside()
    {
        $this->assertEquals(true, $this->coordinates->isInside(Input::coordinatesFromString('1 2'), Input::coordinatesFromString('2 3')));
        $this->assertEquals(false, $this->coordinates->isInside(Input::coordinatesFromString('2 3'), Input::coordinatesFromString('4 5')));
    }

    public function testDoStep()
    {
        $this->coordinates->doStep(new DirectionModel('E'));
        $this->assertEquals(2, $this->coordinates->getX());

        $this->coordinates->doStep(new DirectionModel('S'));
        $this->assertEquals(1, $this->coordinates->getY());
    }

    public function testToString()
    {
        $this->assertEquals('1 2', $this->coordinates->toString());
    }
}
