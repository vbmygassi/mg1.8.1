<?php
include("/Users/vico/Workspace/MyGassiShop1.8.1/magento/app/Mage.php");
Mage::app();

$d = unserialize(file_get_contents("temp"));

foreach($d as $key=>$value){
	print_r($value->debug());
	try{
		$value->save();
	}
	catch(Mage_Customer_Exception $e){
		print $e->getMessage();
	}
}


exit(1);
