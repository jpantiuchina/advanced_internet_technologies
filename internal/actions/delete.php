<?php

/** @var Page $currentPage */
if ($currentPage->isHomePage())
	throw new Exception('Home page can never be deleted');

$dbManager->deletePage($currentPage);

redirect('/');

