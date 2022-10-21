<?php
header('Content-Type: image/jpeg');
$canvas = imagecreatetruecolor(500, 500);
$white = imagecolorallocate($canvas, 255, 255, 255);
imagefill($canvas, 0, 0, $white);

interface Figure {
	public function draw();
	public function move($x, $y);
	public function getColor();
	public function setColor($r, $g, $b);
}
class Circle implements Figure {
	private $center_x;
	private $center_y;
	private $width;
	private $height;
	private $r = 0;
	private $g = 0;
	private $b = 0;
	
	function __construct($radius) {
		$this->center_x = $radius + 10; 
		$this->center_y = $radius + 10; 
		$this->width = $radius*2; 
		$this->height = $radius*2; 
	}
	function setColor($r, $g, $b) {
		$this->r=$r;
		$this->g=$g;
		$this->b=$b;
	}
	function getColor() {
		return array($this->r, $this->g, $this->b);
	}
	function move($x, $y) {
		$this->center_x += $x;
		$this->center_y += $y;
	}
	function draw() {
		$color = imagecolorallocate($GLOBALS["canvas"], $this->r, $this->g, $this->b);
		imageellipse($GLOBALS["canvas"], $this->center_x, $this->center_y, $this->width, $this->height, $color);
	}
}

class Square implements Figure {
	private $x1 = 10;
	private $y1 = 10;
	private $x2;
	private $y2;
	private $r = 0;
	private $g = 0;
	private $b = 0;
	
	function __construct($width) {
		$this->x2 = $this->x1 + $width;
		$this->y2 = $this->y1 + $width;
	}
	function setColor($r, $g, $b) {
		$this->r=$r;
		$this->g=$g;
		$this->b=$b;
	}
	function getColor() {
		return array($this->r, $this->g, $this->b);
	}
	function move($x, $y) {
		$this->x1 += $x;
		$this->x2 += $x;
		$this->y1 += $y;
		$this->y2 += $y;
	}
	function draw() {
		$color = imagecolorallocate($GLOBALS["canvas"], $this->r, $this->g, $this->b);
		imagerectangle($GLOBALS["canvas"], $this->x1, $this->y1, $this->x2, $this->y2, $color);
	}
	
}
class Trangle implements Figure {
	private $x1;
	private $y1 = 10;
	private $x2;
	private $y2;
	private $x3 = 10;
	private $y3;
	private $r = 0;
	private $g = 0;
	private $b = 0;
	
	function __construct($side) {
		$h = sqrt(pow($side, 2) - pow($side/2, 2));
		$this->x1 = 10 + $side / 2;
		$this->x2 = 10 + $side;
		$this->y2 = 10 + $h;
		$this->y3 = 10 + $h;
	}
	function setColor($r, $g, $b) {
		$this->r=$r;
		$this->g=$g;
		$this->b=$b;
	}
	function getColor() {
		return array($this->r, $this->g, $this->b);
	}
	function move($x, $y) {
		$this->x1 += $x;
		$this->x2 += $x;
		$this->x3 += $x;
		$this->y1 += $y;
		$this->y2 += $y;
		$this->y3 += $y;
	}
	function draw() {
		$color = imagecolorallocate($GLOBALS["canvas"], $this->r, $this->g, $this->b);
		imagepolygon($GLOBALS["canvas"], array($this->x1, $this->y1, $this->x2, $this->y2, $this->x3, $this->y3), $color);
	}
}

$square = new Square(300);
$square->draw();
$square->move(100, 120);
$square->setColor(0, 0, 255);
$square->draw();

$circle = new Circle(100);
$circle->setColor(255, 0, 0);
$circle->move(250, 100);
$circle->draw();

$trangle = new Trangle(200);
$trangle->setColor(0, 255, 0);
$trangle->move(20, 100);
$trangle->draw();

imagejpeg($canvas);
imagedestroy($canvas);
?>