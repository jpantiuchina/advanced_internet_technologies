<?php


class Page
{
	private static $PAGE_PARAM_NAME     = 'page';
	private static $HOME_PAGE_NAME      = 'index';
	private static $ACTION_PARAM_NAME   = 'action';
	public  static $DEFAULT_ACTION_NAME = 'view';

	public $name;
	public $menuTitle;
	public $title;




	public static function getCurrentPageName()
	{
		// get URL param 'page', or string 'index' if it doesn't exists
		return ifset($_GET, self::$PAGE_PARAM_NAME, self::$HOME_PAGE_NAME);
	}


	public static function getCurrentActionName()
	{
		$currentActionName = ifset($_GET, self::$ACTION_PARAM_NAME, self::$DEFAULT_ACTION_NAME);
		if (!preg_match('/^[a-z]+$/', $currentActionName)) // hack protection
			throw new Exception('Invalid action name');
		return $currentActionName;
	}


	public function isHomePage()
	{
		return $this->name == self::$HOME_PAGE_NAME;
	}


	public function getUrl($actionName = null)
	{
		$url = '/';
		if (!$this->isHomePage())
			$url .= '?' . self::$PAGE_PARAM_NAME . '=' . $this->name;
		if ($actionName != null && $actionName != self::$DEFAULT_ACTION_NAME)
		{
			if ($this->isHomePage())
				$url .= '?';
			else
				$url .= '&';
			$url .= self::$ACTION_PARAM_NAME . '=' . $actionName;
		}
		return $url;
	}


	function getMenuItemHtml(Page $currentPage)
	{
		$result = '<li';
		if ($currentPage == $this)
			$result .= ' class=active';
		$result .= '><a href="' . $this->getUrl() . '">';
		$result .= htmlspecialchars($this->menuTitle);
		$result .= '</a></li>';
		return $result;
	}
}
