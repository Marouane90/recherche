<?php
class books
{
	private $id;
	private $name; 
	private $author; 
	private $country; 
	private $gender; 
	private $year; 
	private $editorial;

	private $db;
	// private $category;

	public function __construct($db)
	{
		$this->db = $db;
	}


	public function getId()
	{
		return $this->id;
	} 
	public function getName()
	{
		return $this->name;
	} 
	public function getAuthor()
	{
		return $this->author;
	} 
	public function getCountry()
	{
		return $this->country;
	}
	public function getGender()
	{
		return $this->gender;
	} 
	public function getYears()
	{
		return $this->years;
	} 