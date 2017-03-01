<?php



$menuTitle = $currentPage->menuTitle;
$title     = $currentPage->title;
$html      = $dbManager->getPageHtml($currentPage);

$error     = null;

if ($_POST)
{
	// Form data
	$menuTitle = ifset($_POST, 'menuTitle', '');
	$title     = ifset($_POST, 'title'    , '');
	$html      = ifset($_POST, 'html'     , '');

	// Trimming leading and trailing spaces if any
	$menuTitle = trim($menuTitle);
	$title     = trim($title);

	if ($menuTitle == '') // input validation
	{
		$error = 'Menu title cannot be empty';
	}
	else
	{
		$newPage = new Page();
		$newPage->menuTitle = $menuTitle;
		$newPage->title     = $title;

		// Generate page name from menu title if not home page
		if (!$currentPage->isHomePage())
		{
			$newPage->name = $menuTitle;
			$newPage->name = strtolower($newPage->name);
			$newPage->name = preg_replace('/[^a-z0-9]+/', '-', $newPage->name);
			$newPage->name = preg_replace('/-+/', '-', $newPage->name);
			$newPage->name = trim($newPage->name, '-');
		}
		else
		{
			$newPage->name = $currentPage->name;
		}

		if ($newPage->name == '')
		{
			$error = 'Page title does not contain English characters';
		}
		else
		{
			$dbManager->updatePage($currentPage, $newPage, $html);
			redirect($newPage->getUrl());
		}
	}
}



