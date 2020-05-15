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
        <title>Besian - zarejestruj się</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <main class="wrap">
            <div id="rejestracja">
                 <form method="post" action="registeraction.php">
                    <input type="text" name="nick" placeholder="Twój nick"/>
                    <?php
                        if (isset($_SESSION['e_nick']))
                        {
                            echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                            unset($_SESSION['e_nick']);
                        }
                    ?>
                    <input type="password" name="password" placeholder="Podaj hasło"/>
                    <input type="password" name="password_repeat" placeholder="Powtórz hasło"/>
                    <?php
                        if (isset($_SESSION['e_password']))
                        {
                            echo '<div class="error">'.$_SESSION['e_password'].'</div>';
                            unset($_SESSION['e_password']);
                        }
                    ?>
                    <div class="g-recaptcha" data-sitekey="6LeBLZsUAAAAALHZrMWru0IwXIaOinn0JLnSCWD_" style="margin-left: 60px;"></div>
                    <?php
                        if (isset($_SESSION['e_captcha']))
                        {
                            echo '<div class="error">'.$_SESSION['e_captcha'].'</div>';
                            unset($_SESSION['e_captcha']);
                        }
                    ?>
                    <input type="submit" value="Zarejestruj się!" />
                </form>
            </div>
        </main>
    </body>
</html>