<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-import-salesrules");

// imports mage root of import target 
include "/var/www/shop.mygassi.com/htdocs/app/Mage.php";
Mage::app();

// sets path of import 
$path ="/var/www/shop.mygassi.com/htdocs/shell/rules/rule";

$indx = 0;
while(true){
	$target = $path . $indx;
	print "target: " . $target . PHP_EOL;
	$d = file_get_contents($target);
	$d = unserialize($d);
	if(null == $d){
		break;
	}
	$rule = Mage::getModel("salesrule/rule");
	$rule->setData($d);
	$rule->setWebsiteId(1);
	try{
		$rule->save();
	}
	catch(Exception $e){
		print $e->getMessage() . PHP_EOL;
	}
	$indx++;
}

logger("Stopping: mygassi-import-salesrules");

exit(1);
