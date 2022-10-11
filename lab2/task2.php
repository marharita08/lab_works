<?php 
class Coor { 
	private $text; 
	function __construct($text) { 
		$this->text=$text; 
	} 
	function getName() { 
		echo "<p>Name: ".$this->text."<br></p>"; 
	} 
}
$object = new Coor("Nick"); 
$object->getName(); 
unset($object);
if(!isset($object)){
	echo "Object is deleted!";
}
?>
