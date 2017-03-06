<?php
class ProductsManager
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
		while($product = mysqli_fetch_object($res, "Products", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}