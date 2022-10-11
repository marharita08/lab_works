<?php 
class Coor { 
	private $text; 
	function __construct($text) { 
		$this->text=$text; 
	} 
	function getName() { 
		echo "<p>Name: ".$this->text."<br></p>"; 
	} 
	function __destruct() {
       print "Destroying " . $this->text . "\n";
   }
}
$object = new Coor("Nick"); 
$object->getName(); 
?>