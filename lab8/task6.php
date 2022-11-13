<?php
class PointPrinter { 
  public function printX(Point $p) {     
	echo "$p->x<br />"; 
  }   
  public function printY(Point $p) {     
	echo "$p->y<br />"; 
  } 
}   
class Point {   
	private $x;   
	private $y;   
	private $printer; 

    public function __construct(PointPrinter $printer, $x, $y) {     
		$this->x = $x; 
		$this->y = $y; 
		$this->printer = $printer; 
	}   
	public function __get($name) {     
		return $this->$name; 
	}   
	public function __call($methodName, $args) {     
		return $this->printer->$methodName($this);   
	} 
} 
$p = new Point(new PointPrinter(), 5, 10); 
$p->printX();  
$p->printY(); 
?>