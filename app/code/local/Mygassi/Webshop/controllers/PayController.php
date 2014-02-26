<?php
class Mygassi_Webshop_PayController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		// redirects without a session
		$customerSession = Mage::getSingleton("customer/session")->isLoggedIn();
		if(!$customerSession){
			$loc = Mage::getBaseUrl() . "web/";
			Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
			exit(1);
		}

		// reads post values
		$q = Mage::app()->getRequest()->getParams();

		// discontinues without payment type
		switch($q["payment_type"]){
			case "checkmo":
			case "payone_wallet":
			case "payone_online_bank_transfer":
				// 	
				break;
			default:
				$this->sendError("Dieser Bezahltyp wird nicht unterstützt.");
				exit(1);
				break;
		}
	
		// sets up a payment
		$checkout = Mage::getSingleton('checkout/type_onepage');
		$checkout->initCheckout();
		$checkout->saveCheckoutMethod("customer");
		
		// sets up billing	
		$billing = array();
		$checkout->saveBilling($billing, false);
		
		// sets up shipping
		$shipping = array();
		$checkout->saveShipping($shipping, false);

		// sets up shipping method
		$checkout->saveShippingMethod("freeshipping_freeshipping", false);

		// sets up payment method
		$d["method"] = $q["payment_type"];
	
		// test values	
		switch($q["payment_type"]){
			case "payone_online_bank_transfer":
				$d["payone_online_bank_transfer_obt_type_select"] = "7_PNT";
				$d["payone_account_number"] = "2599100003";
				$d["payone_bank_code"] = "12345678";
				$d["payone_config_payment_method_id"] = "7";
				$d["payone_onlinebanktransfer_type"] = "PNT";
				break;
			case "payone_wallet":
				$d["payone_wallet_type"] = "PPE";
				$d["payone_config_payment_method_id"] = "3";
				break;
			case "checkmo":
				break;
		}
		// saves payment	
		$checkout->savePayment($d, false);
	
		// saves order [requests payment gateway] 
		$res = $checkout->saveOrder();
	
		// fetches redirect url
		$redirectURL = $checkout->getCheckout()->getRedirectUrl(); 
            	switch($q["payment_type"]){
			case "checkmo":
				$redirectURL = Mage::getBaseUrl() . "web/thanks/"; 
				break;
		}

		// discontinues without a redirect url from payone	
		switch($redirectURL){
			case false:
			case null:
			case "":
				$this->sendError("Gateway nicht erreicht");
				exit(1);
		}
		
		// empties cart
		$res = Mage::getSingleton("checkout/cart")->truncate();
		$res = Mage::getSingleton("checkout/session")->clear();
		foreach(Mage::getSingleton("checkout/session")->getQuote()->getItemsCollection() as $item){
			Mage::getSingleton("checkout/cart")->removeItem($item->getId())->save();
		}	
	
		// redirects
		$res = Mage::app()->getResponse()->setHeader("Location", $redirectURL)->sendHeaders();
	}

	protected function sendError($message)
	{
		$this->sendErrorJSON($message);
	}

	protected function sendErrorJSON($message)
	{
		print json_encode(array("code"=>609, "message"=>$message));
	}

	protected function sendErrorMessage($message)
	{
		print $message;
	}
}










?>
