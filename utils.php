<?php

function pre_dump($var, $echo = true) {

	$buffer = '<pre>';

	ob_start();

	var_dump($var);

	$buffer .= ob_get_contents() . '</pre>';

	ob_end_clean();

	if ($echo) {

		echo $buffer;

	} else {

		return $buffer;

	}
}

function base64_serialize($var) {

	return base64_encode(serialize($var));
}

function base64_unserialize($var) {

	return unserialize(base64_decode($var));
}