<?php
	class Views{
		static function show($name, $array){
			global $root;
			$name = trim($name);
			$name = stripslashes($name);
			$name = strip_tags($name);
			$name = htmlspecialchars($name);

			if(!file_exists("{$root}/views/{$name}.php")){
				header("HTTP/1.0 404 Not Found");
			}
			else{
				include($root."/views/{$name}.php");
			}
		}
	}
?>
