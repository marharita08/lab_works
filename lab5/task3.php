<?php
abstract class Human {
	protected $name;
	protected $surname;
	protected $age;
	abstract public function showData();
}
class Patient extends Human {
	private $cardNumber;
	
	function __construct($cardNumber, $name, $surname, $age) {
		$this->cardNumber=$cardNumber;
		$this->name=$name;
		$this->surname=$surname;
		$this->age=$age;
	}
	
	public function showData() {
		echo "<p>";
		echo "$this->name $this->surname is Patient<br>";
		echo "Age: $this->age <br>";
		echo "Card number:  $this->cardNumber <br>";
		echo "</p>";
	}
}

class Doctor extends Human {
	
	function __construct($name, $surname, $age) {
		$this->name=$name;
		$this->surname=$surname;
		$this->age=$age;
	}
	
	public function showData() {
		echo "<p>";
		echo "$this->name  $this->surname is Doctor<br>";
		echo "Age: $this->age <br>";
		echo "</p>";
	}
}
$patient = new Patient(368, "Tom", "Walker", 23);
$patient->showData();
$doctor = new Doctor("Harry", "Johnson", 42);
$doctor->showData();
?>