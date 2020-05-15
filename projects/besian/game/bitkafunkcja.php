<?php
	function opponentinfo()
	{
	    require "../connect.php";

		$con2 = new mysqli($host, $db_user, $db_password, $db_name);
	if ($con2->connect_error) {
		die("Connection failed: " . $con2->connect_error);
	}
	$con2 -> query("SET NAMES 'utf8'");
	
	
	$sql = <<<SQL
    SELECT *
    FROM enemies
    WHERE idprzeciwnika = 1
SQL;
if(!$result = $con2->query($sql))
{
    die('Wystąpił błąd z zapytaniem SQL [' . $con2->error . ']');
}
	
	while($row = $result->fetch_assoc())
	{
			$_SESSION['oppid']=$row['idprzeciwnika'];
			$_SESSION['oppname']=$row['nazwa'];
			$_SESSION['opplvl']=$row['lvl'];
			$_SESSION['expreward']=$row['expreward'];
			$_SESSION['oppmin']=$row['min'];
			$_SESSION['oppmax']=$row['max'];
			$_SESSION['opponent_Max_Mana']=$row['maxmana'];
			$_SESSION['opponent_Max_HP']=$row['maxhp'];
			$_SESSION['OpponentSpeed']=$row['basespeed'];
			$_SESSION['drop1']=$row['item1'];
			$_SESSION['drop2']=$row['item2'];
			$_SESSION['drop3']=$row['item3'];
			$_SESSION['AI']=$row['AI'];
			$_SESSION['lokalizacja']=$row['lokalizacja'];
			$_SESSION['grafika']=$row['grafika'];
			
                
	}
	if ($con2->connect_error) {
		die("Connection failed: " . $con2->connect_error);
	}
	$con2->close();

	}
	function playerinfo()
	{
		require "../connect.php";

		$con2 = new mysqli($host, $db_user, $db_password, $db_name);
	if ($con2->connect_error) {
		die("Connection failed: " . $con2->connect_error);
	}
	$con2 -> query("SET NAMES 'utf8'");
	$nr=$_SESSION['id'];
		$sql = <<<SQL
    SELECT *
    FROM users
    WHERE id = $nr
SQL;
if(!$result = $con2->query($sql))
{
    die('Wystąpił błąd z zapytaniem SQL [' . $con2->error . ']');
}
	
	while($row = $result->fetch_assoc())
	{
			$_SESSION['nazwa']=$row['nick'];
			$_SESSION['lvl']=$row['lvl'];
			$_SESSION['wola']=$row['Wola'];
			$_SESSION['duch']=$row['Duch'];
			$_SESSION['umysl']=$row['Umysl'];
			$_SESSION['money']=$row['cash'];
			$_SESSION['exp']=$row['exp'];
	}
	$con2->close();
	}
	function max_resources()
	{
	
		$_SESSION['player_Max_HP']=round(50+($_SESSION['wola']*1.1)+($_SESSION['lvl'])*10);
		$_SESSION['player_Max_Mana']=round(60+($_SESSION['umysl']*1.3)+($_SESSION['lvl'])*5);
		$_SESSION['PlayerSpeed']=100+round($_SESSION['duch']*0.8);
	}
	function current_resources()
	{
		if (!isset($_SESSION['Current_player_HP']))
	{
	
    $_SESSION['Current_player_HP']=$_SESSION['player_Max_HP'];
	$_SESSION['Current_player_Mana']=$_SESSION['player_Max_Mana'];
	$_SESSION['Current_opponent_HP']=$_SESSION['opponent_Max_HP'];
	$_SESSION['Current_opponent_Mana']=$_SESSION['opponent_Max_Mana'];
	}
	}
	function resultCheck()
	{
		if ($_SESSION['Current_player_HP']<=0) {header ("location: lose.php"); exit();}
		if ($_SESSION['Current_opponent_HP']<=0) {header ("location: win.php"); exit();}
	}
	function battle()
	{
		if (isset($_POST['player_skill']))
		{
		if ($_SESSION['PlayerSpeed']>$_SESSION['OpponentSpeed'])
		{
			$_SESSION['move']=1;
			SkillTrigger();
			ResultCheck();
			OppSkillTrigger();
			ResultCheck();
			
		}else if ($_SESSION['PlayerSpeed']<$_SESSION['OpponentSpeed'])
		{
			$_SESSION['move']=2;
			OppSkillTrigger();
			ResultCheck();
			SkillTrigger();
			ResultCheck();
		}
		else if ($_SESSION['PlayerSpeed']==$_SESSION['OpponentSpeed'])
		{
			$_SESSION['move']=rand(1,2);
			if ($_SESSION['move']==1)
			{
			SkillTrigger();
			ResultCheck();
			OppSkillTrigger();
			ResultCheck();
			}
			else if ($_SESSION['move']==2)
			{
			OppSkillTrigger();
			ResultCheck();
			SkillTrigger();
			ResultCheck();
			}
			
		}
		}
	}
	function logs()
	{
		if (isset($_POST['player_skill']))
		{
			$buff=0;$obuff=0;
			if (((isset($_SESSION['nomana']))&&($_SESSION['nomana']==0))||(!isset($_SESSION['nomana'])))
			{
		$playerlog="Użyłeś zdolności ".$_POST['player_skill'];
		if ((isset($_SESSION['PlayerDmg']))&&($_SESSION['PlayerDmg']>0)) {$playerdmglog=" i zadałeś ".$_SESSION['PlayerDmg']." obrażeń";} else {$playerdmglog="";}
		$opplog="Twój przeciwnik użył zdolności ".$_SESSION['opponent_skill'];
		if ($_SESSION['OppDmg']>0) {$oppdmglog=" i zadał ".$_SESSION['OppDmg']." obrażeń";}else {$oppdmglog="";}
			}
			else if ((isset($_SESSION['nomana']))&&($_SESSION['nomana']==1))
			{
		$playerlog="Brak many! Wykonałeś atak podstawowy";
		if ((isset($_SESSION['PlayerDmg']))&&($_SESSION['PlayerDmg']>0)) {$playerdmglog=" i zadałeś ".$_SESSION['PlayerDmg']." obrażeń";} else {$playerdmglog="";}
		$opplog="Twój przeciwnik użył zdolności ".$_SESSION['opponent_skill'];
		if ($_SESSION['OppDmg']>0) {$oppdmglog=" i zadał ".$_SESSION['OppDmg']." obrażeń";}else {$oppdmglog="";}
			}
		
		if ((isset($_SESSION['KamiennaSkoraCounter']))&&($_SESSION['KamiennaSkoraCounter']>0))
		{$playerbufflog = "Działający efekt - Kamienna skóra, pozostały czas trwania: ".$_SESSION['KamiennaSkoraCounter']; $buff=1;}
		if ((isset($_SESSION['OslabionyPancerzCounter']))&&($_SESSION['OslabionyPancerzCounter']>0))
			{$oppbufflog = "Działający efekt - Osłabiony pancerz, pozostały czas trwania: ".$_SESSION['OslabionyPancerzCounter']; $obuff=1;}
		if ($buff==0) {$playerbufflog="";}
		if ($obuff==0) {$oppbufflog="";}
		
		if ($_SESSION['move']==1)
		{
			echo '<p style="color:lightblue;">'.$playerlog.$playerdmglog."<br />".$playerbufflog.'</p>'.'<p style="color:red; border-top:1px solid white; padding-top:3px;">'.$opplog.$oppdmglog."<br />".$oppbufflog.'</p>';
		}
		else if ($_SESSION['move']==2)
		{
			echo '<p style="color:red;">'.$opplog.$oppdmglog."<br />".$oppbufflog.'</p>'.'<p style="color:blue; border-top:1px solid black; padding-top:3px;">'.$playerlog.$playerdmglog."<br />".$playerbufflog.'</p>';
		}
		
		}
	}
	function StatReset()
	{
		unset($_SESSION['player_Max_HP'],$_SESSION['player_Max_Mana'],$_SESSION['opponent_Max_HP'],$_SESSION['opponent_Max_Mana'],
		$_SESSION['PlayerSpeed'],$_SESSION['OpponentSpeed'],$_SESSION['Current_player_HP'],$_SESSION['Current_player_Mana'],$_SESSION['Current_opponent_HP'],$_SESSION['Current_opponent_Mana'],
		$_SESSION['tura'],$_SESSION['PlayerDmg'],$_SESSION['OppDmg'],$_SESSION['hits'],$_SESSION['OppHits'],$_SESSION['opponent_skill'],$_SESSION['KamiennaSkoraCounter'],$_SESSION['KamiennaSkoraEff'],$_SESSION['nomana'],
		$_SESSION['OslabionyPancerzCounterEff'],$_SESSION['umysl'],$_SESSION['duch'],$_SESSION['wola']);
	}
	
?>