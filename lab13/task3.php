<?php
class TwitterService {
	public function setDate($text) {
		$this->_data['date']=$text;
	}
	public function setMessage($text) {
		$this->_data['message']=$text;
	}
	public function sendTweet() {
		echo "<p>";
		echo "Twit<br>";
		echo "Sent at " . $this->_data['date']."<br>";
		echo "Message: " . $this->_data['message']."<br>";
		echo "</p>";
	}
}
class SmsService {
	public function setDate($text) {
		$this->_data['date']=$text;
	}
	public function setRecipient($text) {
		$this->_data['recipient']=$text;
	}
	public function setMessage($text) {
		$this->_data['message']=$text;
	}
	public function sendText() {
		echo "<p>";
		echo "Sms<br>";
		echo "Sent at " . $this->_data['date']."<br>";
		echo "Recipient: " . $this->_data['recipient']."<br>";
		echo "Message: " . $this->_data['message']."<br>";
		echo "</p>";
	}
}
interface NotificationInterface {
	public function setData($data);
	public function sendNotification();
}
class TwitterAdapter implements NotificationInterface {
	protected $_data;
	public function setData($data){
		$this->_data = $data;
	}
	public function sendNotification() {
		$twitterClient = new TwitterService();
		$twitterClient->setDate($this->_data['date']);
		$twitterClient->setMessage($this->_data['message']);
		$twitterClient->sendTweet();
	}
}
class SmsAdapter implements NotificationInterface {
	protected $_data;
	public function setData($data) {
		$this->_data = $data;
	}
 
	public function sendNotification() {
		$smsClient = new SmsService();
		$smsClient->setRecipient($this->_data['recipient']);
		$smsClient->setMessage($this->_data['message']);
		$smsClient->setDate($this->_data['date']);
		$smsClient->sendText();
	}
 
}
interface INotificationManager {
	public function sendNotification($type = '', $data);
}
class NotificationManager implements INotificationManager {
	public function sendNotification($type = '', $data) {
		switch($type){
			case "twitter":
				$notification = new TwitterAdapter();
				break;
			case "sms":
				$notification = new SmsAdapter();
				break;
			default:
				echo "еrror";
				return false;
				break;
		}
		$notification->setData($data);
		$notification->sendNotification(); 
	}
}
$arrayForTwitter = array("message" => "This is tweet", "date" => date("d.m.y H:i:s"));
$arrayForSms = array("message" => "This is sms", "recipient" => "+380999999999", "date" => date("d.m.y H:i:s"));
$a = new NotificationManager();
$a->sendNotification("twitter",$arrayForTwitter);
$a->sendNotification("sms",$arrayForSms);
?>