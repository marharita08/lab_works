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
}
class ChildrenHospital {
	public static $patients = array();
}
class AdultHospital {
	public static $patients = array();
}
abstract class Regisration {
	
	protected $_next;
	
	abstract public function register($patient);
	
	public function setNext($next) {
		$this->_next = $next;
	}
	
	public function getNext() {
		return $this->_next;
	}
}
class ChildrenHospitalRegisration extends Regisration {
	private $cardNumberGenerator;
	
	public function __construct() {
		$this->cardNumberGenerator = rand(100, 999);
	}
	
	public function register($patient) {
		if ($patient->getAge() < 18) {
			$patient->setCardNumber($this->cardNumberGenerator++);
			ChildrenHospital::$patients[] = $patient;
		} else {
			if ($this->getNext()) {
				$this->getNext()->register($patient);
			}
		}
	}
}
class AdultHospitalRegisration extends Regisration {
	private $cardNumberGenerator;
	
	public function __construct() {
		$this->cardNumberGenerator = rand(100, 999);
	}
	
	public function register($patient) {
		if ($patient->getAge() >= 18) {
			$patient->setCardNumber($this->cardNumberGenerator++);
			AdultHospital::$patients[] = $patient;
		} else {
			if ($this->getNext()) {
				$this->getNext()->register($patient);
			}
		}
	}
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
$surnames = array("Johnson", "Smith", "Lake", "Walker", "Thompson", "Riddle", "King");
$names = array("Hunter", "Jenn", "Brian", "Martin", "Molly", "Mary", "Jeremy");

$registration = new AdultHospitalRegisration();
$registration->setNext(new ChildrenHospitalRegisration());

for($i=0;$i<10;$i++) {
   	$patient = new Patient();
   	$patient->setSurname(array_rand(array_flip($surnames), 1));
	$patient->setName(array_rand(array_flip($names), 1));
   	$patient->setAge(rand(0, 80));
   	$registration->register($patient);
}
echo "<h3>Patients of children hospital</h3>";
showObjects(ChildrenHospital::$patients);
echo "<h3>Patients of adult hospital</h3>";
showObjects(AdultHospital::$patients);
?>