<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-export-order");

// imports mage root of export target 
include "/var/www/www.mygassi.com/htdocs/shop/app/Mage.php";
Mage::app();

// sets path of export
$path ="/var/www/shop.mygassi.com/htdocs/shell/orders/order";

$coll = Mage::getModel("sales/order")
	->getCollection()
	->addAttributeToSelect("*")
	->load();

$i = 0;
foreach($coll as $sale){
	$p = $path . $i . ".php";
	$d = $sale->getData();
	$d = serialize($d);
	print_r($d);
	file_put_contents($p, $d);
	print "exporting: " . $p . PHP_EOL;	
	$i++;
}

logger("Stopping: mygassi-export-order");

exit(1);
