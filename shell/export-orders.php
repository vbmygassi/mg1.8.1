<?php
include("/Users/vico/Workspace/TMyGassiShop/magento/app/Mage.php");
Mage::app();

$coll = Mage::getModel("sales/order")
	->getCollection()
	->addAttributeToSelect("*");

$exp = array();

foreach($coll as $entity){
	$exp[]= $entity;
}

file_put_contents("temp", serialize($exp));

exit(1);
