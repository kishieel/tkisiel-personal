<?php
    session_start();
    if ((!isset($_POST['nick'])) || (!isset($_POST['password'])))
	{
		header('Location: register.php');
		exit();
	}
    if(isset($_POST['nick'])){
        $OK = true;

        $nick = $_POST['nick'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];

        if((strlen($nick)<4) || (strlen($nick)>16)){
            $OK=false;
            $_SESSION['e_nick']="Nick może zawierać od 4 do 16 znaków.";
            header('Location: register.php');
        }
        if(ctype_alnum($nick)==false){
            $OK=false;
            $_SESSION['e_nick']="Nick może się składać tylko z liter i cyfr.";
            header('Location: register.php');
        }
        if((strlen($password)<6) || (strlen($password)>20)) {
            $OK=false;
            $_SESSION['e_password']="Za krótkie lub za długie hasło.";
            header('Location: register.php');
        }
        if($password != $password_repeat){
            $OK=false;
            $_SESSION['e_password']="Hasła są od siebie różne.";
            header('Location: register.php');
        }
        
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        
        $secret = "6LeBLZsUAAAAABYEH1a0kKCcVIGNcQILNbDHaS35";
        
        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        
        $answer = json_decode($check);
        
        if($answer->success==false){
            $OK = false;
            $_SESSION['e_captcha']="Potwierdź, że nie jesteś botem.";
            header('Location: register.php');
        }
        
        require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
        
        try{
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            
            if ($connection->connect_errno!=0){
		      throw new Exception(mysqli_connect_errno());
	       }
            else{
                $result = $connection->query("SELECT id FROM users WHERE nick='$nick'");
                
                if (!$result) throw new Exception($connection->error);
                
                $how_many_nicks = $result->num_rows;
                if($how_many_nicks>0){
                    $OK=false;
                    $_SESSION['e_nick']="Istnieje już gracz o takim nicku.";
                    header('Location: register.php');
                }
                if($OK == true){
                    
                    if($connection->query("INSERT INTO users (nick, password) VALUES ('$nick', '$password_hashed')")){
                        $_SESSION['done_registration']=true;
						$result1 = $connection->query("Insert into player_eq (f1,f2,f3) values (1,10,12)");
						$result2 = $connection->query("Insert into player_set values ()");
						$result3 = $connection->query("Insert into player_location values ()");
						$sql = "SELECT MAX(id) as max from users";
							if(!$result4 = $connection->query($sql))
{
    die('Wystąpił błąd z zapytaniem SQL [' . $connection->error . ']');
}
	
	while($row = $result4->fetch_assoc())
	{
			$_SESSION['id']=$row['max'];
	}
                        header("Location: welcome.php");
                    }
                    else{
                        throw new Exception($connection->error);
                    }
                }
                $connection->close();
            }
        }
        catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera</span>';
            echo $e;
		}
    }
?>