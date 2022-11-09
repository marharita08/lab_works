<?php
abstract class Car {
	private $country;
	private $brand;
	
	public function getDataAsStr() {
		$str = "Country: $this->country <br>";
		$str .= "Brand: $this->brand <br>";
		return $str;
	}
	public function printData() {
		echo "<p>";
		echo $this->getDataAsStr();
		echo "</p>";
	}
	public function __set($name, $value) {
		if($name == 'country' || $name == 'brand') {
			$this->$name = $value;
		}
	}
}
abstract class AbstractFactory {
	public static function getFactory($factory, $car) {
		switch ($factory) {
			case 'ua':
				return new UkrainianFactory($car);
			case 'de':
				return new GermanFactory($car);
		}
		throw new Exception('Bad config');
	}
}
class UkrainianFactory extends AbstractFactory {
	
	private $car;
	
	public function __construct(Car $car) {
		$car->country = 'Ukraine';
		$this->car = $car;
	}
	public function getCar() {
		return clone $this->car;
	}
}
class GermanFactory extends AbstractFactory {
	private $car;
	
	public function __construct(Car $car) {
		$car->country = 'Germeny';
		$this->car = $car;
	}
	public function getCar() {
		return clone $this->car;
	}
}
class PassengerCar extends Car {
	public function __set($name, $value) {
		parent::__set($name, $value);
		$this->$name = $value;
	}
}
class Bus extends Car {
	private $sittingPlaces;
	public function __set($name, $value) {
		parent::__set($name, $value);
		$this->$name = $value;
	}
	public function getDataAsStr() {
		$str = parent::getDataAsStr();
		$str .= "Sitting places: $this->sittingPlaces<br>";
		return $str;
	}
}
class Truck extends Car {
	private $loadCapacity;
	public function __set($name, $value) {
		parent::__set($name, $value);
		$this->$name = $value;
	}
	public function getDataAsStr() {
		$str = parent::getDataAsStr();
		$str .= "Load capacity: $this->loadCapacity<br>";
		return $str;
	}
}
$arr = parse_ini_file('config.txt');
$factory=$arr['factory'];
$carNum=$arr['carNum'];
$truckNum=$arr['truckNum'];
$busNum=$arr['busNum'];

$cars = array($carNum + $truckNum + $busNum);

$passengerCarFactory = AbstractFactory::getFactory($factory, new PassengerCar());
$busFactory = AbstractFactory::getFactory($factory, new Bus());
$truckFactory = AbstractFactory::getFactory($factory, new Truck());

for($i = 0; $i < $carNum; $i++) {
	$cars[$i] =  $passengerCarFactory->getCar();
	if($factory == 'ua') {
		$cars[$i]->brand = 'ЗАЗ';
	} else {
		$brands = array('BMW', 'Audi', 'Mercedes-Benz', 'Porsche');
		$cars[$i]->brand = array_rand(array_flip($brands));
	}
}
for($i = $carNum; $i < $carNum + $truckNum; $i++) {
	$cars[$i] = $truckFactory->getCar();
	if($factory == 'ua') {
		$cars[$i]->brand = 'КрАЗ';
		$cars[$i]->loadCapacity = rand(1, 2) . ' т';
	} else {
		$brands = array('Mercedes-Benz', 'MAN', 'Magirus-Deutz');
		$cars[$i]->brand = array_rand(array_flip($brands));
		$cars[$i]->loadCapacity = rand(1, 2) . ' t';
	}
}
for($i = $carNum + $truckNum; $i < $carNum + $truckNum + $busNum; $i++) {
	$cars[$i] = $busFactory->getCar();
	if($factory == 'ua') {
		$brands = array('Богдан', 'БАЗ');
		$cars[$i]->brand = array_rand(array_flip($brands));
		$cars[$i]->sittingPlaces = rand(15, 30);
	} else {
		$brands = array('Neoplan', 'Setra');
		$cars[$i]->brand = array_rand(array_flip($brands));
		$cars[$i]->sittingPlaces = rand(25, 50);
	}
}
foreach($cars as $car) {
	$car->printData();
}
?>
