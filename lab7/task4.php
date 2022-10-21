<?php
class Patient {
 	private $surname;
  	private $age;
  	private $cardNumber;
	
	public function __set($name, $value) {
		if ($name == 'age') {
			$this->checkAge($value);
			$this->age = $value;
		} else if ($name == 'surname') {
			$this->checkSurname($value);
			$this->surname = $value;
		} else if ($name == 'cardNumber'){
			$this->checkCardNumber($value);
			$this->cardNumber = $value;
		} else {
			exit ("Невідома властивість");
		}
	}
	
	private function checkAge($age) {
		if (!(is_integer($age) && $age >= 0 && $age < 150)) {
			exit ("Некоректний вік");
		}
	}
	private function checkSurname($surname) {
		if ($surname == '') {
			exit ("Некоректне ім'я");
		}
	}
	private function checkCardNumber($cardNumber) {
		if (!(is_integer($cardNumber) && $cardNumber >= 0)) {
			exit ("Некоректний номер карти");
		}
	}

  	public function __get($name) {
		if ($name == 'age' || $name == 'surname' || $name == 'cardNumber') {
			return $this->$name;
		}
		exit('Невідома властивість');
	}
}
$surnames = array("Johnson", "Smith", "Lake");
$ages = array(25, 40, 36);
$patients = array();
for($i=0;$i<3;$i++) {
   	$patients[$i] = new Patient();
   	$patients[$i]->surname = $surnames[$i];
   	$patients[$i]->age = $ages[$i];
   	$patients[$i]->cardNumber = $i+1;
}
foreach($patients as $patient) {
	echo "<p>";
	echo "Card number: $patient->cardNumber<br>";
	echo "Surname: $patient->surname<br>";
	echo "Age: $patient->age<br>";
	echo "</p>";
}
$patients[0]->cardNumber = -1;

?>