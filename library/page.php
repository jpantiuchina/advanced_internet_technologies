<?php


class Page
{
	public $name;
	public $menuTitle;
	public $title;


//	function __construct($name, $menuName, $title)
//	{
//		$this->name     = $name;
//		$this->menuName = $menuName;
//		$this->title    = $title;
//	}

	function echoHtml()
	{
		readfile("pages/{$this->name}.html");
	}

	function getMenuItemHtml(Page $currentPage)
	{
		$result = '<li';
		if ($currentPage == $this)
			$result .= ' class=active';
		$result .= '><a href="';
		if ($this->name == 'index')
			$result .= './'; // for home page...
		else
			$result .= "?page={$this->name}"; // ...for other pages
		$result .= '">';
		$result .= htmlspecialchars($this->menuTitle);
		$result .= '</a></li>';

		return $result;
	}



}
