<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-import-customer");

// imports mage root of import target 
include "/var/www/shop.mygassi.com/htdocs/app/Mage.php";
Mage::app();

// sets path of import 
$path ="/var/www/shop.mygassi.com/htdocs/shell/customers/customer";

$indx = 0;
while(true){
	$target = $path . $indx;
	print "target: " . $target . PHP_EOL;
	$d = file_get_contents($target);
	$data = unserialize($d);
	if(null == $data){
		break;
	}
	$customer = Mage::getModel("customer/customer");
	$customer->setWebsiteId(1);
	$customer->setData($data);
	try{
		print_r($customer->debug());
		$customer->save();
	}
	catch(Mage_Customer_Exception $e){
		print $e->getMessage();
	}

	$indx++;
}

logger("Stopping: mygassi-import-customer");

exit(1);
