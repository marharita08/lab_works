<?php
class Coor{ 
	private $name; 
	private $login;
	private $password;
	function __construct($name, $login, $password) { 
		$this->name=$name; 
		$this->login=$login;
		$this->password=$password;
	} 
	function showFullData() { 
		echo "<p>Name: " . $this->name . "<br>"; 
		echo "Login: " . $this->login . "<br>"; 
		echo "Password: " . $this->password . "</p>";
	} 
	function getName() {
		return $this->name;
	}
	function getLogin() {
		return $this->login;
	}
	function getPassword() {
		return $this->password;
	}
}

class CSVCoor {
	private $_csv_file = null;
	/**
	* @param string $csv_file - путь до csv-файла
	*/
	public function __construct($csv_file) {
		$this->_csv_file = $csv_file; 
	}
	public function setCSV(Array $csv) {
		$handle = fopen($this->_csv_file, "w")or die("Unable to open file!"); 
		foreach ($csv as $obj) {
			$fields = array($obj->getName(), $obj->getLogin(), $obj->getPassword());
			fputcsv($handle, $fields, ";"); 
		}
		fclose($handle); 
	}
 
	public function getCSV() {
		$handle = fopen($this->_csv_file, "r")or die("Unable to open file!"); 
		$arr = array(); 
		while (($line = fgetcsv($handle, 0, ";")) !== FALSE) { 
			$user = new Coor($line[0]??null, $line[1]??null, $line[2]??null);
			$arr[] = $user; 
		}
		fclose($handle); 
		return $arr; 
	}
}
$users = array();
$users[0] = new Coor("Emma Johnson", "emmaj", "123"); 
$users[1] = new Coor("Brian Smith", "bsmith", "456");
$users[2] = new Coor("Brandan Walker", "bwalker", "789"); 
$users[3] = new Coor("Jenn Thompson", "jennt", "159");
try {
	$csv = new CSVCoor("users.csv"); 
	$csv->setCSV($users);
	$arr = $csv->getCSV();
	foreach ($arr as $user) { 
		$user->showFullData();
	}
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage();
}
?>