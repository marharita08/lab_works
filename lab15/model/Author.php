<?php
class Author { 
	public $name; 
	public $surname; 
	public $country; 
 
	public function __construct($name, $surname, $country) { 
		$this->name = $name; 
		$this->surname = $surname; 
		$this->country = $country; 
	} 
} 
?>