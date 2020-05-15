<?php 

	if(isset($_GET["fID"]) && isset($_GET["pID"])) {
	
		require "../../connect.php";
		$con = new mysqli($host, $db_user, $db_password, $db_name);
		
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		}

		$con->query('SET NAMES "utf8"');

		$q = $con->prepare('UPDATE player_eq SET '.$_GET['fID'].'=0 WHERE playerID=?');
		// $q->bind_param("s", $_GET["fID"]);
		$q->bind_param("i", $_GET["pID"]);
		$q->execute();

		// echo $q->__toString()."----";

	}

?>