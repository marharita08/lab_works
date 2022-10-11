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
}

$surnames = array("Johnson", "Smith", "Lake");
$ages = array(25, 40, 36, 18, 52);
$patients = array();
for($i=0;$i<3;$i++) {
   	$patients[$i] = new Patient();
   	$patients[$i]->surname = $surnames[$i];
   	$patients[$i]->setAge($ages[$i]);
   	$patients[$i]->setCardNumber($i+1);
}
foreach($patients as $patient) {
	echo "<p>";
	echo "Card number: " . $patient->cardNumber . "<br>";
	echo "Surname: ";
	echo $patient->showSurname();
	echo "<br>";
	echo "Age: " . $patient->getAge(). "<br>";
	echo "</p>";
}
$searchedNumber = 2;
$searchedPatient = Patient::searchByCardNumber($patients, $searchedNumber);
echo "<br>Search by card number " . $searchedNumber . "<br>";
echo "<p>";
echo "Card number: " . $searchedPatient->cardNumber . "<br>";
echo "Surname: ";
echo $searchedPatient->showSurname();
echo "<br>";
echo "Age: " . $searchedPatient->getAge(). "<br>";
echo "</p>";

?>
