<?php
class Config {
	public static $factory;
}
trait Human{
	public $name;
	public $surname;
  	public $age;
	
	public function init($name, $surname, $age) {
		$this->name=$name;
		$this->surname=$surname;
		$this->age=$age;
	}
	public function getDataAsStr() {
		$str = "Name: $this->name <br>";
		$str .= "Surname: $this->surname <br>";
		$str .= "Age: $this->age <br>";
		return $str;
	}
	public function printData() {
		echo "<p>";
		echo $this->getDataAsStr();
		echo "</p>";
	}
}
class Patient {
	private $cardNumber;
	
	use Human {
		getDataAsStr as protected getTraitDataAsStr;
	}
	
	public function __construct($name, $surname, $age, $cardNumber) {
		$this->cardNumber = $cardNumber;
		$this->init($name, $surname, $age);
	}
	
	public function getDataAsStr() {
		$str = "Patient:<br>";
		$str .= $this->getTraitDataAsStr();
		$str .= "Card number: $this->cardNumber<br>";
		return $str;
	}
}
class Doctor {
	
	use Human {
		getDataAsStr as protected getTraitDataAsStr;
	}
	
	public function __construct($name, $surname, $age) {
		$this->init($name, $surname, $age);
	}
	
	public function getDataAsStr() {
		$str = "Doctor:<br>";
		$str .= $this->getTraitDataAsStr();
		return $str;
	}
}
abstract class AbstractFactory {
	public static function getFactory() {
		switch (Config::$factory) {
			case 'ua':
				return new UkrainianFactory();
			case 'gb':
				return new GBFactory();
		}
		throw new Exception('Bad config');
	}
	private static $num;
	protected function generateCardNumber(){
		if(!isset(self::$num)){
			self::$num = rand(100, 999);
		} else {
			self::$num++;
		}
		return self::$num;
	}
	abstract public function getPatient();
	abstract public function getDoctor();
}
class UkrainianFactory extends AbstractFactory {
	private $names = array('Іван', 'Марія', 'Василина', 'Григорій', 'Олег');
	private $surnames = array('Іваненко', 'Василенко', 'Григоренко', 'Романенко');
	
	public function getPatient() {
		return new Patient(array_rand(array_flip($this->names), 1), 
							array_rand(array_flip($this->surnames), 1), 
							rand(18, 70), 
							$this->generateCardNumber());
	}
	public function getDoctor() {
		return new Doctor(array_rand(array_flip($this->names), 1), 
							array_rand(array_flip($this->surnames), 1), 
							rand(26, 60));
	}
}
class GBFactory extends AbstractFactory {
	private $names = array('John', 'Mary', 'James', 'Brian', 'Emma');
	private $surnames = array('Smith', 'Walker', 'Cane', 'Johnson');
	
	public function getPatient() {
		return new Patient(array_rand(array_flip($this->names), 1), 
							array_rand(array_flip($this->surnames), 1), 
							rand(18, 70), 
							$this->generateCardNumber());
	}
	public function getDoctor() {
		return new Doctor(array_rand(array_flip($this->names), 1), 
							array_rand(array_flip($this->surnames), 1), 
							rand(26, 60));
	}
}
Config::$factory = 'gb';
$doctorNum = 2;
$patientNum = 4;
$humans = array($doctorNum + $patientNum);
$currFactory = AbstractFactory::getFactory();
for($i = 0; $i < $doctorNum; $i++) {
	$humans[$i] =  $currFactory->getDoctor();
}
for($i = $doctorNum; $i < $doctorNum + $patientNum; $i++) {
	$humans[$i] =  $currFactory->getPatient();
}
foreach($humans as $human) {
	$human->printData();
}
?>