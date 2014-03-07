<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-import-order");

// imports mage root of import target 
include "/Users/vico/Workspace/MyGassiShop1.8.1/magento/app/Mage.php";
Mage::app();

// sets path of import 
$path ="/Users/vico/Workspace/MyGassiShop1.8.1/magento/shell/orders/order";

$indx = 0;
while(true){
	$target = $path . $indx . ".php";
	print "target: " . $target . PHP_EOL;
	$d = file_get_contents($target);
	$d = unserialize($d);
	if(null == $d){
		break;
	}
	$order = Mage::getModel("sales/order");
	$order->setData($d);
	print_r($d);
	exit(1);
	try{
		$order->save();
	}
	catch(Exception $e){
		print $e->getMessage() . PHP_EOL;
	}
	$indx++;
}

logger("Stopping: mygassi-import-customer");

exit(1);
