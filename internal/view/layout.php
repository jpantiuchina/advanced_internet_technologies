<?php /** @var Page $currentPage */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo htmlspecialchars($siteName), ' - ', htmlspecialchars($currentPage->title) ?></title>
	<link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/lib/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="/lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="/oksana.js"></script>
	<link href="/oksana.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
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
							<li><a href="<?php echo $currentPage->getUrl('edit'  ) ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit this page</a></li>
							<li><a href="<?php echo $currentPage->getUrl('create') ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add page</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $currentPage->getUrl('delete') ?>" class="confirm-delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete this page</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $currentPage->getUrl('logout') ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>



<div class="container">

	<h1><?php echo htmlspecialchars($currentPage->title) ?></h1>

	<?php require __DIR__ . "/{$currentActionName}.php" ?>


</div>

<footer>
	<div class="container">
		<p class="login-link">
			<?php if ($isAdmin) { ?>
				<a href="<?php echo $currentPage->getUrl('logout') ?>">Logout</a>
			<?php } else { ?>
				<a href="<?php echo $currentPage->getUrl('login') ?>">Login</a>
			<?php } ?>
		</p>
		<p>Copyright&copy; 2015 Jevgenija Pantiuchina</p>
	</div>
</footer>

</body>
</html>