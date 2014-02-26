<?php
class Mygassi_Webshop_CheckoutController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		if(Mage::getSingleton("customer/session")->isLoggedIn()){
			// redirects to summary with a valid session
			$loc = Mage::getBaseUrl() . "web/summary/";
			Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
		}	
		else {	
			// renders checkout page
			print Mage::getSingleton("core/layout")
				->createBlock("core/template")
				->setTemplate("web/checkout.phtml")
				->toHtml();
		}
	}
	
	protected function sendErrorMessage($message)
	{
		print json_encode(array("code"=>609, "message"=>$message));	
	}
}





?>
