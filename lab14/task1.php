<?php
abstract class AbstractHandler {
	/**
	* @var AbstractHandler
	*/
	protected $_next;
	/**
	* Send request by
	*
	* @param mixed $message
	*/
	abstract public function sendRequest($message);
	/**
	* @param \AbstractHandler $next
	*/
	public function setNext($next) {
		$this->_next = $next;
	}
	/**
	* @return \AbstractHandler
	*/
	public function getNext() {
		return $this->_next;
	}
}
class ConcreteHandlerA extends AbstractHandler {
	/**
	* @param mixed $message
	*/
	public function sendRequest($message) {
		if ($message == 1) {
			echo __CLASS__ . " process this message";
		} else {
			if ($this->getNext()) {
				$this->getNext()->sendRequest($message);
			}
		}
	}
}
class ConcreteHandlerB extends AbstractHandler {
	/**
	* @param mixed $message
	*/
	public function sendRequest($message) {
		if ($message == 2) {
			echo __CLASS__ . " process this message";
		} else {
			if ($this->getNext()) {
				$this->getNext()->sendRequest($message);
			}
		}
	}
}
$handler = new ConcreteHandlerA();
$handler->setNext(new ConcreteHandlerB());
$handler->sendRequest(2);
?>
