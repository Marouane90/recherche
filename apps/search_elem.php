<?php
$bookManager = new BookManager($db);
if (isset($_GET['name'], $_GET['author']))
{
	$list = $bookManager->search($_GET['name'], $_GET['author']);
	foreach ($list AS $books)
	{
		require ("views/search_elem.phtml");		
	}
}
// liste de category => categories
?>