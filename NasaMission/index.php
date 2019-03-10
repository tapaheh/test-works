<?php

require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use app\controllers\RoverController;
use app\components\Input;
use app\models\{RoverModel, AreaModel, NavigatorModel};

$input = '5 5';
$area = new AreaModel(Input::coordinatesFromString($input));

$input = '1 2 N';
extract(Input::coordinatesAndDirectionFromString($input));
$rover1 = new RoverModel(new NavigatorModel($area, $coordinates, $direction));

$input = 'LMLMLMLMM';
$roverController1 = new RoverController($rover1);
foreach (Input::roverCommandsFromString($input) as $command) {
    $roverController1->do($command);
}

$input = '3 3 E';
extract(Input::coordinatesAndDirectionFromString($input));
$rover2 = new RoverModel(new NavigatorModel($area, $coordinates, $direction));

$input = 'MMRMMRMRRM';
$roverController2 = new RoverController($rover2);
foreach (Input::roverCommandsFromString($input) as $command) {
    $roverController2->do($command);
}

echo $rover1->getNavigator()->getPosition();
echo php_sapi_name() == "cli" ? "\r\n" : '<br />';
echo $rover2->getNavigator()->getPosition();
echo "\r\n";
