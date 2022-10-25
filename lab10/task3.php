<?php
abstract class Vehicle {
	protected $country;
	protected $brand;
	protected $year;
	
	public function getDataAsStr() {
		$str = "Country: $this->country <br>";
		$str .= "Brand: $this->brand <br>";
		$str .= "Year: $this->year <br>";
		return $str;
	}
	public function printData() {
		echo "<p>";
		echo $this->getDataAsStr();
		echo "</p>";
	}
}
class Car extends Vehicle {
	private $engine;
	private $power;
	private $color;
	
	public function __set($name, $value) {
		$this->$name = $value;	
	}
	
	public function getDataAsStr() {
		$str = parent::getDataAsStr();
		$str .= "Engine: $this->engine<br>";
		$str .= "Power: $this->power<br>";
		$str .= "Color: $this->color<br>";
		return $str;
	}
}
class Bike extends Vehicle {
	private $weight;
	private $type;
	private $wheelDiameter;
	
	public function __set($name, $value) {
		$this->$name = $value;	
	}
	
	public function getDataAsStr() {
		$str = parent::getDataAsStr();
		$str .= "Weight: $this->weight<br>";
		$str .= "Type: $this->type<br>";
		$str .= "Wheel diameter: $this->wheelDiameter<br>";
		return $str;
	}
}
class Motorcycle extends Vehicle {
	private $engine;
	private $color;
	private $type;
	
	public function __set($name, $value) {
		$this->$name = $value;	
	}
	
	public function getDataAsStr() {
		$str = parent::getDataAsStr();
		$str .= "Engine: $this->engine<br>";
		$str .= "Color: $this->color<br>";
		$str .= "Type: $this->type<br>";
		return $str;
	}
}
class VehicleFactory {
	public static function create($objType) {
		switch ($objType) {
			case 'Car':
			case 'car':
				return new Car();
			case 'Bike':
			case 'bike':
				return new Bike();
			case 'Motorcycle':
			case 'motorcycle':
				return new Motorcycle();
			default:
				exit("Wrong vehicle type");
		}
	}
}
$car = VehicleFactory::create('Car');
$car->country = 'France';
$car->brand = 'Renault';
$car->year = 2019;
$car->engine = 'Renault';
$car->power = 110;
$car->color = 'black';
$car->printData();


$bike = VehicleFactory::create('Bike');
$bike->country = 'Ukraine';
$bike->brand = 'Discovery';
$bike->year = 2021;
$bike->weight = '8 kg';
$bike->type = 'mountan bike';
$bike->wheelDiameter = '60 sm';
$bike->printData();

$motorcycle = VehicleFactory::create('motorcycle');
$motorcycle->country = 'USA';
$motorcycle->brand = 'Harley-Davidson';
$motorcycle->year = 2016;
$motorcycle->engine = 'Harley-Davidson';
$motorcycle->color = 'black';
$motorcycle->type = 'sportbike';
$motorcycle->printData();

$bus = VehicleFactory::create('bus');
?>