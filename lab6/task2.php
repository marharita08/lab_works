<?php
interface ILoger{
	public function log($message);
}
class FileLoger implements ILoger{
	private $file;
	private $logFile;
	public function __construct($filename,$mode = 'a'){
		$this->logFile = $filename;
		$this->file = fopen($filename, $mode) 
		or die('Could not open the log file');
	}
	public function log($message){
		$message = date("F j, Y, g:i a") . ': ' . $message . "\n";
		fwrite($this->file,$message);
	}
	public function __destruct(){
		if($this->file){
			fclose($this->file);
		}
	}
}
class DbLoger implements ILoger{
	private $host="localhost";
	private $port=5432;
	private $dbName="lab6";
	private $user="postgres";
	private $password="password";
	
	private $conn;
	
	public function __construct(){
		$connStr = "host=$this->host port= $this->port dbname=$this->dbName user=$this->user password=$this->password";
		$this->conn = pg_connect($connStr) or die("Could not connect");;
	}
	public function log($message){
		pg_query($this->conn, "insert into logger values(current_timestamp, '" . $message . "')");
	}
	public function __destruct(){
		pg_close($this->conn);
	}
}
$dbLog= new DbLoger();
$dbLog->log('log message');
$dbLog->log('another log message');
?>