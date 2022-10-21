<?php
interface Point {
	public function getX();
	public function getY();
	public function setX($x);
	public function setY($y);
}
interface ColoredObject {
	public function getColor();
	public function setColor($color);
}
class ColoredPoint implements Point, ColoredObject {
	private $x;
	private $y;
	private $color;
	
	function getX() {
		return $this->x;
	}
	function getY() {
		return $this->y;
	}
	function getColor() {
		return $this->color;
	}
	function setX($x) {
		$this->x = $x;
	}
	function setY($y) {
		$this->y = $y;
	}
	function setColor($color) {
		$this->color = $color;
	}
}
$points = array();
$colores = array("red", "green", "blue", "white", "black");
for($i=0;$i<3;$i++) {
	$points[$i] = new ColoredPoint();
	$points[$i]->setX(rand(-50, 50));
	$points[$i]->setY(rand(-50, 50));
	$points[$i]->setColor(array_rand(array_flip($colores), 1));
}
foreach($points as $point) {
	echo "<p>";
	echo "Point:<br>";
	echo "x = $point->getX() <br>";
	echo "y = $point->getY() <br>";
	echo "color = $point->getColor() <br>";
	echo "</p>";
}
?>