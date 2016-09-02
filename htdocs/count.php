<?php $handle = fopen("abc.txt", "r"); if(!$handle){ echo "could not open the file" ; } else { $abc = (int ) fread($handle,filesize("abc.txt")); fclose ($handle); $abc++; echo" <strong> you are visitor no ". $abc . " </strong> " ; $handle = fopen("abc.txt", "w" ); fwrite($handle,$abc) ; fclose ($handle) ; } ?>

