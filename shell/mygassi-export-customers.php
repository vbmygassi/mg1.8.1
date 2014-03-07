<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-export-customer");

// imports mage root of export target 
include "/var/www/www.mygassi.com/htdocs/shop/app/Mage.php";
Mage::app();

$path = "/var/www/shop.mygassi.com/htdocs/shell/customers/customer";

$coll = Mage::getModel("customer/customer")->getCollection();

$coll = Mage::getModel("customer/customer")
	->getCollection()
	->addAttributeToSelect("*")
	->load();

$indx = 0;
foreach($coll as $customer){
	$d = serialize($customer->getData());
	$target = $path . $indx;
	file_put_contents($target, $d);
	$indx++;
}

logger("Stopping: mygassi-export-customer");

exit(1);
