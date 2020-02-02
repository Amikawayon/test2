<?php 
class News 
{
	public static function getNewsItemByID($id)
	{
		$id = intval($id);
		if ($id) {
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM amika WHERE id =' . $id);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$newsItem = $result->fetch();
			return $newsItem;
			
		}
	}
	public static function getNewsList()
	{
		$db = Db::getConnection();
		$result = $db->query('SELECT id,title,date,author_name,short_content FROM amika ORDER BY id ASC LIMIT 10');
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$newsList = array();
		$i = 0;
		while ($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['author_name'] = $row['author_name'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$i++;
		}
		return $newsList;
	}
}