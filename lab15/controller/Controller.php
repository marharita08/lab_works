<?php
include_once("model/Model.php"); 
 
class Controller { 
	public $model; 
 
	public function __construct() { 
		$this->model = new Model(); 
	} 
 
	public function invoke() {
		
		if (isset($_GET['title'])&&$_GET['title']!='') {
			$books = $this->model->searchBooksByTitle($_GET['title']);
			include 'view/booklist.php'; 
		} else if (isset($_GET['author'])&&$_GET['author']!='') {
			$books = $this->model->searchBooksByAuthor($_GET['author']);
			include 'view/booklist.php'; 
		} else if (!isset($_GET['book'])) { 
			// no special book is requested, we'll show a list of all available books 
			$books = $this->model->getBookList(); 
			include 'view/booklist.php'; 
		} else { 
			// show the requested book 
			$book = $this->model->getBook($_GET['book']); 
			include 'view/viewbook.php'; 
		} 
	} 
} 
?>
