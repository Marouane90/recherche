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

	public function search($isbn, $price_min, $price_max, $year_min, $year_max, $gender, $name, $author, $country, $editorial)
	{
		$request = "SELECT * FROM books WHERE 1 ";

		if ($isbn!= "")
		{
			$isbn = mysqli_real_escape_string($this->db, $isbn);
			$request .= " AND isbn LIKE '%".$isbn."%' ";
	    }
	    if ($price_min!= "")
		{
			$price_min = intval($price_min);
			$request .= "AND price >= '".$price_min."' ";
	    }
	    if ($price_max!= "")
		{
			$price_max = intval($price_max);
			$request .= "AND price <= '".$price_max."' ";
	    }
	    if ($year_min!= "")
		{
			$year_min = intval($year_min);
			$request .= "AND YEAR(year) >='".$year_min."' ";
	    }
	    if ($year_max!= "")
		{
			$year_max = intval($year_max);
			$request .= "AND YEAR(year) <= '".$year_max."' ";
	    }
	    if ($gender != "")
		{
			$gender = mysqli_real_escape_string($this->db, $gender);
			$request .= "AND gender LIKE '%".$gender."%' ";
	    }
		if ($name != "")
		{
			$name = mysqli_real_escape_string($this->db, $name);
			$request .= "AND name LIKE '%".$name."%' ";
	    }
	    if ($author != "")
		{
			$author = mysqli_real_escape_string($this->db, $author);
			$request .= "AND author LIKE '%".$author."%' ";
	    }
	    if ($country != "")
		{
			$country = mysqli_real_escape_string($this->db, $country);
			$request .= "AND country LIKE '%".$country."%' ";
	    }
	    if ($editorial != "")
		{
			$editorial = mysqli_real_escape_string($this->db, $editorial);
			$request .= "AND editorial LIKE '%".$editorial."%' ";
	    }

        $request .= "ORDER BY name DESC LIMIT 50";
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
	public function findAll()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT * FROM books ORDER BY gender DESC LIMIT 10");
		var_dump(mysqli_error($this->db));
		while ($books = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
}
	