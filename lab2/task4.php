<?php 
class Coor { 
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
}
$user1 = new Coor("Emma Johnson", "emmaj", "123"); 
$user2 = new Coor("Brian Smith", "bsmith", "456");
$user3 = new Coor("Brandan Walker", "bwalker", "789"); 
$user1->showFullData();
$user2->showFullData();
$user3->showFullData();
?>
