<?php
abstract class Figure {
	abstract public function area();
}
class Circle extends Figure {
	private $r;
	function __construct($r) {
		$this->r=$r;
	}
	public function area() {
		return M_PI*pow($this->r, 2);
	}
	public function showArea() {
		echo "Circle with r = $this->r has area $this->area() <br>";
	}
}
class Rectangle extends Figure {
	private $l;
	private $w;
	function __construct($l, $w) {
		$this->l=$l;
		$this->w=$w;
	}
	public function area() {
		return $this->l * $this->w;
	}
	
	public function showArea() {
		echo "Rectangle with l = $this->l and w = $this->w has area $this->area() <br>";
	}
}
$circle = new Circle(3);
$circle->showArea();
$rectangle = new Rectangle(5, 3);
$rectangle->showArea();
?>