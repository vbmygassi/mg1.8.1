<?php
require_once("mygassi-config.php");

$lh = null; 
function logger($message){
	global $lh;
	if(null === $lh){ $lh = fopen(LogPath, "a+"); }
	// date_default_timezone_set("Europe/Kiel");
	date_default_timezone_set("Europe/Kiev"); // !!!! Atomic Bomb issue from the 60ies... KIEL <-> KIEV
	date_default_timezone_set("Europe/Helsinki");
	date_default_timezone_set("Europe/Berlin");
	fwrite($lh, date("d M Y H:i:s"));
	fwrite($lh, " : ");
	fwrite($lh, $message);
	fwrite($lh, "\n");
	return true;
}

