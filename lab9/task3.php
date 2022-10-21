<?php
class db {
	private $host="localhost";
	private $port=5432;
	private $dbName="lab6";
	private $user="postgres";
	private $password="password";
	
	public $db;
	protected static $_instance; 

	private function __construct() {
		echo "<h1>Соединение с базой данных</h1>";
		$connStr = "host=$this->host port= $this->port dbname=$this->dbName user=$this->user password=$this->password";
		$this->db = pg_connect($connStr) or die("Connection error");
	}
	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new self; 
		}
		return self::$_instance;
	}
 
	private function __clone() {
	}
	private function __wakeup() {
	} 
	public function get_data() {
		$query = "SELECT * from logger";
		$rs = pg_query($this->db, $query) or die("Cannot execute query: $query\n");
	
		while ($row = pg_fetch_row($rs)) {
			$rows[]=$row;
		}
		
		return $rows;
	}
	public function __destruct(){
		pg_close($this->db);
	}
}
$obj1 = db::getInstance();
$rows = $obj1->get_data();
echo "<table>";
echo "<tr>";
echo "<th>Date</th>";
echo "<th>Message</th>";
echo "</tr>";
foreach($rows as $row) {
	echo "<tr>";
	foreach($row as $item) {
		echo "<td>";
		echo $item;
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";
?>