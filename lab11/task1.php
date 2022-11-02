<?php
/**
* Фабрика
*/
interface Factory {
	/* @return Product
	*/
	public function getProduct();
}
interface Product {
	/**
	@return product name
	*/
	public function getName();
}
class FirstFactory implements Factory {
	public function getProduct() {
		return new FirstProduct();
	}
}
class SecondFactory implements Factory {
	public function getProduct() {
		return new SecondProduct();
	}
}
class FirstProduct implements Product {
	public function getName() {
		return 'The first product';
	}
}
class SecondProduct implements Product {
	public function getName() {
		return 'Second product';
	}
}
$factory = new FirstFactory();
$firstProduct = $factory->getProduct();
$factory = new SecondFactory();
$secondProduct = $factory->getProduct();
print_r($firstProduct->getName() . "<br>");
// The first product
print_r($secondProduct->getName() . "<br>");
// Second product
?>
