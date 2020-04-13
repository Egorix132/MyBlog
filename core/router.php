<?php
	include(Core::$root.'/core/controllers.php');
	include(Core::$root.'/core/models.php');
	include(Core::$root.'/core/views.php');
	include(Core::$root.'/core/query.php');

	include(Core::$root.'/middlewares/auth.php');

	$controller = null;
	Core::$query = new Query($_GET, $_POST, $_SERVER['REQUEST_METHOD']);

	$c = Core::$query->getInput('c');
	$m = Core::$query->getInput('m');

	if(empty($c)){
		$controller = Controllers::load('main');
	}
	else{
		$controller = Controllers::load($c);
	}

	if(empty($m)){
		if(!method_exists($controller, 'index')){
			header("HTTP/1.0 404 Not Found");
		}
		else{
			$controller->index();
		}
	}
	else{
		if(!method_exists($controller, $m) && !method_exists($controller, 'index')){
			header("HTTP/1.0 404 Not Found");
		}
		else if(method_exists($controller, $m)){
			$controller->$m();
		}
		else{
			$controller->index();
		}
	}
?>
