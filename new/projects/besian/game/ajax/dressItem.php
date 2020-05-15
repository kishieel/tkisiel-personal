<?php 
	
	require "../../connect.php";
    $con = new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}

	$con->query('SET NAMES "utf8"');

	$q = $con->prepare('SELECT * FROM player_set WHERE playerID=?');
	$q->bind_param("i", $_GET["pID"]);
	$q->execute();
	$set = null;
	if($r = $q->get_result()) {
		if($r->num_rows > 0) {
			$set = $r->fetch_assoc();
		}
	}

	$q = $con->prepare('UPDATE player_set SET '.$_GET["type"].'=? WHERE playerID=?');
	$q->bind_param("ii", $_GET["item"], $_GET["pID"]);
	$q->execute();

	$q = $con->prepare('UPDATE player_eq SET '.$_GET["fID"].'=? WHERE playerID=?');
	$q->bind_param("ii", $set[$_GET["type"]], $_GET["pID"]);
	$q->execute();

?>