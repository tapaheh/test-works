<?php
namespace app\tests;

use PHPUnit\Framework\TestCase;
use app\controllers\RoverController;
use app\models\{AreaModel, RoverModel, NavigatorModel};
use app\components\Input;

class RoverControllerTest extends TestCase
{
    protected $rover;

    public function setUp()
    {
        $area = new AreaModel(Input::coordinatesFromString('5 5'));
        extract(Input::coordinatesAndDirectionFromString('1 2 N'));

        $this->rover = new RoverModel(new NavigatorModel($area, $coordinates, $direction));
    }


    public function testDo()
    {
        $rover = $this->rover;
        $controller = new RoverController($rover);

        $controller->do('M');
        $controller->do('R');

        $this->assertEquals('1 3 E', $rover->getNavigator()->getPosition());
    }
}
