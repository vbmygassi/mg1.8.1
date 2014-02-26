<?php
class Mygassi_Webshop_ProdController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		print Mage::getSingleton("core/layout")
			->createBlock("core/template")
			->setTemplate("web/prod.phtml")
			->toHtml();
	}
}





?>
