<?php 

	

?>

<!DOCTYPE HTML>
<html>
	<head>

		<meta charset="UTF-8">
		<title>BESIAN</title>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
		
			$(document).ready(() => {
			
				console.log($( ".holder .location" ).width(), $( ".holder .location" ).height(), $(".window").width(), $(".window").height(), $(".window").offset().left);

				let dX = $(".window").offset().left;
				let dY = $(".window").offset().top;
				let mX = ($( ".holder .location" ).width() - $(".window").width()) - dX;
				let mY = ($( ".holder .location" ).height() - $(".window").height()) - dY;
				$( ".holder" ).draggable({ 
					containment: [-mX, -mY, dX, dY]
					// ,start: function() {

					// 	$(this).css({transform: "none", top: $(this).offset().top+"px", left:$(this).offset().left+"px"})					
					// }
				});
			
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
				display: flex;
				align-items: center;
				justify-content: center;
			}

			.holder {
				width: 100%;
				height: 100%;
				/*display: flex;*/
				/*align-items: center;*/
				/*justify-content: center;*/
				/*flex-direction: column;*/
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

		</style>

	</head>
	<body class="ingame">
		
		<div class="window">
			
			<div class="holder">
				
				<?php 

					if(isset($_GET["loc"]) && file_exists( "locations/loc".$_GET["loc"].".php" )) {
						include "locations/loc".$_GET["loc"].".php";
					} else {

					}
					

				?>
	

				<script>

					$(document).ready(() => {
						$('img').mapster({
					          	fillColor: 'ffffff',
					          	fillOpacity: .2,
					          	clickNavigate: true
					      	});

						$(".return").on("click", () => {
							location.replace("location.php?loc=<?php 
								if(isset($_GET["prev"])) {
									echo $_GET["prev"];
								} else {
									echo "";
								}
							 ?>");
						});
					});

				</script>

			</div>

			<?php 
				if(isset($_GET["prev"])) {
			?>
			<div class="return-holder">
				<div class="return">
					POWRÓT
				</div>
			</div>
            
			<?php 
				}
			?>
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

	</body>

</html>