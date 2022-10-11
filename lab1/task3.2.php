<?php
class Patient {
 	public $surname;
  	public $age;
  	public $cardNumber;
	private $name;

  	public function setSurname($surname) {
		$this->surname = $surname;
	}
	public function setAge($age) {
	  	$this->age = $age;
	}
	public function setCardNumber($number) {
	  	$this->cardNumber = $number;
	}
	public function setName($number) {
	  	$this->name = $number;
	}

	function getSurname() {
		return $this->surname;
	}
	public function getAge() {
		return $this->age;
	}
	public function getCardNumber() {
		return $this->cardNumber;
	}
	function getName() {
		return $this->name;
	}

	public function showSurname() {
	  	echo $this->surname . " ";
	}
	public function showAge() {
	  	echo $this->age . " ";
	}
	public function showCardNumber() {
	  	echo $this->cardNumber . " ";
	}
	public function showName() {
	  	echo $this->name . " ";
	}

	public static function searchByCardNumber($patients, $cardNumber) {
		foreach($patients as $patient){
			if($patient->cardNumber == $cardNumber) {
				return $patient;
			}
		}
	}
	
	private function privateFunc() {
		echo "Hello from private function<br>";
	}
	public function publicFunc() {
		echo "Hello from public function<br>";
		$this->privateFunc();
	}
}

$patient = new Patient();
$patient->setSurname("Johnson");
$patient->setAge(30);
$patient->setCardNumber(1);
$patient->setName("Hunter");

echo "<p>";
echo "Card number: " . $patient->cardNumber . "<br>";
echo "Surname: " . $patient->surname . "<br>";
//echo "Name: " . $patient->name . "<br>";
echo "Name: " . $patient->getName() . "<br>";
echo "Age: " . $patient->age. "<br>";
echo "</p>";
?>
