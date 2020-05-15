<?php

	session_start();
	
	if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
	{
		header('Location: game/map.php');
		exit();
	}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Besian - strona główna</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        
    </head>
    <body>
        <main class="wrap">
            <div id="logowanie">
                 <form action="login.php" method="post">
                    <input type="text" name="nick" placeholder="Nick"/>
                    <input type="password" name="password" placeholder="Hasło"/>
                    <input type="submit" value="Zaloguj się!" />
                    <?php
	                   if(isset($_SESSION['failed']))	echo $_SESSION['failed'];
                    ?>
                    <br />
                    Nie masz jeszcze konta? <a href="register.php">Zarejestruj się!</a>
                </form>
				<div class="credits">KREDYTY</div>
            </div>
        </main>
		 <video class="vid" fullscreen width="100%" height="100%">
            <source src="credits.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
		<audio class="aud">
		  <source src="credits.wav" type="audio/wav" > 
			Your browser does not support the audio element.
			</audio>
    </body>
	<script>
			$(".credits").on("click", function() {
                console.log(1);
				$(".vid").css("display", "block");
				$(".vid")[0].play();
				$(".aud")[0].play();
                $('.vid').on('ended',function(){
                    $(this).css("display", "none");
                });
            });
	</script>
</html>