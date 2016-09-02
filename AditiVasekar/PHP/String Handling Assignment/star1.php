<?php
	#Initialize the number of spaces
	$space = 10;
	
	#Initialize count to -1 
	$cnt = -1;
	
	#Main loop for total number of rows
	 for($i=0;$i<9;$i++){
	 
	#Inner loop
		for($j=0;$j<1;$j++){
			
			#For printing first half of diamond
			if($i<5){
				$cnt = $cnt+2;
				$space = $space-2;
				echo "<br>".str_repeat("&nbsp",$space);
				echo str_repeat(" * ",$cnt);
			}
			
			# For printing next half of diamond
			else{
			
				$cnt = $cnt-2;
				$space = $space+2;
				echo "<br>".str_repeat("&nbsp",$space);
				echo str_repeat(" * ",$cnt);
			
			}
		}
	 }

 ?>