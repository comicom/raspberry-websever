<?php
$get_sig ;
$myFile = "/home/pi/controlData.txt" ;
$domain = "tcp://"."ip address"; //input your domain
	if ($_GET["ardu"] == "data") {
		$fh = fopen($myFile. 'r') ;
		$line = fgets($fh) ;
		fclose($fh) ;
		echo $line ;
	}

	else if ($_GET["led"] != NULL) {
		$get_sig = $_GET["opt_sig"] ;
		if ($get_sig == "on") {
			$fh = fopen($myFile, 'w') ;
			 fwrite($fh, '1') ;
			fclose($fh) ;
			$fp = fsockopen($domain, 80, $errno, $errstr, 30) ;
		 	if (!$fp) {
				echo "$errstr ($errno)<br/>\n" ;
			}
			else {
				fwrite($fp, "on") ;
				fclose($fp) ;
			}
			echo "<script>location.replace('../html/led.html') ;</script>" ;
		}
		else if ($get_sig == "off") {
			$fh = fopen($myFile, 'w') ;
		fwrite($fh, '0') ;
			fclose($fh) ;
			$fp = fsockopen($domain, 80, $errno, $errstr, 30) ;
			if (!$fp) {
				echo "$errstr ($errno)<br/>\n" ;
			}
			else {
				fwrite($fp, "off") ;
				fclose($fp) ;
			}
			echo "<script>location.replace('../html/led.html') ;</script>" ;
		}
  	}
  	else {
    		echo "fail to get led data" ;
	}
?>
