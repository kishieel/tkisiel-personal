<?php

	session_start();
	
	if(!isset($_SESSION['id'])){
        header("Location ../index.php");
        exit();
    }

    require_once "../connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    
    if ($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}  
    
    $current_id = $_SESSION['id'];
    if($result_items = @$connection->query(sprintf("SELECT * FROM player_eq WHERE playerID='$current_id'"))){
        $amount = $result_items->num_rows;
        if($amount == 1) {
            $row1 = $result_items->fetch_assoc();
        }
    }
    
	
?>

<!DOCTYPE HTML>
<html>
	<head>

		<meta charset="UTF-8">
		<title>Besian - aukcja</title>
		
        <link href="../style.css" rel="stylesheet" type="text/css" />
		<style>
			
			html, body {
				overflow: hidden;
				margin: 0;
				padding: 0;
			}
			
			.window {
				width: 75%;
				height: 90%;
				position: absolute;
				top: 0;
				left: 0;
				bottom: 0;
				right: 0;
				margin: auto;
				border: 2px solid #000;
				overflow: hidden;
				cursor: pointer;
			}

			.allegro {
				width: 100%;
				height: 100%;
                background-image: url(locations/img/loc100s1.png);
				background-size: cover;
			}


			.return-holder {				
				position: absolute;
				bottom: 10px;
				left: 0;
				right: 0;
				display: grid;
				grid-templates-columns: 1fr min-content 1fr;
			}

			.return {
				padding: 10px 20px;
				background: brown;
				border: 2px solid black;
				border-radius: 10px;
				width: 100px;
				grid-column: 2;
				text-align: center;
				color: white;
				font-weight: bold;
			}

			
			.location {
				min-height: 100%;
			    min-width: 100%;
			    width: auto;
			}
			.purchasing
			{
				background-color: rgba(0, 0, 0, 0.7);
				color:white;
                text-align: center;
                height: 100%;
                width: 60%;
                float:right;
			}
            .adding {
                width: 40%;
                height: 100%;
                text-align: center;
                float:left;
                background-color: rgba(0, 0, 0, 0.7);
				color:white;
            }
            .alledrogo {
                margin-right: 5px;
            }
            select {
                width: 80%;
                margin-top: 20px;
            }
            table {
                width: 90%;
                display: inline-block;
            }
            table tr {
                height: 40px;
            }
            table tr td {
                height: 40px;
            }
			.anaglowek
			{
				font-size:24px;
				color:white;
			}
            #tabela {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 100%;
                height: 80%;
                overflow-y: scroll;
            }
            .return-holder {				
				position: absolute;
				bottom: 60px;
				left: 0;
				right: 0;
				display: grid;
				grid-templates-columns: 1fr min-content 1fr;
			}
            .return {
                display: block;
                text-decoration: none;
				padding: 10px 20px;
				background: brown;
				border: 2px solid black;
				border-radius: 10px;
				width: 100px;
				grid-column: 2;
				text-align: center;
				color: white;
				font-weight: bold;
			}
            .return:visited {
                color: white;
            }
		</style>

	</head>
	<body class="ingame">
		
		<div class="window">
			<div class="allegro">
                <div class="adding">
                    <form action="additem.php" method="post">
                        <span class="anaglowek">Wybierz przedmiot do sprzedania</span>
                        <select name='itemforsell'>
                            <?php
                            
                                for($i=1; $i<=24; $i++){
                                if($row1["f".$i] != 0){
                                    $_SESSION["f".$i] = $row1["f".$i];
                                    if($result_items_details = @$connection->query(sprintf('SELECT * FROM items WHERE itemID='.$_SESSION["f".$i].''))){
                                        $amount2 = $result_items_details->num_rows;
                                        if($amount2 == 1) {
                                            $row2 = $result_items_details->fetch_assoc();
                                            $_SESSION['itemforsell'] = "f".$i;
                                            $_SESSION['item_name'.$i] = $row2['name'];
                                            $item_column = "f".$i;
                                            echo $_SESSION['item_name'.$i];
                                        }
                                    echo "<option value=";
                                    echo $_SESSION["itemforsell"];
                                    echo ">";
                                    echo $_SESSION["item_name".$i];
                                    echo "</option>";
                                }
                                }
                            }
                        
                        ?>
                        </select>
                        <input type="text" name="price" placeholder="Cena" />
                        <?php
                            if(isset($_SESSION['failed_adding']))	echo $_SESSION['failed_adding'];
                            unset($_SESSION['failed_adding']);
                        ?>
                        <?php
                            if(isset($_SESSION['adding_complete']))	echo $_SESSION['adding_complete'];
                            unset($_SESSION['adding_complete']);
                        ?>
                        <input type="submit" value="Wyślij na aukcję" />
                        <div class="return-holder">
                            
                                <a class="return" href="location.php?loc=100">POWRÓT</a>
                            
                        </div>
                        
                    </form>
                </div>
                <div class="purchasing">
                    <span class="anaglowek">Obecne przedmioty na aukcji</span>
                    <hr />
                    <?php
                        if($result_shop = @$connection->query(sprintf("SELECT * FROM allegro"))){
                            $how_many_auctions = $result_shop->num_rows;
                            if($how_many_auctions>0){
                                echo "<div id='tabela'>";
                               echo "<table class='alledrogo' border='1' collapse='collapse' cellspacing='0'>";
                                echo "<tr height='50px'>";
                                echo "<th width='10%'>ID Aukcji</th>";  
                                echo "<th width='30%'>Przedmiot</th>";
                                echo "<th width='10%'>Cena</th>";
                                echo "<th width='20%'>Właściciel</th>";
                                echo "<th width='20%'>Akcja</th>";
                                while($r = $result_shop->fetch_row()) {
                                    echo "<tr height='50px'>";
                                    echo "<form action='purchase.php' method='post'>";
                                    echo "<td><input type='hidden' name='auction_id' value=".$r[0].">".$r[0]."</input></td>";
                                    if($result_name = @$connection->query(sprintf("SELECT name FROM items WHERE $r[1] = itemID"))){
                                        $wiersz = $result_name->fetch_row();
                                        $nazwa = $wiersz[0];
                                    }
                                    echo "<td><input type='hidden' name='item_id' value=".$r[1].">".$nazwa."</input></td>";
                                    echo "<td><input type='hidden' name='cena' value=".$r[2].">".$r[2]." MC</input></td>";
                                    if($result_name = @$connection->query(sprintf("SELECT nick FROM users WHERE $r[3] = id"))){
                                        $wiersz = $result_name->fetch_row();
                                        $nickname = $wiersz[0];
                                    }
                                    echo "<td><input type='hidden' name='owner_id' value=".$r[3].">".$nickname."</input></td>";
                                    echo "<td><input type='submit' value='Kup' /></td>";
                                    echo "</form>";
                                    echo "</tr>";
                                }
                                
                                
                                echo "</table>";
                                echo "</div>";
                            }
                                
                                
                            }
                            else{
                                $_SESSION['no_auctions']='<span style="color:lightgreen"><center>Nie ma aktualnie żadnych aukcji.</center></span>';
                                echo $_SESSION['no_auctions'];
                                unset($_SESSION['no_auctions']);
                            }
                           
                    ?>
                    <hr />
                     <?php
                        if(isset($_SESSION['failed'])){
                            echo $_SESSION['failed'];
                            unset($_SESSION['failed']);
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['full_eq'])){
                            echo $_SESSION['full_eq'];
                            unset($_SESSION['full_eq']);
                        }
                    ?>
                </div>
            </div>
            <div class="belka">
                <ul>
                    <li><a href="eq.php">Ekwipunek</a></li>
                    <li><a href="map.php">Mapa</a></li>
                    <li><a href="kartapostaci.php">Umiejętności</a></li>
                    <li><a href="">Questy</a></li>
                    <li><a href="../logout.php">Wyloguj się</a></li>
                </ul>
            </div>

		</div>
        <?php $connection->close(); ?>
	</body>

</html>