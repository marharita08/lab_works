<?php
trait my_first_trait {
	public function traitFunction() {
		echo "Hello world";
	}
}
class helloWorld {
	use my_first_trait; 
}
$objTest = new HelloWorld();
$objTest->traitFunction();
?>