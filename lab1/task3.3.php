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

function showObjects($patients) {
	echo "<table>";
	echo "<tr>";
	echo "<th>Num</th> <th>Name</th> <th>Surname</th> <th> Age</th>";
	echo "</tr>";
	foreach($patients as $patient) {
		echo "<tr>";
		echo "<td>" . $patient->cardNumber . "</td>";
		echo "<td>" . $patient->getName() . "</td>";
		echo "<td>" . $patient->getSurname() . "</td>";
		echo "<td>" ;
		$patient->showAge();
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";;
}

$surnames = array("Johnson", "Smith", "Lake", "Walker", "Thompson");
$names = array("Hunter", "Jenn", "Brian", "Martin", "Molly");
$ages = array(25, 40, 36, 18, 52);
$patients = array();
for($i=0;$i<5;$i++) {
   	$patients[$i] = new Patient();
   	$patients[$i]->setSurname($surnames[$i]);
	$patients[$i]->setName($names[$i]);
   	$patients[$i]->setAge($ages[$i]);
   	$patients[$i]->setCardNumber($i+1);
}
showObjects($patients);
?>