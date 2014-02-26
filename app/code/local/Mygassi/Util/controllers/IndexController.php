<?php
class Mygassi_Util_IndexController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		return true;
	}

	public function empty_cartAction()
	{
		$cart = Mage::getSingleton("checkout/cart")->init();
		$res = Mage::getSingleton("checkout/session")->getQuote()->removeAllItems();
		$res = $cart->save();
		$res = $this->getResponse()->setHeader("Location", Mage::getBaseUrl())->sendHeaders();
		return true;
	}
	
	public function get_cart_item_count_jsonAction()
	{
		$val = Mage::helper("checkout/cart")->getSummaryCount();
		$res = array(
			result_code=>"491",
			cart_item_count=>$val 
		);
		print json_encode($res);
		return true;
	}
	
}

?>
