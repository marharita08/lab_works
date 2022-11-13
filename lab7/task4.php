<?php
interface ILoger{
	public function logDate();
	public function logMessage($message);
}
trait LogDate {
	function logDate() {
		fwrite($this->file, date("F j, Y, g:i a") . " ");
	}
}
trait LogMessage {
	function logMessage($message) {
		fwrite($this->file, "$message\n");
	}
}
class FileLoger implements ILoger{
	use LogDate, LogMessage;
	private $file;
	private $logFile;
	public function __construct($filename,$mode = 'a'){
		$this->logFile = $filename;
		$this->file = fopen($filename, $mode) 
		or die('Could not open the log file');
	}
	public function __destruct(){
		if($this->file){
			fclose($this->file);
		}
	}
}
if(isset($_GET['message'])) {
	$logger = new FileLoger("log.txt");
	$logger->logDate();
	$logger->logMessage($_GET['message']);
}
?>
<form name="form" action="" method="get">
  <input type="text" name="message" id="message"/>
  <button type="submit">Submit</button>
</form>

