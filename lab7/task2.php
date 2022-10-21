<?php 
class Point {
	private $x;
	private $y;
	public function __construct($x, $y) {
		$this->x = $x;
		$this->y = $y;
	}
	public function __get($name) {
		echo "Звертаємося до властивості $name<br/>";
		return $this->$name;
	}
	public function __set($name, $value) {
		$this->$name = $value;
		echo "Властивості $name присвоєно значення $value <br/>";
	}
}
$p = new Point(8, 16);
echo "x: $p->x<br/>";
echo "y: $p->y<br/>"; 
$p->x = 5;
$p->y = 10;
echo "x: $p->x<br/>";
echo "y: $p->y<br/>"; 
?>