<?php
$bookManager = new BookManager($db);
$book = $bookManager->search($_GET['search']);
// liste de category => categories
foreach ($book AS $index => $book)
{
	require ("views/search_book.phtml");
}
?>