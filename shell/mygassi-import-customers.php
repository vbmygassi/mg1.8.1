<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-import-customer");

// imports mage root of import target 
include "/Users/vico/Workspace/MyGassiShop/app/Mage.php";
Mage::app();

// sets path of import 
$path ="/Users/vico/Workspace/MyGassiShop/shell/customers/customer";

$indx = 0;
while(true){
	$target = $path . $indx;
	print "target: " . $target . PHP_EOL;
	$d = file_get_contents($target);
	$customer = unserialize($d);
	$customer->save();
	print_r($customer->debug());
	$indx++;
}

logger("Stopping: mygassi-import-customer");

exit(1);
