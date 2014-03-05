<?php
require_once("mygassi-config.php");
require_once("mygassi-logger.php");
require_once(mageroot);
logger("Starting: mygassi-get-last-order-id");

Mage::app();

$loid = Mage::getSingleton('checkout/session')->getLastRealOrderId();
print "last order id: " . $loid . PHP_EOL;

/**

UPDATE eav_entity_store SET increment_last_id = [new order value]  WHERE store_id =[your store id] and  entity_type_id  =11;
update eav_entity_store set increment_last_id = 1200000020088 where increment_last_id = 100000002 

*******************************************/
