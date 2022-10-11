<?php
class Patient {
 	public $surname;
  	public $age;
  	public $cardNumber;

  	public function setSurname($surname) {
		$this->surname = $surname;
	}
	public function setAge($age) {
	  	$this->age = $age;
	}
	public function setCardNumber($number) {
	  	$this->cardNumber = $number;
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

	public function showSurname() {
	  	echo $this->surname . " ";
	}
	public function showAge() {
	  	echo $this->age . " ";
	}
	public function showCardNumber() {
	  	echo $this->cardNumber . " ";
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
$patient->publicFunc();

?>
