<?php 
class MyClass { 
	public function __call($name, $arguments) { 
		return "__call, method - {$name} is not exists \n"; 
	} 

	public function getId() { 
		return "Method exists"; 
	} 
} 

$obj = new MyClass; 
echo $obj->getName() . "<br>"; 
echo $obj->getId();  

?> 