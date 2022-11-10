<?php
class Patient {
	public function __set($name, $value) {
		$this->_data[$name]=$value;
	}
	
	public function printData() {
		echo "<p>";
		echo "Patient<br>";
		echo "Name: " . $this->_data['name']."<br>";
		echo "Surname: " . $this->_data['surname']."<br>";
		echo "Age: " . $this->_data['age']."<br>";
		echo "Card number: " . $this->_data['cardNumber']."<br>";
		echo "</p>";
	}
}
class Doctor {
	public function __set($name, $value) {
		$this->_data[$name]=$value;
	}
	
	public function printData() {
		echo "<p>";
		echo "Doctor<br>";
		echo "Name: " . $this->_data['name']."<br>";
		echo "Surname: " . $this->_data['surname']."<br>";
		echo "Age: " . $this->_data['age']."<br>";
		echo "</p>";
	}
}
interface RegistrationInterface {
	public function setData($data);
	public function register();
}
class PatientAdapter implements RegistrationInterface {
	protected $_data;
	public function setData($data){
		$this->_data = $data;
	}
	public function register() {
		$patient = new Patient();
		$patient->name = $this->_data['name'];
		$patient->surname = $this->_data['surname'];
		$patient->age = $this->_data['age'];
		$patient->cardNumber = $this->_data['cardNumber'];
		$patient->printData();
	}
}
class DoctorAdapter implements RegistrationInterface {
	protected $_data;
	public function setData($data) {
		$this->_data = $data;
	}
	public function register() {
		$doctor = new Doctor();
		$doctor->name = $this->_data['name'];
		$doctor->surname = $this->_data['surname'];
		$doctor->age = $this->_data['age'];
		$doctor->printData();
	}
}
interface IRegistrationManager {
	public function register($type = '', $data);
}
class RegistrationManager implements IRegistrationManager {
	public function register($type = '', $data) {
		switch($type){
			case "patient":
				$registration = new PatientAdapter();
				break;
			case "doctor":
				$registration = new DoctorAdapter();
				break;
			default:
				echo "еrror";
				return false;
		}
		$registration->setData($data);
		$registration->register(); 
	}
}
$arrayForPatient = array("name" => "John", 
						 "surname" => "Johnson",
						 "age" => 32,
						 "cardNumber" => 2365);
$arrayForDoctor = array("name" => "Jonatan", 
						"surname" => "Smith",
						"age" => 35);
$a = new RegistrationManager();
$a->register("patient",$arrayForPatient);
$a->register("doctor",$arrayForDoctor);
?>