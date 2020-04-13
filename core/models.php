<?php
	class Models{		
		static function load($name){
			global $root;
			$name = trim($name);
			$name = stripslashes($name);
			$name = strip_tags($name);
			$name = htmlspecialchars($name);
			
			$model = null;
			
			if(!file_exists("{$root}/models/{$name}.php")){

			}
			else{
				include($root."/models/{$name}.php");
				$class_name = "Model_{$name}";
				$model = new $class_name;
			}
			
			return $model;
		}
	}
?>