<?php
	
		$a=rand(1,2);
		
		if($a==1) {$_SESSION['opponent_skill']="Atak podstawowy";}
		if($a==2) {if($_SESSION['Current_opponent_Mana']>=15){$_SESSION['opponent_skill']="Ugryzienie";}else $_SESSION['opponent_skill']="Atak podstawowy";}
		
	
	
	
?>