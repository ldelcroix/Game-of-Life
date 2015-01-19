<?php
session_start();

require_once('config.php');

spl_autoload_register(function ($class) {
	include_once DIR_SRC . $class . '.php';
});

require_once('utils.php');