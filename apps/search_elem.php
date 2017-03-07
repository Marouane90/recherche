<?php
$bookManager = new BookManager($db);

if (isset($_GET['isbn'], $_GET['price_min'], $_GET['price_max'], $_GET['year_min'], $_GET['year_max'], $_GET['gender'], $_GET['name'], $_GET['author'], $_GET['country'], $_GET['editorial']))
{

	$list = $bookManager->search($_GET['isbn'], $_GET['price_min'], $_GET['price_max'], $_GET['year_min'], $_GET['year_max'], $_GET['gender'], $_GET['name'], $_GET['author'], $_GET['country'], $_GET['editorial']);

	
	foreach ($list AS $books)
	{
		require ("views/search_elem.phtml");
	}
}
// liste de category => categories
?>