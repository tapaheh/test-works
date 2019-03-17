<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use app\components\Input;
use app\models\{RoverModel, AreaModel, NavigatorModel};

echo "Enter the upper-right coordinates of the plateau(5 5): ";
$input = trim(fgets(STDIN)) ?: '5 5';
$area = new AreaModel(Input::coordinatesFromString($input));

echo "Enter first rover's position(1 2 N): ";
$input = trim(fgets(STDIN)) ?: '1 2 N';
extract(Input::coordinatesAndDirectionFromString($input));
$rover1 = new RoverModel(new NavigatorModel($area, $coordinates, $direction));

echo "Enter a series of instructions telling the first rover how to explore the plateau(LMLMLMLMM): ";
$input = trim(fgets(STDIN)) ?: 'LMLMLMLMM';
foreach (Input::roverCommandsFromString($input) as $command) {
    $command->do($rover1);
}

echo "Enter second rover's position(3 3 E): ";
$input = trim(fgets(STDIN)) ?: '3 3 E';
extract(Input::coordinatesAndDirectionFromString($input));
$rover2 = new RoverModel(new NavigatorModel($area, $coordinates, $direction));

echo "Enter a series of instructions telling the second rover how to explore the plateau(MMRMMRMRRM): ";
$input = trim(fgets(STDIN)) ?: 'MMRMMRMRRM';
foreach (Input::roverCommandsFromString($input) as $command) {
    $command->do($rover2);
}

echo "\r\n";
echo "Results: \r\n";
echo $rover1->getNavigator()->getPosition();
echo "\r\n";
echo $rover2->getNavigator()->getPosition();
echo "\r\n";
