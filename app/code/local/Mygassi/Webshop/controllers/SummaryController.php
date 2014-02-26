<?php
class Mygassi_Webshop_SummaryController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		// redirects to shop with an empty cart
		$cart = Mage::getSingleton("checkout/cart");
		$cart->init();
		if(1 > $cart->getItemsCount()){
			$loc = Mage::getBaseUrl() . "web/";
			Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
			exit(1);
		}

		// redirects without a session
		$customerSession = Mage::getSingleton("customer/session")->isLoggedIn();
		if(!$customerSession){
			$loc = Mage::getBaseUrl() . "web/";
			Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
			exit(1);
		}

		$total = Mage::getSingleton("checkout/cart")
			->getQuote()
			->getGrandTotal();

		// sets shipping rate
		$shippingRate = "flatrate_flatrate";
		if(19.00 <= $total){
			$shippingRate = "freeshipping_freeshipping";
		}

		Mage::helper("checkout/cart")
			->getCart()
			->getQuote()
			->getShippingAddress()
			->setShippingMethod($shippingRate)
			->save();

		 Mage::getSingleton("checkout/cart")
			->getQuote()
			->collectTotals()
			->save();
		
		// renders template 	
		print Mage::getSingleton("core/layout")
			->createBlock("core/template")
			->setTemplate("web/summary.phtml")
			->toHtml();
	}
}





?>
