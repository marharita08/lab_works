<?php 
header("Content-Type: text/html; charset=windows-1251");
class WorkWithFile {
	var $buff;
	var $filename;
	function __construct($filename) {
		$uploaddir = './';
		$this->filename = $uploaddir .$filename;
		if(!file_exists($this->filename)) exit("Файл не існує");
		// открытие файла
		$fd = fopen($filename, "r");
		if(!$fd) exit("Помилка відкриття файлу");
		$this->buff = fread($fd,filesize($this->filename));
		fclose($fd) ;
	}
	//Метод виводить вміст файлу на екран
	function getContent() {
		return $this->buff;
	}
	//Метод виводить розмір файлу
	function getsize() {
		return filesize($this->filename);
	}
	//Метод виводить кількість рядків у файлі
	function getCount() {
		if(!empty($this->filename)) {
			$arr = file($this->filename);
			return count($arr);
		} else return 0;
	}
}
$first = new WorkWithFile("count.txt");
echo "{$first->getContent()}<br>";
echo "{$first->getsize()}<br>";
echo "{$first->getCount()}<br>";
?>