<?php
	$mysqli = new mysqli("37.230.113.204", "dev", "5K4z6I8s", "dev");
	
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	$row = $mysqli->query("SELECT * FROM articles");
	echo $row;
	foreach($row as $article){
		include('views/article.php');
	}
?>