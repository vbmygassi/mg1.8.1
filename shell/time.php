<?php
date_default_timezone_set("Europe/Berlin");
print date("d M Y H:i:s");
print PHP_EOL;

require_once("mygassi-logger.php");
require_once("mygassi-config.php");
require_once("mygassi-send-email.php");
require_once(mageroot);


Mage::app();


print Mage::getModel("core/date")->timestamp(time());
print PHP_EOL;

print Mage::getModel("core/date")->date("Y m d H:i:s");
print PHP_EOL;


$sale = Mage::getModel("sales/order")->loadByIncrementId("1200000020455");

print $sale->getCreatedAt();
print PHP_EOL;

print "sale->getCreatedAt():" . Mage::helper("core")->formatDate($sale->getCreatedAt(), "medium", false); 
print PHP_EOL;
