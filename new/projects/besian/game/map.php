<?php 

	//error_reporting(0);
	session_start();
	include "bitkafunkcja.php";
	playerinfo();
	$_SESSION["playerID"] = $_SESSION['id'];
	
	require "../connect.php";
    $con = new mysqli($host, $db_user, $db_password, $db_name);

	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}

	$locStates = null;	
	$q = $con->prepare('SELECT * FROM player_location WHERE playerID=?');
	$q->bind_param('s', $_SESSION["playerID"]);
	$q->execute();
	if($r = $q->get_result()) {
		if($r->num_rows > 0) {
			$locStates = $r->fetch_assoc();
		}
	}
	
	$locStatesJSON = array();
	foreach ($locStates as $key => $value) {
		if (strpos($key, 'loc') === 0) {
			$locStatesJSON[$key] = json_decode($value);
		}
	}
	
?>
<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<title>BESIAN</title>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>

			$(document).ready(() => {
			
				locStatesJSON = '<?php echo json_encode($locStatesJSON) ?>';
				locStatesJSON = JSON.parse(locStatesJSON);

				console.log($( ".holder .map" ).width(), $( ".holder .map" ).height(), $(".window").width(), $(".window").height(), $(".window").offset().left);

				let dX = $(".window").offset().left;
				let dY = $(".window").offset().top;
				let mX = ($( ".holder .map" ).width() - $(".window").width()) - dX;
				let mY = ($( ".holder .map" ).height() - $(".window").height()) - dY;
				$( ".holder" ).draggable({ 
					containment: [-mX, -mY, dX, dY]
					,start: function() {

						$(this).css({transform: "none", top: $(this).offset().top+"px", left:$(this).offset().left+"px"})					
					}
				});
			
			});
		
		</script>
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
				border: 2px solid rgba(255,234,0,1);
				overflow: hidden;
				cursor: pointer;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			
			.holder {
			/*	width: 100%;
				height: 100%;*/
				position: absolute;
				left:68%;
				top: 52%;
				-webkit-transform: translateY(-52%) translateX(-68%);
			}

			.map {
				min-height: 100%;
			    min-width: 100%;
			    width: auto;
			}
						
			.point {
				width: 10px;
				height: 10px;
				position: absolute;
			}
			
			.enabled {
				background: green;
				border: 2px solid #000;
				border-radius: 10px;
			}
			
			.disabled {
				background: red;
				border: 2px solid #000;
				border-radius: 10px;
			}
			
			
			
			.point div {
				display: none;
				color: wheat;
				padding: 2px 5px;
				border: 2px solid #000;
				position: absolute;
				top: -30px;
				left: 0;
				margin: 0 auto;
				margin-left: 50%;
				transform: translateX(-50%);
				white-space: nowrap;
			}
			
			.enabled div {
				background: darkslategrey;			
			}
			
			.disabled div {
				background: darkred;
			}
			
			.point.enabled:hover div,
			.point.disabled:hover div {
				display: block;
			}

			.cant-go {
				position: absolute;
				top: 0; bottom: 0;
				left: 0; right: 0;
				margin: auto;
				z-index: 10;
				background: brown;
				width: 500px;
				height: 180px;
				color: white;
				font-size: 28px;
				padding: 0 20px;
				border: 5px solid black;
				border-radius: 20px;
				display: none;
				grid-template-rows: 1fr min-content 1fr;

			}

			.cant-go .close {
				position: absolute;
				right: 0;
				top: 0;
   				line-height: 25px;
			}

			.cant-go .info {
				grid-row: 2;
				text-align: center;
			}


		</style>
        <link href="../style.css" rel="stylesheet" type="text/css" />
	</head>
	<body class="ingame">
	
		<div class="window">
			<div class="holder">
				<img class="map" src="IMG/besion_map.png" width="2000" height="2000">			
				<div id="100" class="point <?=($locStatesJSON["loc100"]->enabled) ? "enabled" : "disabled" ?>" style="left: 1160px; top: 1030px; "><div>BESIAN</div></div>
				<div id="101" class="point <?=($locStatesJSON["loc101"]->enabled) ? "enabled" : "disabled" ?>" style="left: 1105px; top: 990px; "><div>BOBRZY OSTRÓW</div></div>
				<div id="102" class="point <?=($locStatesJSON["loc102"]->enabled) ? "enabled" : "disabled" ?>" style="left: 1173px;top: 1070px; "><div>SCIEŻKA POŁUDNIOWA</div></div>
				<div id="103" class="point <?=($locStatesJSON["loc103"]->enabled) ? "enabled" : "disabled" ?>" style="left: 1035px;top: 870px;"><div>CHATA DRWALA</div></div>
				<div id="104" class="point <?=($locStatesJSON["loc104"]->enabled) ? "enabled" : "disabled" ?>" style="left: 1130px;top: 1100px;"><div>LAS BANITÓW</div></div>
				<div id="105" class="point <?=($locStatesJSON["loc105"]->enabled) ? "enabled" : "disabled" ?>" style="left: 759px;top: 1760px;"><div>WULKAN AZDEBA</div></div>
				<div id="106" class="point <?=($locStatesJSON["loc106"]->enabled) ? "enabled" : "disabled" ?>" style="left: 685px;top: 1805px;"><div>MAGMISKO</div></div>
				<div id="107" class="point <?=($locStatesJSON["loc107"]->enabled) ? "enabled" : "disabled" ?>" style="left: 830px;top: 1783px;"><div>OGNISTA ŚCIEŻKA</div></div>
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
			<div class="cant-go">
				<div class="close">X</div>
				<div class="info">DROGĘ DO TEJ LOKACJI BLOKUJĄ BESTIE.. ROZPRAW SIĘ Z NIMI, ABY PRZEJŚĆ DALEJ!</div>
				<script>
					
					$(".cant-go .close").on("click", function() {
						$(".cant-go").css("display", "none");
					});

				</script>
			</div>	

			<div class="cant-go" style="<?php if(isset($_GET["pve"])) echo "display: grid;"; ?>" >
				<div class="close">X</div>
				<div class="info"><?php if(isset($_GET["pve"])) echo $_GET["pve"]; ?></div>
				<script>
					
					$(".cant-go .close").on("click", function() {
						$(".cant-go").css("display", "none");
					});

				</script>
			</div>	
		</div>

		<script>
			
			$(".point").on("click", function() {

				if(locStatesJSON["loc"+$(this).attr("id")].type=="city" && $(this).hasClass("enabled")) {
					location.replace("location.php?loc="+$(this).attr("id"));
				} else if(locStatesJSON["loc"+$(this).attr("id")].type=="exp" && $(this).hasClass("disabled")) {
					//console.log("pve.php?guard="+locStatesJSON["loc"+$(this).attr("id")].guardian);
					//location.replace("pve.php?guard="+locStatesJSON["loc"+$(this).attr("id")].guardian);
					$(".cant-go").css("display", "grid");
				} else if(locStatesJSON["loc"+$(this).attr("id")].type=="exp" && $(this).hasClass("enabled")) {
					location.replace("bitka.php");
					//console.log("pve.php?guard="+locStatesJSON["loc"+$(this).attr("id")].guardian);
					//location.replace("pve.php?enemy="+locStatesJSON["loc"+$(this).attr("id")].guardian);
				} else if(locStatesJSON["loc"+$(this).attr("id")].type=="elit" && $(this).hasClass("enabled")) {
					//location.replace("pve.php?enemy="+locStatesJSON["loc"+$(this).attr("id")].guardian);
					$(".cant-go").css("display", "grid");
				} else {
					$(".cant-go").css("display", "grid");
				}


			});

		</script>
	
	</body>
	
</html>