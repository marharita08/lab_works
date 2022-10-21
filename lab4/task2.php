<?php 
class cls  { 
	public static function static_method() { 
		echo "Виклик статичного методу<br>"; 
	} 
	public function method() {
		echo "Виклик не статичного методу<br>";
		cls::static_method();
	}
} 
$obj = new cls();
$obj->method();
?>