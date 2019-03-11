<?php
namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\models\AreaModel;
use app\components\Input;

class AreaModelTest extends TestCase
{
    protected $area;

    public function setUp()
    {
        $this->area = new AreaModel(Input::coordinatesFromString('5 5'));
    }

    public function testInArea()
    {
        $this->assertEquals(true, $this->area->inArea(Input::coordinatesFromString('5 5')));
        $this->assertEquals(false, $this->area->inArea(Input::coordinatesFromString('6 6 ')));
    }
}
