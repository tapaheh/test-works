<?php

require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use app\controllers\RoverController;
use app\components\Input;
use app\models\{RoverModel, AreaModel, NavigatorModel};

echo "Enter the upper-right coordinates of the plateau(5 5) \r\n";
$input = trim(fgets(STDIN));
$area = new AreaModel(Input::coordinatesFromString($input));

echo "Enter first rover's position(1 2 N) \r\n";
$input = trim(fgets(STDIN));
extract(Input::coordinatesAndDirectionFromString($input));
$rover1 = new RoverModel(new NavigatorModel($area, $coordinates, $direction));

echo "Enter a series of instructions telling the first rover how to explore the plateau(LMLMLMLMM) \r\n";
$input = trim(fgets(STDIN));
$roverController1 = new RoverController($rover1);
foreach (Input::roverCommandsFromString($input) as $command) {
    $roverController1->do($command);
}

echo "Enter second rover's position(3 3 E) \r\n";
$input = trim(fgets(STDIN));
extract(Input::coordinatesAndDirectionFromString($input));
$rover2 = new RoverModel(new NavigatorModel($area, $coordinates, $direction));

echo "Enter a series of instructions telling the second rover how to explore the plateau(MMRMMRMRRM) \r\n";
$input = trim(fgets(STDIN));
$roverController2 = new RoverController($rover2);
foreach (Input::roverCommandsFromString($input) as $command) {
    $roverController2->do($command);
}

echo "\r\n";
echo "Results: \r\n";
echo $rover1->getNavigator()->getPosition();
echo "\r\n";
echo $rover2->getNavigator()->getPosition();
echo "\r\n";
