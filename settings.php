<?php
	Core::$jwt_key = 'columbia';
	include(Core::$root."/data_base/IDataBase.php");
	include(Core::$root."/data_base/mysqldb.php");

	Core::$db = new MySQLdb(array('ip' => "37.230.113.204", 'login' => "dev", 'pass' => "5K4z6I8s", 'db' => "dev"));
?>
