<?php
$bookManager = new BookManager($db);
if (isset($_GET['name'], $_GET['author'], $_GET['country'], $_GET['gender'], $_GET['year'],$_GET['editorial']))
{

	$list = $bookManager->search($_GET['name'], $_GET['author'], $_GET['country'], $_GET['gender'], $_GET['year'], $_GET['editorial']);
	
	foreach ($list AS $books)
	{
		require ("views/search_elem.phtml");		
	}
}
// liste de category => categories
?>