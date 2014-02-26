<?php
class Mygassi_Webshop_ThanksController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		print Mage::getSingleton("core/layout")
			->createBlock("core/template")
			->setTemplate("web/thanks.phtml")
			->toHtml();
	}
}





?>
