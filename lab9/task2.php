<?php
trait SingletonTrait {
    protected static $_instance; 

	protected function __construct() { 
	}
	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new self; 
		}
		return self::$_instance;
	}
 
	protected function __clone() {
	}
	protected function __wakeup() {
	} 
}
class SomeClass {
	use SingletonTrait;
	private $name;

	public function setName($name) {
		$this->name = $name;
	}
	public function showMessage() {
		echo "Hello $this->name!<br>";
	}
}

$first = SomeClass::getInstance();
$first->setName("John");
$first->showMessage();

$second = SomeClass::getInstance();
$second->setName("Ben");
$second->showMessage();

$first->showMessage();

$third = clone $first;

?>