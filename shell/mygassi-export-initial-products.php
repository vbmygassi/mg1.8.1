<?php
/*

 Exports the 3 initial products 

 */

require_once("mygassi-config.php");
require_once("mygassi-logger.php");
require_once(mageroot); 

Mage::app();

$coll = Mage::getModel("catalog/product")
	->getCollection()
	->addAttributeToSelect("*")
	->addAttributeToFilter("appears_on_the_internez", true)
	->load();

$path = Mage::getBaseDir() . "/media/init/prod-";

$i = 0;
foreach($coll as $prod){
	$p = $path . $i . ".php";
	file_put_contents($p, serialize($prod));
	print "exporting: " . $p . PHP_EOL;	
	$i++;
}

exit(1);
