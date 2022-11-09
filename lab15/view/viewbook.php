<html> 
	<head></head> 
	<body> 
		<img src=<?php echo "images/$book->photo" ?> width=150 /> <br>
		<?php 
			echo 'Назва:' . $book->title . '<br/>'; 
			echo 'Автор:' . $book->author->name . ' ' . $book->author->surname . '<br/>';
			echo 'Країна:' . $book->author->country . '<br>';
			echo 'Опис:' . $book->description . '<br/>';
			echo 'Кількість сторінок: '. $book->pages . '<br/>';
			echo 'Рік видання: '. $book->year . '<br/>';
		?> 
		<br>
		<a href="index.php">На головну</a>
	</body> 
</html>