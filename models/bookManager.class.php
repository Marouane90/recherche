<?php
class BookManager
{
	private $db;

	public function __construct($db)
	{
		$this->db=$db;
	}
	public function search($search)
	{
		$list = [];
		$recherche = mysqli_real_escape_string($this->db, $search);
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE name LIKE '%".$recherche."%' OR author LIKE '%".$recherche."%' OR country LIKE '%".$recherche."%' OR gender LIKE '%".$recherche."%'OR year LIKE '%".$recherche."%' OR editorial LIKE '%".$recherche."%'");
		while($product = mysqli_fetch_object($res, "books", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
	public function findById($id)
	{
		$id=intval($id); 
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE id='".$id."'");
		$user = mysqli_fetch_object($res, "books", [$this->db]); 
		return $user;
	}
	public function findByAuthor($search)
	{
		$list = [];
		$author = mysqli_real_escape_string($this->db, $search);
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE author='".$author."' ORDER BY author DESC");
		while ($author = mysqli_fetch_object($res, "books", [$this->db]))
		{
			$list[] = $author;
		}
		return $list;
		var_dump($author);
	}