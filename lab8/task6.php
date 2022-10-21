<?php
trait Point {
	private $x;
	private $y;
	
	public function getX() {
		return $this->x;
	}
	public function getY() {
		return $this->y;
	}
}
trait ColoredObject {
	private $color;
	public function getColor() {
		return $this->color;
	}
}
class ColoredPoint {
	use Point, ColoredObject;
	function __construct($x, $y, $color) {
		$this->x = $x;
		$this->y = $y;
		$this->color = $color;
	}
}
$points = array();
$colores = array("red", "green", "blue", "white", "black");
for($i=0;$i<3;$i++) {
	$points[$i] = new ColoredPoint(rand(-50, 50), rand(-50, 50), array_rand(array_flip($colores), 1));
}
foreach($points as $point) {
	echo "<p>";
	echo "Point:<br>";
	echo "x = " . $point->getX() . "<br>";
	echo "y = " . $point->getY() . "<br>";
	echo "color = " . $point->getColor() . "<br>";
	echo "</p>";
}
?>