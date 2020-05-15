<?php

	session_start();

    
	   
    if ((empty($_POST['owner_id'])))
    {
         $_SESSION['failed'] = true;
        header('Location: allegro.php');
        exit();
    }
    if ($current_id = $_SESSION['id'] == $_POST['owner_id']){
        $_SESSION['failed'] = '<span style="color:red"><center>Nie możesz kupować sam od siebie!</center></span>';
        header('Location: allegro.php');
        exit();
    }

    else {
        unset($_SESSION['failed']);
    }

    $auction_id = $_POST['auction_id'];
    $item_id = $_POST['item_id'];
    $cena = $_POST['cena'];
    $owner_id = $_POST['owner_id'];
    $current_id = $_SESSION['id'];
    require_once "../connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else {
        if($rezultat0 = @$connection->query(sprintf("SELECT f1,f2,f3,f4,f5,f6,f7,f8,f9,f10,f11,f12,f13,f14,f15,f16,f17,f18,f19,f20,f21,f22,f23,f24 FROM player_eq WHERE playerID=$current_id"))){
            $wiersz = $rezultat0->fetch_row();
            for($i = 0; $i <= 23; $i++){
                if($wiersz[$i] == 0){
                    $empty = 'f'.($i+1);
                    break;
                }
                else {
                    $_SESSION['full_eq'] = '<span style="color:red"><center>Nie masz już miejsca w ekwipunku!</center></span>';
                    header('Location: allegro.php');
                    exit();
                }
        }
        
        }
        if($rezultat = @$connection->query(sprintf("UPDATE player_eq SET $empty=$item_id WHERE playerid=$current_id"))){
            if($rezultat2 = @$connection->query(sprintf("UPDATE users SET cash=cash-$cena WHERE id=$current_id"))){
                if($rezultat3 = @$connection->query(sprintf("UPDATE users SET cash=cash+$cena WHERE id=$owner_id"))){
                    if($rezultat4 = @$connection->query(sprintf("DELETE FROM allegro WHERE auction_ID=$auction_id"))){
                        header("Location: allegro.php");
                    }
                }
            }
        }
        }
        $connection->close();
    

	
?>