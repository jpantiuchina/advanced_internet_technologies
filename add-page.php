<?php

require_once __DIR__ . '/library/global.php';
require_once __DIR__ . '/library/page.php';
require_once __DIR__ . '/library/db.php';

$db = new DB;

$newPageName = $db->createPage();


redirect("./?page={$newPageName}");