<?php
	function OppDamage($min,$max)
	{
		$_SESSION['OppDmg']=rand($min,$max);
		
		if ((isset($_SESSION['KamiennaSkoraCounter']))&&($_SESSION['KamiennaSkoraCounter']!=0)) {$_SESSION['OppDmg']=round($_SESSION['KamiennaSkoraEff']*$_SESSION['OppDmg']);}
		
		
		$_SESSION['Current_player_HP']-=($_SESSION['OppDmg']*$_SESSION['OppHits']);
	}
	function OppSkillTrigger()
	{
		if (isset($_SESSION['opponent_skill']))
		{
		if ($_SESSION['opponent_skill']=="Atak podstawowy") {OppAtakPodstawowy();}
		else if ($_SESSION['opponent_skill']=="Ugryzienie") {Ugryzienie();}
		}
			
	}
	function OppAtakPodstawowy()
	{
		$min=$_SESSION['oppmin'];
		$max=$_SESSION['oppmax'];
		$_SESSION['OppHits']=1;
		OppDamage($min,$max);
	}
	function Ugryzienie()
	{
		$min=round($_SESSION['oppmin']*1.3);
		$max=round($_SESSION['oppmax']*1.3);
		$_SESSION['OppHits']=1;
		$_SESSION['OppManaCost']=15;
		$_SESSION['Current_opponent_Mana']-=$_SESSION['OppManaCost'];
		OppDamage($min,$max);
	}
	

?>