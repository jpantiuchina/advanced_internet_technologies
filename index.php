<?php

session_start();

require_once __DIR__ . '/internal/model/global.php';
require_once __DIR__ . '/internal/model/page.php';
require_once __DIR__ . '/internal/model/db-manager.php';


$siteName = 'Mokytoja Oksana';

$isAdmin = ifset($_SESSION, 'isAdmin', false);

$dbManager = new DbManager;

/** @var Page[] $PAGES */
$PAGES = $dbManager->getPages();



$currentPageName = Page::getCurrentPageName();
/** @var Page $currentPage */
$currentPage = ifset($PAGES, $currentPageName);
if ($currentPage == null)
	throw new Exception('No such page');


$currentActionName = Page::getCurrentActionName();

if (!$isAdmin && ($currentActionName != Page::$DEFAULT_ACTION_NAME && $currentActionName != 'login'))
	throw new Exception('Only admins can do that');


/** @noinspection PhpIncludeInspection */
require __DIR__ . "/internal/actions/{$currentActionName}.php";


require __DIR__ . '/internal/view/layout.php';

