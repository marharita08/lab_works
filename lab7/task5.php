<?php 
class Point {
	private $x;
	private $y;
	public function __construct($x, $y) {
		$this->x = $x;
		$this->y = $y;
	}
	public function __get($name) {
		echo "Звертаємося до властивості $name<br>";
		return $this->$name;
	}
	public function __set($name, $value) {
		$this->$name = $value;
		echo "Властивості $name присвоєно значення $value <br>";
	}
	public function __isset($name) {
		echo "Виклик isset() для властивості $name <br>";
		return isset($this->$name);
	}
	public function __unset($name) {
		echo "Виклик unset() для властивості $name <br>";
		unset($this->$name);
	}
	public function __destruct() {
		echo "Точка ($this->x; $this->y) знищується <br>";
	}
}
$p = new Point(8, 16);
echo "x: $p->x<br>";
echo "y: $p->y<br>"; 
if (isset($p->x)) {
	echo "Властивість х задана <br>";
	unset($p->x);
}
if (!isset($p->x)) {
	echo "Властивість х не задана <br>";
}
$p->x = 5;
$p->y = 10;
echo "x: $p->x<br>";
echo "y: $p->y<br>";
?>