<?php
class Mygassi_Webshop_IndexController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		print Mage::getSingleton("core/layout")
			->createBlock("core/template")
			->setTemplate("web/shop.phtml")
			->toHtml();
	}
}







?>
