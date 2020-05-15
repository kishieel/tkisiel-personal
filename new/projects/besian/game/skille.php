<?php
function SkillTrigger()
{
	BuffCheck();
	if ($_POST['player_skill']=="Atak podstawowy")
	{
			AtakPodstawowy(); 
	}
	else if ($_POST['player_skill']=="Kamienna skora") {if($_SESSION['Current_player_Mana']>=$_SESSION['ManaCost'])
	{$_SESSION['nomana']=0; KamiennaSkora();} else {$_SESSION['nomana']=1; AtakPodstawowy(); }}
	else if ($_POST['player_skill']=="Miazdzacy cios") {if($_SESSION['Current_player_Mana']>=$_SESSION['ManaCost'])
	{$_SESSION['nomana']=0; MiazdzacyCios();} else {$_SESSION['nomana']=1; AtakPodstawowy(); }}
else if ($_POST['player_skill']=="Podwojne uderzenie") {if($_SESSION['Current_player_Mana']>=$_SESSION['ManaCost'])
	{$_SESSION['nomana']=0; PodwojneUderzenie();} else {$_SESSION['nomana']=1; AtakPodstawowy(); }}
	BuffExpire();
}
function PlayerDmg($min,$max)
{
	$_SESSION['PlayerDmg']=rand($min,$max);
	$_SESSION['PlayerDmg']=$_SESSION['PlayerDmg']*$_SESSION['hits'];
	if ((isset($_SESSION['OslabieniePancerzaCounter']))&&($_SESSION['OslabieniePancerzaCounter']>0))
		{$_SESSION['PlayerDmg']=round($_SESSION['PlayerDmg']*1.2);}
	
	
	$_SESSION['Current_opponent_HP']-=$_SESSION['PlayerDmg'];
	
}
function AtakPodstawowy()
{
	$min=$_SESSION['duch'];
	$max=round($_SESSION['duch']*1.3);
	$_SESSION['hits']=1;
	PlayerDmg($min,$max);
}
function KamiennaSkora()
{
	$_SESSION['KamiennaSkoraEff']=0.8;
	$_SESSION['KamiennaSkoraCounter']=6;
    $_SESSION['ManaCost']=50;
	$_SESSION['PlayerDmg']=0;
	$_SESSION['Current_player_Mana']=$_SESSION['Current_player_Mana']-$_SESSION['ManaCost'];
}
function MiazdzacyCios()
{
	$min=round($_SESSION['duch']*0.8);
	$max=round($_SESSION['duch']*1.1);
	$_SESSION['hits']=1;
	PlayerDmg($min,$max);
	$i=rand(1,5);
	if ($i==1){
	$_SESSION['OslabionyPancerzCounter']=4;
	}
	$_SESSION['ManaCost']=40;
	$_SESSION['Current_player_Mana']=$_SESSION['Current_player_Mana']-$_SESSION['ManaCost'];
}
function PodwojneUderzenie()
{
	$min=round($_SESSION['duch']*0.6);;
	$max=round($_SESSION['duch']*1.1);;
	$_SESSION['hits']=2;
	PlayerDmg($min,$max);
	$_SESSION['ManaCost']=60;
	$_SESSION['Current_player_Mana']=$_SESSION['Current_player_Mana']-$_SESSION['ManaCost'];
}
function BuffCheck()
{
	if ((isset($_SESSION['KamiennaSkoraCounter']))&&($_SESSION['KamiennaSkoraCounter']==0)) {$_SESSION['KamiennaSkoraEff']=0;}
}
function BuffExpire()
{
	if ((isset($_SESSION['KamiennaSkoraCounter']))&&($_SESSION['KamiennaSkoraCounter']>0)) {$_SESSION['KamiennaSkoraCounter']--;}
	if ((isset($_SESSION['OslabionyPancerzCounter']))&&($_SESSION['OslabionyPancerzCounter']>0)) {$_SESSION['OslabionyPancerzCounter']--;}
}

?>