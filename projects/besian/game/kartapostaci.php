<!doctype html>
<html>
	<head>
		
		<title>Besian</title>
		<style>
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
				background-color: rgba(0, 0, 0, 0.8);
            }
			#stats
			{
				width:33%;
				float:left;
				height:100%;
				text-align:center;
			}
			#resources
			{
				width:33%;
				float:left;
				height:100%;
			}
			#skills
			{
				width:33%;
				height:100%;
				float:left;
				
			}
			.stat
			{
				font-size:40px;
				margin-top:20%;
				
			}
			.activeskill
			{
				font-size:25px;
				margin-top:26%;
			}
			#saveholder {				
				position: absolute;
				bottom: 100px;
				left: 0;
				right: 0;
				display: grid;
				grid-templates-columns: 1fr min-content 1fr;
			}

			#save {
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
		.goldexp
		{
			color:white;
			font-size:28px;
		}
		</style>
		<link href="../style.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="ingame">
		<?php
			session_start();
			include "bitkafunkcja.php";
			playerinfo();
			max_resources();
		echo '
			<div class="window">
			
			<div class="belka">
                <ul>
                    <li><a href="eq.php">Ekwipunek</a></li>
                    <li><a href="map.php">Mapa</a></li>
                    <li><a href="kartapostaci.php">Umiejętności</a></li>
                    <li><a href="">Questy</a></li>
                    <li><a href="../logout.php">Wyloguj się</a></li>
                </ul>
            </div>
			
			<div id="stats">
			
				<p class="stat" style="color:red;">Wola: '.$_SESSION['wola'].'</p>
				<p class="stat" style="color:blue;">Umysł: '.$_SESSION['umysl'].'</p>
				<p class="stat" style="color:green;">Duch: '.$_SESSION['duch'].'</p>
				<p id="nick" style="color:white; font-size:40px">'.$_SESSION['nazwa'].', lvl '.$_SESSION['lvl'].' </p>
			
			</div>
			<div id="resources">
			
				<p class="stat" style="color:red;">Zdrowie: '.$_SESSION['player_Max_HP'].'</p>
				<p class="stat" style="color:blue;">Mana: '.$_SESSION['player_Max_Mana'].'</p>
				<p class="stat" style="color:green;">Szybkość: '.$_SESSION['PlayerSpeed'].'</p>
				<div id="saveholder"><div id="save">Zapisz</div></div>
				
			
			</div>
			<div id="skills">
			
			 <form>
				
					<select class="activeskill">
					
						<option value="Kamienna skora" selected="selected">Kamienna skóra</option>
						<option value="Miazdzacy cios">Miażdżący cios</option>
						<option value="Podwojne uderzenie">Podwójne uderzenie</option>
					
					</select>
					<select class="activeskill">
					
						<option value="Kamienna skora">Kamienna skóra</option>
						<option value="Miazdzacy cios" selected="selected">Miażdżący cios</option>
						<option value="Podwojne uderzenie">Podwójne uderzenie</option>
					
					</select>
					<select class="activeskill">
					
						<option value="Kamienna skora"><span>Kamienna skóra</span></option>
						<option value="Miazdzacy cios"><span>Miażdżący cios</span></option>
						<option value="Podwojne uderzenie" selected="selected"><span>Podwójne uderzenie</span></option>
					
					</select>
				
				</form>
				<p class="goldexp" style="margin-top: 20px;"><img src="img/coin.png" style="width:10%; height:10%; margin-right:4px;">Pieniądze: '.$_SESSION['money'].'</p>
				<p class="goldexp"><img src="img/xp.png" style="width:10%; height:10%; margin-right:4px;">Doświadczenie: '.$_SESSION['exp'].'</p>
			</div>
			
				
			
			
			</div>
		
	</body>
</html>
';
?>