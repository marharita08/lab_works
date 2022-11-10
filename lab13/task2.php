<?php
class TwitterService {
	public function setMessage($text) {
		$this->_data['message']=$text;
		echo $this->_data['message']."<br>";
	}
	public function sendTweet() {
		echo "I sent a tweet <br>";
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
$array = array("message" => "This is tweet");
$a = new NotificationManager();
$a->sendNotification("twitter",$array);
?>