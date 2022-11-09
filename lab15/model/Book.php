<?php
class Book { 
	public $title; 
	public $author; 
	public $description; 
	public $year;
	public $pages;
	public $photo;
 
	public function __construct($title, $author, $description, $year, $pages, $photo) { 
		$this->title = $title; 
		$this->author = $author; 
		$this->description = $description; 
		$this->year = $year;
		$this->pages = $pages;
		$this->photo = $photo;
	} 
} 
?>
