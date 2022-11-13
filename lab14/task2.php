<?php
abstract class Card {
	private $cardNumber;
	private $balance;
	
	public function getBalance() {
		return $this->balance;
	}
	public function setBalance($balance) {
		$this->balance = $balance;
	}
	public function getCardNumber() {
		return $this->cardNumber;
	}
	public function setCardNumber($cardNumber) {
		$this->cardNumber = $cardNumber;
	}
}
class SalaryCard extends Card {}
class CreditCard extends Card {
	private $creditLimit;
	
	public function getCreditLimit() {
		return $this->creditLimit;
	}
	public function setCreditLimit($creditLimit) {
		$this->creditLimit = $creditLimit;
	}
}
abstract class Payment {
	
	protected $_next;
	
	abstract public function pay($sum, $cards);
	
	public function setNext($next) {
		$this->_next = $next;
	}
	
	public function getNext() {
		return $this->_next;
	}
}
class PaymentWithSalaryCard extends Payment {
	
	public function pay($sum, $cards) {
		$card = $cards['salary'];
		if ($card->getBalance()-$sum >= 0) {
			$card->setBalance($card->getBalance()-$sum);
			echo "<p>";
			echo "Payment with salary card<br>";
			echo "Card number:" . $card->getCardNumber() . "<br>";
			echo "Sum: $sum <br>";
			echo "Balance after payment:" . $card->getBalance() . "<br>";
			echo "</p>";
		} else {
			if ($this->getNext()) {
				$this->getNext()->pay($sum, $cards);
			}
		}
	}
}
class PaymentWithCreditCard extends Payment {
	
	public function pay($sum, $cards) {
		$card = $cards['credit'];
		if ($card->getBalance()-$sum >= -$card->getCreditLimit()) {
			$card->setBalance($card->getBalance()-$sum);
			echo "<p>";
			echo "Payment with credit card<br>";
			echo "Card number:" . $card->getCardNumber() . " <br>";
			echo "Sum: $sum <br>";
			echo "Balance after payment:" . $card->getBalance() . "<br>";
			echo "</p>";
		} else {
			if ($this->getNext()) {
				$this->getNext()->pay($sum, $cards);
			}
		}
	}
}
class PaymentErrorHandler extends Payment {
	public function pay($sum, $cards) {
		echo "<p>";
		echo "Balance of your cards is not enough to pay";
		echo "</p>";
	}
}
$salaryCard = new SalaryCard();
$salaryCard->setCardNumber("9999 9999 9999 9999");
$salaryCard->setBalance(15000.00);

$creditCard = new CreditCard();
$creditCard->setCardNumber("8888 8888 8888 8888");
$creditCard->setBalance(2000.00);
$creditCard->setCreditLimit(10000.00);

$cards = array("salary" => $salaryCard, "credit" => $creditCard);

$payment = new PaymentWithSalaryCard();
$paymentWithCreditCard = new PaymentWithCreditCard();
$paymentWithCreditCard->setNext(new PaymentErrorHandler());
$payment->setNext($paymentWithCreditCard);

$payment->pay(12000.00, $cards);
$payment->pay(5000.00, $cards);
$payment->pay(10000.00, $cards);
?>