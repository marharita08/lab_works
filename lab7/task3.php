<?php
trait my_first_trait {
	private $name;
	
	public function __set($name, $value) {
		if($name == "name") {
			$this->$name = $value;
		} else {
			exit("Unknown property");
		}
	}
	public function __get($name) {
		if($name == "name") {
			return $this->$name;
		} else {
			exit("Unknown property");
		}
	}
	public function traitFunction() {
		echo "Hello $this->name <br>";
	}
	public function greetings() {
		$currTime = time();
		$morningStart = date_timestamp_get(DateTime::createFromFormat('h:i a', "04:00 am"));
		$afternoonStart = date_timestamp_get(DateTime::createFromFormat('h:i a', "12:00 pm"));
		$eveningStart = date_timestamp_get(DateTime::createFromFormat('h:i a', "05:00 pm"));
		$nightStart = date_timestamp_get(DateTime::createFromFormat('h:i a', "09:00 pm"));
		if ($currTime >= $morningStart && $currTime < $afternoonStart) {
			echo "Good morning<br>";
		} else if ($currTime >= $afternoonStart && $currTime < $eveningStart) {
			echo "Good afternoon<br>";
		} else if ($currTime >= $eveningStart && $currTime < $nightStart) {
			echo "Good evening<br>";
		} else {
			echo "Good night<br>";
		}
	}
}
class helloWorld {
	use my_first_trait; 
}
$objTest = new HelloWorld();
$objTest->name = "John";
$objTest->traitFunction();
$objTest->greetings();
?>