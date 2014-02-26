<?php
include("/Users/vico/Workspace/MyGassiShop/app/Mage.php");
Mage::app();




$coll = Mage::getModel("customer/customer")
	->getCollection()
	->addAttributeToSelect("*");





$exp = array();

foreach($coll as $item){
	$exp[]= $item;
}

file_put_contents("temp", serialize($exp));

exit(1);
