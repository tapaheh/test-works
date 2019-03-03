<?php
function array_swap(&$arr, $num){
    list($arr[0], $arr[$num]) = [$arr[$num], $arr[0]];
}

$arr = [4,5,8,9,1,7,2];

$length = sizeof($arr);
foreach ($arr as $k => $v) {
    $posMaxVal = 0;
	
    for ($i = 0; $i < $length - $k; ++$i) {
        if($arr[$i] > $arr[$posMaxVal]) $posMaxVal = $i;
	}
	
    array_swap($arr, $posMaxVal);
    array_swap($arr, $length - 1 - $k);
}

var_dump($arr);