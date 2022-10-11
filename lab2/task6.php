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
	
	function writeCurrDateToFile() {
		$this->buff .= "\n" . date("D M j Y G:i:s");
		file_put_contents($this->filename, $this->buff);
	}
}
$first = new WorkWithFile("count.txt");
$first->writeCurrDateToFile();
?>