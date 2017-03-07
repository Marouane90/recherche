<?php
class BookManager
{
	private $db;

	public function __construct($db)
	{
		$this->db=$db;
	}

	public function findById($id)
	{
		$id=intval($id); 
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE id='".$id."'");
		$books = mysqli_fetch_object($res, "books", [$this->db]); 
		return $books;
	}

	public function search($search)
	{
		// $list = [];
		$name = mysqli_real_escape_string($this->db, $books->getName());
		$author = mysqli_real_escape_string($this->db, $books->getAuthor());
		$country = mysqli_real_escape_string($this->db, $books->getCountry());
		$gender = mysqli_real_escape_string($this->db, $books->getGender());
		$year = intval($this->db, $books->getYear());
		$editorial = mysqli_real_escape_string($this->db, $books->getEditorial());
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE name LIKE '%".$name."%' OR author LIKE '%".$author."%' OR country LIKE '%".$country."%' OR gender LIKE '%".$gender."%'OR year LIKE '%".$year."%' OR editorial LIKE '%".$editorial."%'");
		// while($product = mysqli_fetch_object($res, "books", [$this->db]))
		// {
		// 	$list[] = $books;
		// }
		// return $list;
	}
	// public function findByAuthor($author)
	// {
	// 	$list = [];
	// 	$author = mysqli_real_escape_string($this->db, $author);
	// 	$res = mysqli_query($this->db, "SELECT * FROM books WHERE author='".$author."' ORDER BY author DESC");
	// 	while ($author = mysqli_fetch_object($res, "books", [$this->db]))
	// 	{
	// 		$list[] = $author;
	// 	}
	// 	var_dump($author);
	// 	return $list;
	// }
}