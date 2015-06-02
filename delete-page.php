<?php

require_once __DIR__ . '/library/global.php';
require_once __DIR__ . '/library/page.php';
require_once __DIR__ . '/library/db.php';

$db = new DB;

$db->deletePage($_GET['page']);


redirect("./");