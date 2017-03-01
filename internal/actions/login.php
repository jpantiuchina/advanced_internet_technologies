<?php


$login = '';
$password = '';
$error = null;

if ($_POST)
{
	// Form data
	$login    = ifset($_POST, 'login'   , '');
	$password = ifset($_POST, 'password', '');

	if ($login == 'oksana' && $password == 'okasana')
	{
		$_SESSION['isAdmin'] = true;
		redirect($currentPage->getUrl());
	}
	else
	{
		$error = 'Invalid login and/or password';
	}
}



