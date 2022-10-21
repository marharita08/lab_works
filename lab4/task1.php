<?php 
class Coor { 
	private $text;
	static $count = 0;
	function __construct($text) { 
		$this->text=$text;
		Coor::$count++;
	} 
	function getName() { 
		echo "<p>Name: $this->text <br>"; 
	}
} 
echo Coor::$count."<br>";
$object = new Coor("Nick"); 
echo Coor::$count."<br>";
$object->Getname(); 
?>
