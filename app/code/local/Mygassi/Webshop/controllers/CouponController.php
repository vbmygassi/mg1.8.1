<?php
class Mygassi_Webshop_CouponController extends Mage_Checkout_Controller_Action
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

		// redirects to shop with an empty cart
		$cart = Mage::getSingleton("checkout/cart");
		$cart->init();
		if(1 > $cart->getItemsCount()){
			$loc = Mage::getBaseUrl() . "web/";
			Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
			exit(1);
		}
		
		// evaluates post values
		$post = $this->getRequest()->getPost();

		// evaluates coupon code		
		$code = $post["user_coupon_code"];

		$q = Mage::getSingleton("checkout/cart")->getQuote();
		$s = Mage::getSingleton("customer/session");

		// applies coupon code...
		try {
			$q->getShippingAddress()->setCollectShippingRates(true);
			$q->setCouponCode(strlen($code) ? $code : '')
				->collectTotals()
				->save();
		}
		catch (Mage_Core_Exception $e) {
			$s->setCouponErrorMessage($e->getMessage());
		}
		catch (Exception $e) {
			$s->setCouponErrorMessage($e->getMessage());
		}

		// writes result messages
		if (strlen($code)) {
			if ($code == $q->getCouponCode()) {
				$s->setCouponSuccessMessage("Ihr Rabattgutschein ist eingelöst");
			}
			else {
				$s->setCouponErrorMessage("Ihr Rabattguschein konnte nicht eingelöst werden.");
			}
		} 

		// redirects to summary
		$loc = Mage::getBaseUrl() . "web/summary/";
		Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
	}
}





?>
