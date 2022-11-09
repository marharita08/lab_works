<?php
class Patient {
 	private $surname;
  	private $age;
  	private $cardNumber;
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

	public function getSurname() {
		return $this->surname;
	}
	public function getAge() {
		return $this->age;
	}
	public function getCardNumber() {
		return $this->cardNumber;
	}
	public function getName() {
		return $this->name;
	}
	
	public function __clone(){}
}

function showObjects($patients) {
	echo "<table>";
	echo "<tr>";
	echo "<th>Num</th> <th>Name</th> <th>Surname</th> <th> Age</th>";
	echo "</tr>";
	foreach($patients as $patient) {
		echo "<tr>";
		echo "<td>" . $patient->getCardNumber() . "</td>";
		echo "<td>" . $patient->getName() . "</td>";
		echo "<td>" . $patient->getSurname() . "</td>";
		echo "<td>" . $patient->getAge() . "</td>";
		echo "</tr>";
	}
	echo "</table>";;
}

$surnames = array("Johnson", "Smith", "Lake", "Walker", "Thompson");
$names = array("Hunter", "Jenn", "Brian", "Martin", "Molly");
$ages = array(25, 40, 36, 18, 52);
$patients = array();
$prototype = new Patient();
for($i=0;$i<5;$i++) {
   	$patients[$i] = clone $prototype;
   	$patients[$i]->setSurname($surnames[$i]);
	$patients[$i]->setName($names[$i]);
   	$patients[$i]->setAge($ages[$i]);
   	$patients[$i]->setCardNumber($i+1);
}
showObjects($patients);
?>