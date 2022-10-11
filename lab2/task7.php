<?php
class CSV {
	private $_csv_file = null;
	/**
	* @param string $csv_file - путь до csv-файла
	*/
	public function __construct($csv_file) {
		if (file_exists($csv_file)) { 
			$this->_csv_file = $csv_file; 
		} else throw new Exception("Файл не знайдено"); 
	}
	public function setCSV(Array $csv) {
		$handle = fopen($this->_csv_file, "a"); //Відкриваємо файл для дозапису
		foreach ($csv as $value) { 
			fputcsv($handle, explode(";", $value), ";"); 
		}
		fclose($handle); 
	}
 
	public function getCSV() {
		$handle = fopen($this->_csv_file, "r"); //Відкриваємо файл для читання
		$array_line_full = array(); 
		while (($line = fgetcsv($handle, 0, ";")) !== FALSE) { 
			$array_line_full[] = $line; 
		}
		fclose($handle); 
		return $array_line_full; 
	}
}
try {
	$csv = new CSV("file.csv"); 
	$get_csv = $csv->getCSV();
	foreach ($get_csv as $value) { 
		echo "Прізвище: " . $value[0] . "<br/>";
		echo "Ім'я: " . $value[1] . "<br/>";
		echo "Посада: " . $value[2] . "<br/>";
		echo "Оклад: " . $value[3] . "<br/>";
		echo "--------<br/>";
	}
 
	$arr = array("Пономаренко;Іван;;12000",);
	$csv->setCSV($arr);
} catch (Exception $e) {
	echo "Помилка: " . $e->getMessage();
}
?>