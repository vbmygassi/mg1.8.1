<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");

logger("Starting: mygassi-export-salesrule");

// imports mage root of export target 
include "/var/www/www.mygassi.com/htdocs/shop/app/Mage.php";
Mage::app();

// sets path of export
$path ="/var/www/shop.mygassi.com/htdocs/shell/rules/rule";

$coll = Mage::getModel("salesrule/rule")
	->getCollection()
	->load();

$i = 0;
foreach($coll as $rule){
	$p = $path . $i;
	$d = $rule->getData();
	$d = serialize($d);
	print_r($d);
	print PHP_EOL;
	print $p; 
	print PHP_EOL;
	$res = file_put_contents($p, $d);
	print ">>>>" . $res . PHP_EOL . PHP_EOL;
	$i++;
}

logger("Stopping: mygassi-export-salesrules");

exit(1);
