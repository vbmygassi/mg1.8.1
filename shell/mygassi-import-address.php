<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-import-address");

// imports mage root of import target 
include "/var/www/shop.mygassi.com/htdocs/app/Mage.php";
Mage::app();

// sets path of import 
$path ="/var/www/shop.mygassi.com/htdocs/shell/customers/address";

$indx = 0;
while(true){
	switch($indx){
		case 2:
		case 3: 
			$indx = 4;
		 	break;
		case 30:
		case 31:
			$indx = 32;
			break;
		case 38:
			$indx = 39;
			break;
	}

	$target = $path . $indx;
	print "target: " . $target . PHP_EOL;
	

	$d = file_get_contents($target);
	$data = unserialize($d);

	if(null == $data){
		break;
	}
	
	$address = Mage::getModel("customer/address");
	$address->setWebsiteId(1);
	
	try{
		$address->setData($data);
		print_r($address->debug());
		$address->save();
	}
	catch(PDOException $e){
		print $e->getMessage();
	}

	$indx++;
}

logger("Stopping: mygassi-import-address");

exit(1);
