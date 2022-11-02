<?php
interface Factory {
	public function getHuman();
}
interface Human {
	public function printData();
}
class PatientFactory implements Factory {
	public function getHuman() {
		return new Patient();
	}
}
class DoctorFactory implements Factory {
	public function getHuman() {
		return new Doctor();
	}
}
class Patient implements Human {
	private $name;
	private $surname;
	private $age;
	private $cardNumber;
	
	public function __set($name, $value) {
		$this->$name = $value;
	}
	
	public function printData() {
		echo "<p>";
		echo "Patient:<br>";
		echo "Name: $this->name<br>";
		echo "Surname: $this->surname<br>";
		echo "Age: $this->age<br>";
		echo "Card number: $this->cardNumber<br>";
		echo "</p>";
	}
}
class Doctor implements Human {
	private $name;
	private $surname;
	private $age;
	
	public function __set($name, $value) {
		$this->$name = $value;
	}
	
	public function printData() {
		echo "<p>";
		echo "Doctor:<br>";
		echo "Name: $this->name<br>";
		echo "Surname: $this->surname<br>";
		echo "Age: $this->age<br>";
		echo "</p>";
	}
}
$factory = new PatientFactory();
$patient = $factory->getHuman();
$patient->name = "Jake";
$patient->surname = "Smith";
$patient->age = 25;
$patient->cardNumber = 325;

$factory = new DoctorFactory();
$doctor = $factory->getHuman();
$doctor->name = "John";
$doctor->surname = "Walker";
$doctor->age = 35;

$patient->printData();
$doctor->printData();

?>