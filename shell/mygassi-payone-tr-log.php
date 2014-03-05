<?php
/*
 Once the cron.php did run (every 15 minutes or so..)
 and Payone returned the transaction_status*es to https://shop.mygassi.com/payone_core/transactionstatus
 this script changes the status flag of an order (once the payone-transaction_status is "paid)
 for further processing 
  ("payed" (payone paid) orders are to be sent to Karlie.
 It seems as if Payone transaction_status mapping has changed since 1.7.0.2 <-> 1.8.1 
*/
require_once("mygassi-config.php");
require_once("mygassi-logger.php");
require_once(mageroot);

logger("Starting: mygassi-payone-transaction");

Mage::app();

$emails = array(""); 

// selects all order ids that labeled as "paid" in the payone transaction status 
$con = Mage::getSingleton("core/resource")->getConnection("core_read");
$sql = 'select reference from payone_protocol_transactionstatus where txaction = "paid"';
$res = $con->fetchAll($sql); 

foreach($res as $id)
{
	$order = Mage::getModel("sales/order")->loadByIncrementId($id);
	$status = $order->getStatus();
	switch($status){
		case "pending":
		case "referred_to_karlie":
		case "sent":
		case "payed":
			break;
		default:
			$order->setState("processing", true, "Zahlung bestätigt durch Payone.");
			$order->setStatus("payed");
			$order->save();
			break;
	}
}


logger("Stopping: mygassi-payone-transaction");
