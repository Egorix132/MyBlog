<?php
	$mysqli = new mysqli("37.230.113.204", "dev", "5K4z6I8s", "dev");
	$uploads_dir = '/uploads';
	
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	foreach ($_FILES as $img) {
		if ($img["error"] == UPLOAD_ERR_OK) {
			$tmp_name = $img["tmp_name"];
			$name = basename($img["name"]);
			$annonce_image = "$uploads_dir/$name";
			$annonce_image = substr_replace($annonce_image, uniqid(), strpos($annonce_image, "."), 0);
			echo $annonce_image;
			move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'].$annonce_image); 
		}
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = clean($_POST['name']);
		$annonce_text = clean($_POST['annonce_text']);
		$description = clean($_POST['description']);
		$annonce_image;
		die("dfsdf");
		if(!empty($name) && !empty($annonce_text) && !empty($description)) {
			if(check_length($name, 1, 50) && check_length($annonce_text, 1, 200) && check_length($description, 1, 2000)) {
				
				$mysqli->query("INSERT INTO articles (name, annonce, description, annonce_image, created) VALUES ('$name', '$annonce_text', '$description','$annonce_image', now());");
			} 
			else {
				echo "Введенные данные некорректны";
			}
		} 
		else {
			echo "Заполните пустые поля";
		}
		
	}
	
	function check_length($value = "", $min, $max) {
		$result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
		return !$result;
	}
	
	function clean($value = "") {
		$value = trim($value);
		$value = stripslashes($value);
		$value = strip_tags($value);
		$value = htmlspecialchars($value);
		
		return $value;
	}
?>