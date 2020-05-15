<?php

	session_start();

    
	   /*
    if ((empty($_POST['price'])))
    {
         $_SESSION['failed_adding'] = '<span style="color:red"><center>Nie wybrano ceny lub nie wprowadzono nazwy.</center></span>';
        header('Location: allegro.php');
        exit();
    }*/
    if(!is_numeric($_POST['price'])){
        $_SESSION['failed_adding'] = '<span style="color:red"><center>Cena musi być wartością liczbową.</center></span>';
        header('Location: allegro.php');
        exit();
    }
    else {
        unset($_SESSION['failed_adding']);
    }
    $price = $_POST['price'];
    $itemforsell = $_POST['itemforsell'];
    $current_id = $_SESSION['id'];
    
    require_once "../connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else {
        if ($result_item_id = $connection->query(
		sprintf("SELECT $itemforsell FROM player_eq WHERE playerID='$current_id'"
		))){
            $row5 = $result_item_id->fetch_assoc();
            //print_r($row5);
            $_SESSION['item_id'] = $row5[$itemforsell];
            $item_id = $_SESSION['item_id'];
			echo $item_id;
        }

            $price = htmlentities($price, ENT_QUOTES, "UTF-8");
            $item_id = htmlentities($item_id, ENT_QUOTES, "UTF-8");
            if ($connection->query("INSERT INTO allegro (item_id,cena,owner_id) VALUES ($item_id, $price, $current_id)")){
                if($connection->query("UPDATE player_eq SET $itemforsell=0"))
                {
                    $_SESSION['adding_complete']='<span style="color:green"><center>Dodawanie zakończone powodzeniem!</center></span>';
                    header('Location: allegro.php');
                }}
            else {
                    $_SESSION['failed_adding'] = '<span style="color:red"><center>Nie wybrano ceny lub nie wprowadzono nazwy.</center></span>';
                    header('Location: allegro.php');

                 }
        }
        $connection->close();
    

	
?>