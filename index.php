<?php

$db = new PDO('mysql:host=localhost;dbname=oksana;charset=utf8', 'oksana', 'UX7EWQKpUvVmj9wB');



$siteName = 'My super site';



class Page
{
	public $name;
	public $menuName;
	public $title;

	function __construct($name, $menuName, $title)
	{
		$this->name     = $name;
		$this->menuName = $menuName;
		$this->title    = $title;
	}

	function echoHtml()
	{
		readfile("pages/{$this->name}.html");
	}

	function getMenuItemHtml()
	{
		global $currentPage; // PHP wants this

		$result = '<li';
		if ($currentPage == $this)
			$result .= ' class=active';
		$result .= '><a href="';
		if ($this->name == 'index')
			$result .= './'; // for home page...
		else
			$result .= "?page={$this->name}"; // ...for other pages
		$result .= '">';
		$result .= htmlspecialchars($this->menuName);
		$result .= '</a></li>';

		return $result;
	}



}


/** @var Page[] $PAGES */
$PAGES = [
	'index'   => new Page('index'  , 'Home'   , 'Welcome to Super Site'),
	'about'   => new Page('about'  , 'About'  , 'About Super Site'     ),
	'contact' => new Page('contact', 'Contact', 'Contact Information'  ),
];


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
				<?php foreach ($PAGES as $page) echo $page->getMenuItemHtml() ?>
			</ul>
		</div>
	</div>
</nav>



<div class="container">

	<h1><?php echo htmlspecialchars($currentPage->title) ?></h1>

	<?php $currentPage->echoHtml() ?>

	<hr>

	<footer>
		<p>&copy; Company 2014</p>
	</footer>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>