<?php
class BookManager
{
	private $db;

	public function __construct($db)
	{
		$this->db=$db;
	}

	// public function findById($id)
	// {
	// 	$id=intval($id); 
	// 	$res = mysqli_query($this->db, "SELECT * FROM books WHERE id='".$id."'");
	// 	$books = mysqli_fetch_object($res, "books", [$this->db]); 
	// 	return $books;
	// }

	public function search($name, $author, $country, $gender, $year, $editorial)
	{
		$request = "SELECT * FROM books WHERE";
		if ($name != "")
		{
			$name = mysqli_real_escape_string($this->db, $name);
			$request .= "name LIKE '%".$name."%' ";
	    }
	    if ($author != "")
		{
			$author = mysqli_real_escape_string($this->db, $author);
			$request .= "author LIKE '%".$author."%' ";
	    }
	    if ($country != "")
		{
			$country = mysqli_real_escape_string($this->db, $country);
			$request .= "country LIKE '%".$country."%' ";
	    }
	    if ($gender != "")
		{
			$gender = mysqli_real_escape_string($this->db, $gender);
			$request .= "gender LIKE '%".$gender."%' ";
	    }
	    if ($year!= "")
		{
			$year = intval($year);
			$request .= "year LIKE '%".$year."%' ";
	    }
	    if ($editorial != "")
		{
			$editorial = mysqli_real_escape_string($this->db, $editorial);
			$request .= "editorial LIKE '%".$editorial."%' ";
	    }

        $request .= "ORDER BY name DESC";
        $list=[];
		$res = mysqli_query($this->db, $request);
		while ($books = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}

	public function findGenders()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT gender FROM books GROUP BY gender ORDER BY gender");
		while ($gender = mysqli_fetch_assoc($res))
		{
			$list[] = $gender['gender'];
		}
		return $list;
	}
}
	