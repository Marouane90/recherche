<?php
$bookManager = new BookManager($db);
$books = $bookManager->search($_GET['search']);
// liste de category => categories
foreach ($books AS $index => $books)
{
	require ("views/search_elem.phtml");
}
?>