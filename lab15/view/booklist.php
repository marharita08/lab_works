<html> 
	<head></head> 
 
	<body> 
		<table> 
			<tbody><tr><td>Назва</td><td>Автор</td><td>Опис</td></tr></tbody>
			<tr>
				<form>
					<td><input name='title' value="<?php echo isset($_GET['title'])?$_GET['title']:''?>"/></td>
					<td><input name='author' value="<?php echo isset($_GET['author'])?$_GET['author']:''?>"/></td>
					<td><input type='submit' value='Пошук'/></td>
				</form>
			</tr>
			<?php 
				foreach ($books as $book) { 
					echo '<tr><td><a href="index.php?book='.$book->title.'">'.$book->title.'</a></td>';
					echo '<td>'.$book->author->name. ' ' . $book->author->surname . '</td>';
					echo '<td>'.$book->description.'</td></tr>'; 
				} 
			?> 
		</table> 
		<br>
		<a href="index.php">На головну</a>
	</body> 
</html>
