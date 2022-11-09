<?php
include_once("model/Book.php"); 
include_once("model/Author.php"); 
 
class Model { 
	private $host="localhost";
	private $port=5432;
	private $dbName="lab15";
	private $user="postgres";
	private $password='password';

	private $db;
	
	public function __construct() {
		$connStr = "host=$this->host port= $this->port dbname=$this->dbName user=$this->user password=$this->password";
		$this->db = pg_connect($connStr) or die("Connection error");
	}

	public function getBookList() { 
	
		$query = "select * from book b join book_author ba on ba.book_id=b.id join author a on ba.author_id=a.id";
		$rs = pg_query($this->db, $query) or die("Cannot execute query: $query\n");
	
		while ($row = pg_fetch_assoc($rs)) {
			$author = new Author($row['name'], $row['surname'], $row['country']);
			$books[] = new Book($row['title'], $author, $row['description'], $row['year'], $row['pages'], $row['photo']);
		}
		
		return $books;
	} 
 
	public function getBook($title) { 
		$query = "select * from book b join book_author ba on ba.book_id=b.id join author a on ba.author_id=a.id where title='" . $title . "'";
		$rs = pg_query($this->db, $query) or die("Cannot execute query: $query\n");
		$row = pg_fetch_assoc($rs);
		$author = new Author($row['name'], $row['surname'], $row['country']);
		$book = new Book($row['title'], $author, $row['description'], $row['year'], $row['pages'], $row['photo']);
		return $book;
	} 
	
	public function searchBooksByTitle($title) { 
		$query = "select * from book b join book_author ba on ba.book_id=b.id join author a on ba.author_id=a.id where upper(title) like'%" . mb_strtoupper($title) . "%'";
		$rs = pg_query($this->db, $query) or die("Cannot execute query: $query\n");
		$books=array();
		while ($row = pg_fetch_assoc($rs)) {
			$author = new Author($row['name'], $row['surname'], $row['country']);
			$books[] = new Book($row['title'], $author, $row['description'], $row['year'], $row['pages'], $row['photo']);
		}
		
		return $books;
	} 
	
	public function searchBooksByAuthor($name) { 
		$query = " select * from (select b.*, a.*, name||' '||surname as full_name from book b join book_author ba on ba.book_id=b.id 
					join author a on ba.author_id=a.id ) tab where upper(full_name) like'%" . mb_strtoupper($name) . "%'";
		$rs = pg_query($this->db, $query) or die("Cannot execute query: $query\n");
		$books=array();
		while ($row = pg_fetch_assoc($rs)) {
			$author = new Author($row['name'], $row['surname'], $row['country']);
			$books[] = new Book($row['title'], $author, $row['description'], $row['year'], $row['pages'], $row['photo']);
		}
		
		return $books;
	} 
} 
?>
