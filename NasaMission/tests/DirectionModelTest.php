<?php
/**
 * Created by PhpStorm.
 * User: krolik
 * Date: 11.03.2019
 * Time: 20:24
 */

namespace app\tests;

use app\models\DirectionModel;
use PHPUnit\Framework\TestCase;

class DirectionModelTest extends TestCase
{
    protected $direction;

    public function setUp()
    {
        $this->direction = new DirectionModel('N');
    }

    public function testToRight()
    {
        $this->direction->toRight();

        $this->assertEquals(1, $this->direction->getXShift());
        $this->assertEquals(0, $this->direction->getYShift());
    }

    public function testToLeft()
    {
        $this->direction->toLeft();

        $this->assertEquals(-1, $this->direction->getXShift());
        $this->assertEquals(0, $this->direction->getYShift());
    }

    public function testGetXShift()
    {
        $this->assertEquals(0, $this->direction->getXShift());
    }

    public function testGetYShift()
    {
        $this->assertEquals(1, $this->direction->getYShift());
    }

    public function testToString()
    {
        $this->assertEquals('N', $this->direction->toString());
    }
}
