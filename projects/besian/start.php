<?php

	session_start();
	
	if (!isset($_SESSION['logged']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Besian - start</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <main class="wrap">
            <div id="logowanie">
                 dzien dobry <br />
                <a href="logout.php">wyloguj</a>
            </div>
        </main>
    </body>
</html>