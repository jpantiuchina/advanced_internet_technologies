<?php

$newPage = new Page;
$newPage->name      = 'new-page';
$newPage->menuTitle = 'New Page';
$newPage->title     = 'New Page';

$dbManager->createPage($newPage);

redirect($newPage->getUrl('edit'));

