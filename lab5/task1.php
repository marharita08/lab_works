<?php
abstract class Coor {  
	private $firstName = "";   private $lastName = ""; 

	public function setName( $firstName, $lastName ) {//method which set a whole name
		$this->firstName = $firstName; 
		$this->lastName = $lastName; 
	}    
	public function getName() {//method, which return a name.
		return "$this->firstName $this->lastName"; 
	}   
	abstract public function showWelcomeMessage();//abstract function
} 

class Visitor extends Coor{ 
	public function showWelcomeMessage() {//redefinition of abstract method
		echo "Hi  $this->getName(), welcome to our shop!To buy something, please, register!<br>"; 
	}    
	public function newMessage( $subject ) {     
		echo "Creating new message $subject<br>"; 
	} 
}    

class Shopper extends Coor { 
	public function showWelcomeMessage() {//redefinition of abstract method
		echo "Hi $this->getName(), welcome to our online store!<br>"; 
	} 
	public function addToCart( $item ) {     
		echo "Adding $item to cart<br>"; 
	} 
}

$visitor = new Visitor();
$visitor->setName("Brian", "Smith");
$visitor->showWelcomeMessage();
$visitor->newMessage("shopping");
echo "<br>";
$shopper=new Shopper();
$shopper->setName("Emma", "Walker");
$shopper->showWelcomeMessage();
$shopper->addToCart("nail polish");
$shopper->addToCart("nail lamp");
?>
