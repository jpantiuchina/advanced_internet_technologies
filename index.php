<?php

require_once __DIR__ . '/library/page.php';
require_once __DIR__ . '/library/db.php';


$siteName = 'My super site';

$isAdmin = true;
$db = new DB();


/** @var Page[] $PAGES */
$PAGES = $db->getPages();



$pageName = 'index';
if (isset($_GET['page'])) // (on home page, 'page' param does not exist)
	$pageName = $_GET['page'];

$currentPage = $PAGES[$pageName];



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo htmlspecialchars($siteName), ' - ', htmlspecialchars($currentPage->title) ?></title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="default.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><?php echo htmlspecialchars($siteName) ?></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<?php foreach ($PAGES as $page) echo $page->getMenuItemHtml($currentPage) ?>
				<?php if ($isAdmin) { ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="add-page.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add page</a></li>
							<li class="divider"></li>
							<li><a href="delete-page.php?page=<?php echo $currentPage->name ?>" class="confirm-delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete this page</a></li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>



<div class="container">

	<h1><?php echo htmlspecialchars($currentPage->title) ?></h1>

	<?php echo $db->getPageHtml($currentPage) ?>

	<hr>

	<footer>
		<p>&copy; Company 2014</p>
	</footer>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="default.js"></script>
</body>
</html>