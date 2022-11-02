<?php
class Config {
	public static $factory;
}
abstract class Car {
	private $country;
	private $brand;
	
	public function __construct($country, $brand) {
		$this->country = $country;
		$this->brand = $brand;
	}
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
}
abstract class AbstractFactory {
	public static function getFactory() {
		switch (Config::$factory) {
			case 'ua':
				return new UkrainianFactory();
			case 'de':
				return new GermanFactory();
		}
		throw new Exception('Bad config');
	}
	abstract public function getPassengerCar();
	abstract public function getBus();
	abstract public function getTruck();
}
class UkrainianFactory extends AbstractFactory {
	public function getPassengerCar() {
		$brands = array('ЗАЗ');
		return new PassengerCar('Ukraine', array_rand(array_flip($brands), 1));
	}
	public function getBus() {
		$brands = array('Богдан', 'БАЗ');
		return new Bus('Ukraine', array_rand(array_flip($brands), 1), rand(15, 30));
	}
	public function getTruck() {
		$brands = array('КрАЗ');
		return new Truck('Ukraine', array_rand(array_flip($brands), 1), rand(1, 2) . ' т');
	}
}
class GermanFactory extends AbstractFactory {
	public function getPassengerCar() {
		$brands = array('BMW', 'Audi', 'Mercedes-Benz', 'Porsche');
		return new PassengerCar('Germeny', array_rand(array_flip($brands), 1));
	}
	public function getBus() {
		$brands = array('Neoplan', 'Setra');
		return new Bus('Germeny', array_rand(array_flip($brands), 1), rand(25, 50));
	}
	public function getTruck() {
		$brands = array('Mercedes-Benz', 'MAN', 'Magirus-Deutz');
		return new Truck('Germeny', array_rand(array_flip($brands), 1), rand(1, 2) . ' t');
	}
}
class PassengerCar extends Car {
	
}
class Bus extends Car {
	private $sittingPlaces;
	public function __construct($country, $brand, $sittingPlaces) {
		parent::__construct($country, $brand);
		$this->sittingPlaces = $sittingPlaces;
	}
	public function getDataAsStr() {
		$str = parent::getDataAsStr();
		$str .= "Sitting places: $this->sittingPlaces<br>";
		return $str;
	}
}
class Truck extends Car {
	private $loadCapacity;
	public function __construct($country, $brand, $loadCapacity) {
		parent::__construct($country, $brand);
		$this->loadCapacity = $loadCapacity;
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
Config::$factory = $factory;
$cars = array($carNum + $truckNum + $busNum);
$currFactory = AbstractFactory::getFactory();
for($i = 0; $i < $carNum; $i++) {
	$cars[$i] =  $currFactory->getPassengerCar();
}
for($i = $carNum; $i < $carNum + $truckNum; $i++) {
	$cars[$i] = $currFactory->getTruck();
}
for($i = $carNum + $truckNum; $i < $carNum + $truckNum + $busNum; $i++) {
	$cars[$i] = $currFactory->getBus();
}
foreach($cars as $car) {
	$car->printData();
}
?>
