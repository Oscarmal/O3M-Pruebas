<?php
##Run a DOS command and parse it for specific lines
$i = 0;
#exec('ipconfig /all', $response);
exec('dir -w', $response);
foreach($response as $line) { 
  $line = $line; 
  #if (strpos($line, "DNS")>0) {
    print (trim($line));
    print('<br>');
	#echo ("\n");
  #  }
}


##This will execute $cmd in the background (no cmd window) without PHP waiting for it to finish, on both Windows and Unix. 
/**
function execInBackground($cmd) {
    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r")); 
    }
    else {
        exec($cmd . " > /dev/null &");  
    }
}
/**/
?>