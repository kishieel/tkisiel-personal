<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>bitka essa</title>
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
            }
            #battle
            {
                position:absolute;
                width:100%;
                height:100%;
            }
            #player
            {
                width:250px;
                height:300px;
                position:absolute;
                top:25%;
                left:25%;
            }
            #opponent
            {
                width:250px;
                height:300px;
                position:absolute;
                top:25%;
                left:65%;
               
            }
            #logs
            {
                width:20%;
                height:100%;
                position:absolute;
				background-color: rgba(0, 0, 0, 0.5);
                bottom:0;
                left:0;
            }
            #player_status
            {
                height:100px;
                width:250px;
                position:absolute;
                top:5%;
                left:25%;
                text-align:center;
				border:2px solid black;
            }
            #opponent_status
            {
                height:100px;
                width:250px;
                position:absolute;
                top:5%;
                left:65%;
                text-align:center;
				border:2px solid black;
            }
            p[id$="hp"]
            {
                color:red;
            }
            p[id$="mana"]
            {
                color:lightblue;
            }
			p[id$="_name"]
			{
				color:white;
				text-shadow: 2px 2px black;
			}
			div[id$="_status"]
			{
				background-color:rgba(0, 0, 0, 0.3)
			}
            #action
            {
                visibility:hidden;
                width:140px;
                height:200px;
                position:absolute;
                left:30%;
                top:20%;
                z-index:100;
                background-color:blue;
                 
            }
            .skill
            {
                color:white;
                width:140px;
                height:40px;
                text-align:center;
                background-color:lightblue;
                color:black;
                line-height:40px;
            }
			#bg
			{
				position:absolute;
				z-index:-100;
				width:100%;
				height:100%;
			}
        </style>
         
        <script>
             
                function ShowActions()
                {
                    let okienko=document.getElementById("action");
                     
                        okienko.style.visibility = "visible";
                }
                function HideActions()
                {
                    let okienko=document.getElementById("action");
                     
                        okienko.style.visibility = "hidden";
                }
             
        </script>
         
    </head>
    <?php
		
		session_start();
		if (!isset($_SESSION['tura'])) {$_SESSION['tura']=0;}
		else {$_SESSION['tura']++;}
		include "bitkafunkcja.php";
		include "skille.php";
		include "oppskills.php";
		opponentinfo();
		playerinfo();
		max_resources();
		current_resources();
		if (!isset($_SESSION['tura'])) {$_SESSION['tura']=0;}
		if (isset($_POST['player_skill']))
		{
		include "./AI/".$_SESSION['AI'];
		battle();
		}
		
	
    echo '
    <body>
        <div class="window" >
         
            <div id="battle">
             
                <div id="player_status">
                 
                    <p id="player_name"><b>'.$_SESSION['nazwa'].' Lvl. '.$_SESSION['lvl'].'</b></p>
                    <p id="player_hp"><b>HP: '.$_SESSION['Current_player_HP']."/".$_SESSION['player_Max_HP'].'</b></p>
                    <p id="player_mana"><b>MP: '.$_SESSION['Current_player_Mana']."/".$_SESSION['player_Max_Mana'].'</b></p>
                     
                </div>
                <div id="player"><img src="img/Mr.Mistery.png" width="100%" height="100%"/></div>
                <div id="opponent_status">
                 
                    <p id="player_name"><b>'.$_SESSION['oppname'].' Lvl. '.$_SESSION['opplvl'].'</b></p>
                    <p id="opponent_hp"><b>HP: '.$_SESSION['Current_opponent_HP']."/".$_SESSION['opponent_Max_HP'].'</b></p>
                    <p id="opponent_mana"><b>MP: '.$_SESSION['Current_opponent_Mana']."/".$_SESSION['opponent_Max_Mana'].'</b></p>
                 
                 
                </div>
                <div id="opponent" onmouseover="ShowActions();" onmouseout="HideActions();"><img src="img/'.$_SESSION['grafika'].'" style="width:100%; height:100%;" />
                 
                <div id="action">
					<form id="battle_form" method="post" action="bitka.php">
                    <button class="skill" name="player_skill" value="Atak podstawowy">Atak podstawowy</button>
                    <button class="skill" name="player_skill" value="Kamienna skora" style="margin-top:10px;">Kamienna skora</button>
                    <button class="skill" name="player_skill" value="Miazdzacy cios" style="margin-top:10px;">Miazdzacy cios</button>
                    <button class="skill" name="player_skill" value="Podwojne uderzenie" style="margin-top:10px;">Podwojne uderzenie</button>
                 
                </div>
                 
                </div>
                <div id="logs"><p style="color:white;"><b>';if ($_SESSION['tura']>=1){echo 'Tura: '.($_SESSION['tura']);}logs(); echo '</b></p></div>
                 
                 <img src="img/Ostrów.png" id="bg" />
                 
                 
             
            </div>
             
         
         
         
             
        </div>
    </body>
    </html>
    ';
		
    ?>