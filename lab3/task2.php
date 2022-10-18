<?php
class Point {
	protected $x;
    	protected $y;
	protected $z;
	
	public function __construct() {
        	$arguments = func_get_args();
        	$numberOfArguments = func_num_args();

        	if (method_exists($this, $function = 'pointConstruct'.$numberOfArguments)) {
            		call_user_func_array(array($this, $function), $arguments);
        	}
    	}
	function pointConstruct2($x, $y) {
		$this->x = $x;
        	$this->y = $y;
	}
	function pointConstruct3($x, $y, $z) {
		$this->x = $x;
        	$this->y = $y;
		$this->z = $z;
	}
	function __destruct() {
		$msg = "Point ($this->x , $this->y";
		if (isset($this->z)) {
			$msg .= ", $this->z";
		}
		$msg .= ") is destroying <br>";
        	echo $msg;
    	}
	function getDataAsStr() {
		$str = "Point:<br>";
		$str .= "x = $this->x <br>";
		$str .=  "y = $this->y <br>";
		if (isset($this->z)){
			$str .=  "z = $this->z <br>";
		}
		return $str;
	}
	function printData() {
		echo "<p>";
		echo $this->getDataAsStr();
		echo "</p>";
	}
}

class ColoredPoint extends Point {
	private $color;
	
	public function __construct() {
        	$arguments = func_get_args();
        	$numberOfArguments = func_num_args();

        	if (method_exists($this, $function = 'coloredPointConstruct'.$numberOfArguments)) {
            		call_user_func_array(array($this, $function), $arguments);
        	}
    	}
	function coloredPointConstruct3($x, $y, $color) {
		parent::__construct($x, $y);
		$this->color=$color;
	}
	function coloredPointConstruct4($x, $y, $z, $color) {
		parent::__construct($x, $y, $z);
		$this->color=$color;
	}
	function __destruct() {
		$msg = "Point ($this->x, $this->y";
		if (isset($this->z)) {
			$msg .= ", $this->z";
		}
		$msg .= ") $this->color is destroying<br>";
        	echo $msg;
    	}
	function getDataAsStr() {
		$str = parent::getDataAsStr();
		$str .= "color =  $this->color <br>";
		return $str;
	}
}

$points = array();
$points[0] = new Point(8, 10);
$points[1] = new Point(-2, 4, 6);
$points[2] = new ColoredPoint(-5, 2, "red");
$points[3] = new ColoredPoint(12, 5, -3, "green");

foreach($points as $point) {
	$point->printData();
}
?>
