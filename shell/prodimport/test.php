<?php

require_once("/Users/vico/Workspace/MygassiShop1.8.1/magento/app/Mage.php");

Mage::app();

$ctc = Mage::getModel("tax/class")->getCollection()->addFieldToFilter("class_name", "Taxable Goods")->load()->getFirstItem();
print_r($ctc->debug());
		
