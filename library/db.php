<?php


require_once __DIR__ . '/page.php';


class DB
{
	private static $url  = 'mysql:host=localhost;dbname=oksana;charset=utf8';
	private static $user = 'oksana';
	private static $pass = 'UX7EWQKpUvVmj9wB';


	private $connection;

	function __construct()
	{
		$this->connection = new PDO(self::$url, self::$user, self::$pass);

	}


	function getPages()
	{
		$pages = $this->connection->query("SELECT `name`, menuTitle, title FROM page ORDER BY `order`");
		$pages->setFetchMode(PDO::FETCH_CLASS, 'Page');
		$result = [];
		/** @var Page $page */
		foreach ($pages as $page)
			$result[$page->name] = $page;
		return $result;
	}


	private function executeQuery($query, $parameters = null)
	{
		$statement = $this->connection->prepare($query);
		if (!$statement->execute($parameters))
			throw new Exception($statement->errorInfo()[2]);
		return $statement;
	}


	private function getScalar($query, $parameters = null)
	{
		$statement = $this->executeQuery($query, $parameters);
		return $statement->fetchColumn();

	}

	function getPageHtml(Page $page)
	{
		return $this->getScalar("SELECT html FROM page WHERE `name`=?", [$page->name]);
	}

	public function createPage()
	{
		$order = $this->getScalar("SELECT MAX(`order`) + 10 FROM page");

		$this->executeQuery("
			INSERT INTO page (`name`, menuTitle, title, `order`)
			VALUES (:name, :menuTitle, :title, :order)",
			[
				':name'      => 'new-page',
				':menuTitle' => 'New Page',
				':title'     => 'New Page',
				':order'     => $order,
			]
		);

		return 'new-page';
	}

	public function deletePage($pageName)
	{
		$this->executeQuery("DELETE FROM page WHERE name=?", [$pageName]);
	}
}



