<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-export-address");

// imports mage root of export target 
include "/var/www/www.mygassi.com/htdocs/shop/app/Mage.php";
Mage::app();

$path = "/var/www/shop.mygassi.com/htdocs/shell/customers/address";

$coll = Mage::getModel("customer/address")
	->getCollection()
	->addAttributeToSelect("*")
	->load();

$indx = 0;
foreach($coll as $address){
	$d = serialize($address->getData());
	$target = $path . $indx;
	file_put_contents($target, $d);
	$indx++;
}

logger("Stopping: mygassi-export-address");

exit(1);
