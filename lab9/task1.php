<?php
class SomeClass {
	protected static $_instance; 
	private $name;
	private function __construct() { 
	}
	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new self; 
		}
		return self::$_instance;
	}
 
	private function __clone() {
	}
	private function __wakeup() {
	} 
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

$third = new SomeClass();

?>
