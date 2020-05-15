<?php 
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	include "bitkafunkcja.php";
	playerinfo();
	$_SESSION["playerID"] = $_SESSION['id'];;
	
	require "../connect.php";
    $con = new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}

	$con->query('SET NAMES "utf8"');

	$playerEq = null;	
	$q = $con->prepare('SELECT * FROM player_eq WHERE playerID=?');
	$q->bind_param('s', $_SESSION["playerID"]);
	$q->execute();
	if($r = $q->get_result()) {
		if($r->num_rows > 0) {
			$playerEq = $r->fetch_assoc();
		}
	}

	$playerSet = null;	
	$q = $con->prepare('SELECT * FROM player_set WHERE playerID=?');
	$q->bind_param('s', $_SESSION["playerID"]);
	$q->execute();
	if($r = $q->get_result()) {
		if($r->num_rows > 0) {
			$playerSet = $r->fetch_assoc();
		}
	}

	$itemList = array();	
	$q = $con->prepare('SELECT * FROM items');
	$q->execute();
	if($r = $q->get_result()) {
		if($r->num_rows > 0) {
			while($a = $r->fetch_assoc()) {
				array_push($itemList, $a);
			}
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
		
				$( ".holder" ).draggable({ start: function() {

					$(this).css({transform: "none", top: $(this).offset().top+"px", left:$(this).offset().left+"px"});
					
				} });
			
			});
		
		</script>

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

			.holder {
				position: absolute;
				left:68%;
				top: 52%;
				-webkit-transform: translateY(-52%) translateX(-68%);
			}
			
			.field {
				position: absolute;
				/*z-index: 5;*/
				width: 80px;
				height: 80px;
			}

			.set {
				position: absolute;
				/*z-index: 5;*/
				width: 92px;
				height: 92px;
			}

			#f1 {				
				top: 108px;
				left: 114px;
			}

			#f2 {				
				top: 108px;
				left: 241px;
			}

			#f3 {				
				top: 108px;
				left: 373px;
			}

			#f4 {				
				top: 108px;
				left: 505px;
			}
			#f5 {				
				top: 108px;
				left: 636px;
			}
			#f6 {				
				top: 108px;
				left: 763px;
			}
			#f7 {				
				top: 253px;
				left: 114px;
			}

			#f8 {				
				top: 253px;
				left: 241px;
			}

			#f9 {				
				top: 253px;
				left: 373px;
			}

			#f10 {				
				top: 253px;
				left: 505px;
			}
			#f11 {				
				top: 253px;
				left: 636px;
			}
			#f12 {				
				top: 253px;
				left: 763px;
			}
			#f13 {				
				top: 400px;
				left: 114px;
			}

			#f14 {				
				top: 400px;
				left: 241px;
			}

			#f15 {				
				top: 400px;
				left: 373px;
			}

			#f16 {				
				top: 400px;
				left: 505px;
			}
			#f17 {				
				top: 400px;
				left: 636px;
			}
			#f18 {				
				top: 400px;
				left: 763px;
			}
			#f19 {				
				top: 543px;
				left: 114px;
			}

			#f20 {				
				top: 543px;
				left: 241px;
			}

			#f21 {				
				top: 543px;
				left: 373px;
			}

			#f22 {				
				top: 543px;
				left: 505px;
			}
			#f23 {				
				top: 543px;
				left: 636px;
			}
			#f24 {				
				top: 543px;
				left: 763px;
			}

			#helmet {
				top: 133px;
				left: 1142px;
			}

			#armor {
				top: 321px;
				left: 1142px;
			}

			#talisman {
				top: 510px;
				left: 1146px;
			}

			#shield {
				top: 321px;
				left: 984px;
			}

			#weapon {
				top: 321px;
				left: 1300px;
			}

			.item-img {
				width: 80px;
				height: 80px;
				position: relative;
				z-index: 2;
			}

			.item-img-set {
				width: 91px;
				height: 91px;
				z-index: 2;
			}

			.menu {
				position: absolute;
				opacity: .9;
				display: none;
				z-index: 5;
			}

			.menu .option {
				padding: 5px 20px;
				color: white;
				font-size: 16px;
				background: burlywood;
				border: 2px solid yellow;
				text-align: center;
				min-width: 100px;
				font-weight: bold;
			}

			.menu .option:hover {
				padding: 5px 20px;
				color: white;
				font-size: 16px;
				background: gold;
				border: 2px solid yellow;
				text-align: center;
				min-width: 100px;
				font-weight: bold;
			}

			.tip {
				position: absolute;
				top: 0;
				left: 0;
				background: burlywood;
				border: 2px solid yellow;	
				padding: 5px 5px;
				color: white;
				font-size: 16px;
				width: max-content;
				grid-template-columns: max-content 5px max-content;
				display: none;
				opacity: .8;
				z-index: 5;
			}

			.name {
				grid-column: 1/4;
				text-align: center;
				font-weight: bold;
				font-size: 24px;
			}

			.desc {
				grid-column: 1;
			}

			.val {
				grid-column: 3;
			}

			.set:hover .tip{
				display: grid;
			}

		</style>

	</head>
	<body class="ingame">
	
		<div class="window eq-img">
			<div class="holder">
				<img class="map" src="IMG/eq.png" width="1500">	

				<div class="field" id="f1"></div>
				<div class="field" id="f2"></div>
				<div class="field" id="f3"></div>
				<div class="field" id="f4"></div>
				<div class="field" id="f5"></div>
				<div class="field" id="f6"></div>
				<div class="field" id="f7"></div>
				<div class="field" id="f8"></div>
				<div class="field" id="f9"></div>
				<div class="field" id="f10"></div>
				<div class="field" id="f11"></div>
				<div class="field" id="f12"></div>
				<div class="field" id="f13"></div>
				<div class="field" id="f14"></div>
				<div class="field" id="f15"></div>
				<div class="field" id="f16"></div>
				<div class="field" id="f17"></div>
				<div class="field" id="f18"></div>
				<div class="field" id="f19"></div>
				<div class="field" id="f20"></div>
				<div class="field" id="f21"></div>
				<div class="field" id="f22"></div>
				<div class="field" id="f23"></div>
				<div class="field" id="f24"></div>

				<div class="set" id="helmet"></div>
				<div class="set" id="weapon"></div>
				<div class="set" id="armor"></div>
				<div class="set" id="shield"></div>
				<div class="set" id="talisman"></div>

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
			<script>
				
				playerEqJSON = '<?php echo json_encode($playerEq) ?>';
				playerEqJSON = JSON.parse(playerEqJSON);
				playerSetJSON = '<?php echo json_encode($playerSet) ?>';
				playerSetJSON = JSON.parse(playerSetJSON);
				itemListSTRING = '<?php 
					
					$itemListSTRING = json_encode($itemList, JSON_UNESCAPED_UNICODE);
					$itemListSTRING = str_replace(array("\\n", "\\r", "\\"),"",$itemListSTRING);
					$itemListSTRING = str_replace(array("\"{", "}\""),array("{", "}"),$itemListSTRING);
					echo $itemListSTRING;
				 
				?>';
				itemListJSON = {};
				tempItemList = JSON.parse(itemListSTRING);
				for(var key in tempItemList) {
					itemListJSON[tempItemList[key]["itemID"]] = tempItemList[key];
				}

				for (var key in playerEqJSON) {
				    if(key!="playerID" && playerEqJSON[key] != 0) {
				    	if(itemListJSON[playerEqJSON[key]]) {
					    	
				    		if(itemListJSON[playerEqJSON[key]]["type"] == "weapon" || itemListJSON[playerEqJSON[key]]["type"] == "armor" || itemListJSON[playerEqJSON[key]]["type"] == "shield" || itemListJSON[playerEqJSON[key]]["type"] == "talisman" || itemListJSON[playerEqJSON[key]]["type"] == "helmet") {
				    			$("#"+key).append('<div class="menu"><div class="option dress">ZAŁÓŻ</div><div class="option drescription">OPIS</div><div class="option destroy">ZNISZCZ</div></div>');
				    		}						    	

					    	desc = '<div class="name">'+itemListJSON[playerEqJSON[key]]["name"]+'</div>';
					    	for(var skey in itemListJSON[playerEqJSON[key]]["params"]) {
					    		desc += '<div class="desc">'+skey+'</div><div class="val">'+itemListJSON[playerEqJSON[key]]["params"][skey]+'</div>';
					    	}								    						 
					    	$("#"+key).append('<div class="tip">'+desc+'</div>');
					    	$("#"+key).append('<img class="item-img" src="IMG/items/'+itemListJSON[playerEqJSON[key]]["img"]+'.png">');
					    }
				    }
				}

				$(".item-img").on("click", function() {
					
					$(".menu").css("display", "none");
					$(".tip").css("display", "none");
					$(this).parent().find(".menu").css("display", "block");

					parent = this;
					$(this).parent().find(".destroy").on("click", function() {
						$(".menu").css("display", "none");
						$(".tip").css("display", "none");
						$.ajax({
							url:'ajax/destroyItem.php?fID='+$(parent).parent().attr("id")+'&pID=<?php echo $_SESSION["playerID"]; ?>'
						}).done(function(response){	
							location.reload();		
						});
					});

					$(this).parent().find(".dress").on("click", function() {
						$(".menu").css("display", "none");
						$(".tip").css("display", "none");
						$.ajax({
							url:'ajax/dressItem.php?fID='+$(parent).parent().attr("id")+'&pID=<?php echo $_SESSION["playerID"]; ?>&type='+itemListJSON[playerEqJSON[$(parent).parent().attr("id")]]["type"]+'&item='+playerEqJSON[$(parent).parent().attr("id")]
						}).done(function(response){	
							location.reload();		
						});
					});

					$(this).parent().find(".drescription").on("click", function() {
						$(".menu").css("display", "none");
						$(".tip").css("display", "none");
						$(parent).parent().find(".tip").css("display", "grid");
					});

				});

				for (var key in playerSetJSON) {
				    if(key!="playerID" && playerSetJSON[key] != 0) {
				    	if(itemListJSON[playerSetJSON[key]]) {
				    		console.log(key);

					    	desc = '<div class="name">'+itemListJSON[playerSetJSON[key]]["name"]+'</div>';
					    	for(var skey in itemListJSON[playerSetJSON[key]]["params"]) {
					    		desc += '<div class="desc">'+skey+'</div><div class="val">'+itemListJSON[playerSetJSON[key]]["params"][skey]+'</div>';
					    	}								    						 
					    	$("#"+key).append('<div class="tip">'+desc+'</div>');

					    	$("#"+key).append('<img class="item-img-set" src="IMG/items/'+itemListJSON[playerSetJSON[key]]["img"]+'.png">');
					    }
				    }
				}

				// $(".item-img").on("mouseenter", function() {
				// 	$(this).parent().find(".tip").css("display", "grid");
				// });

				// $(".tip").on("mouseleave", function() {
				// 	console.log(1);
				// 	$(".tip").css("display", "none");
				// });

			</script>

		</div>
	
	</body>
	
</html>