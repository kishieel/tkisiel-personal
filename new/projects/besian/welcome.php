<?php
    session_start();
    
    // if(!isset($_SESSION['done_registration'])){
    //     header('Location: index.php');
    //     exit();
    // }
    // else{
    //     unset($_SESSION['done_registration']);
    // }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Besian - witamy!</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    <body>
        <video fullscreen autoplay width="100%" height="100%">
            <source src="welcome.mp4" type="video/mp4">
            <source src="welcome.3gp" type="video/3gp">
            Your browser does not support HTML5 video.
        </video>
        <script type="text/javascript">
            
            $(document).ready(function() {
                $("video")[0].play();
                $('video').on('ended',function(){
                    location.replace("game/map.php");
                });
            });


        </script>
    </body>
</html>