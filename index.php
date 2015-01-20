<?php
require_once('bootstrap.php');

$test = Life::getFileArray();

Life::printArrayTable($test);

Life::setFileArray(Life::newArrayState($test));