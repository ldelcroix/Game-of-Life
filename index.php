<?php
require_once('bootstrap.php');

$test = array(array(0, 0, 1, 0),
                      array(1, 0, 0, 1),
                      array(1, 0, 0, 1),
                      array(0, 1, 0, 0));

Life::printArray($test);

echo "<br><br>";

Life::printArray(Life::newArrayState($test));
