<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-export-customer");

// imports mage root of export target 
include "/Users/vico/Workspace/MyGassiShop/app/Mage.php";
Mage::app();

// sets path of export
$path ="/Users/vico/Workspace/MyGassiShop/shell/customers/";

$coll = Mage::getModel("customer/customer")
	->getCollection()
	->addAttributeToSelect("*")
	->load();

$path = Mage::getBaseDir() . "/media/init/prod-";

$i = 0;
foreach($coll as $prod){
	$p = $path . $i . ".php";
	file_put_contents($p, serialize($prod));
	print "exporting: " . $p . PHP_EOL;	


$indx = 0;
foreach($coll as $customer){
	$customer = $customer->load($customer->getId());
	$d = serialize($customer);
	$target = $path . "customer" . $indx;
	file_put_contents($target, $d);
	$indx++;
}

logger("Stopping: mygassi-export-customer");

exit(1);
