<?php
	
		$a=rand(1,4);
		
		if($a==1) {$_SESSION['opponent_skill']="Atak podstawowy";}
		if(($a==2)||($a==3)) {if($_SESSION['Current_opponent_Mana']>=15){$_SESSION['opponent_skill']="Ugryzienie";}else $_SESSION['opponent_skill']="Atak podstawowy";}
		if($a==4) {if($_SESSION['Current_opponent_Mana']>=30){$_SESSION['opponent_skill']="Drapanie";}else $_SESSION['opponent_skill']="Atak podstawowy";}
		
	
	
	
?>