<?php 
	$root = realpath(dirname(__FILE__));
	include($root."/core/core.php");
	Core::$root = $root;
	include($root.'/settings.php');
	include($root.'/core/router.php');
?>
