<?php
	class Controllers{
		static function load($name){

			global $root;
			$name = trim($name);
			$name = stripslashes($name);
			$name = strip_tags($name);
			$name = htmlspecialchars($name);
			
			$controller = null;

			if(!file_exists("{$root}/controllers/{$name}.php")){
				include($root.'/controllers/main.php');
				$class_name = 'Controller_main';
				$controller = new $class_name;
			}
			else{
				include($root."/controllers/{$name}.php");
				$class_name = "Controller_{$name}";
				$controller = new $class_name;
			}

			return $controller;
		}
	}
?>
