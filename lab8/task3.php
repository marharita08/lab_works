<?php 
class Coor{
	private $age;
	private $name;
	public function __construct($name, $age) {
		$this->age = $age;
		$this->name = $name;
	}
	public function __set($name, $value) {
		if ($name == 'age') {
			if (is_integer($value) && $value >= 0 && $value < 150) {
				$this->age = $value;
			} else {
				exit ("Некоректний вік");
			}
		} else if ($name == 'name') {
			if ($value != '') {
				$this->name = $value;
			} else {
				exit ("Некоректне ім'я");
			}
		} else {
			exit ("Невідома властивість");
		}
	}
	public function __get($name) {
		if ($name == 'age' || $name == 'name') {
			return $this->$name;
		}
		exit('Невідома властивість!');
	}
}
$user = new Coor("Hanna", 25);
echo "Name: $user->name Age: $user->age<br>";
$user->name = "James";
$user->age = 30;
echo "Name: $user->name Age: $user->age<br>";
$user->surname = "Smith";
?>