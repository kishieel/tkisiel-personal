<?php

	session_start();
	
	if ((!isset($_POST['nick'])) || (!isset($_POST['password'])))
	{
		header('Location: index.php');
		exit();
	}
    
    require_once "connect.php";
        
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    
    if ($connection->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$nick = $_POST['nick'];
		$password = $_POST['password'];
		
		$nick = htmlentities($nick, ENT_QUOTES, "UTF-8");
	
		if ($result = @$connection->query(
		sprintf("SELECT * FROM users WHERE nick='%s'",
		mysqli_real_escape_string($connection,$nick))))
		{
			$how_many_users = $result->num_rows;
			if($how_many_users>0)
			{
				$row = $result->fetch_assoc();
				
				if (password_verify($password, $row['password']))
				{
					$_SESSION['logged'] = true;
					$_SESSION['id'] = $row['id'];
					$_SESSION['nick'] = $row['nick'];
					
					
					unset($_SESSION['failed']);
					$result->free_result();
					header('Location: game/map.php');
				}
				else 
				{
					$_SESSION['failed'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
				
			} else {
				
				$_SESSION['failed'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$connection->close();
	}
?>