<?php


function ifset($array, $name, $default = null)
{
	if (isset($array[$name]))
		return $array[$name];
	else
		return $default;
}


function redirect($url)
{
	header("Location: $url");
	exit;
}




