<?php
class Mygassi_Webshop_CartController extends Mage_Checkout_Controller_Action
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
		
		print Mage::getSingleton("core/layout")
			->createBlock("core/template")
			->setTemplate("web/cart.phtml")
			->toHtml();
	}
	
	public function add_to_cartAction()
	{
		// fetches sku 
		$p = Mage::app()->getRequest()->getParams();
	
		// exists without sku	
		if(!array_key_exists("sku", $p)){
			$this->sendErrorMessage("Keine SKU übermittelt.");
			exit(1);
		}

		// exists without qty
		if(!array_key_exists("qty", $p)){
			$this->sendErrorMessage("Keine Menge übermittelt.");
			exit(1);
		}

		// fetches sku and qty
		$sku = $p["sku"];
		$qty = $p["qty"];

		// adds product to cart
		$this->addToCart($sku, $qty);
	
		// redirects to cart
		$loc = Mage::getBaseUrl() . "web/cart/";
		Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
	}

	public function add_to_cart_jsonAction()
	{
		// fetches JSON 
		// evaluates SKU und qty
		// renders result
		print json_encode(array("code"=>100, "message"=>"add_to_cart_json is not implemented"));	
	}

	protected function addToCart($sku, $qty)
	{
		if(null == $sku){
			$this->sendErrorMessage("Keine SKU.");
			exit(1);
		}

		if(null == $qty){
			$this->sendErrorMessage("Keine Menge.");
			exit(1);
		}
		
		// fetches product by sku
		$prod = Mage::getModel("catalog/product")
			->loadByAttribute("sku", $sku);

		if(null == $prod){
			$this->sendErrorMessage("Das Produkt existiert nicht.");
			exit(1);
		}
	
		// loads product	
		$prod = $prod->load();
			
		// fetches cart
		$cart = Mage::getSingleton("checkout/cart");
		$cart->init();

		// adds product
		$cart->addProduct($prod, array("product"=>$sku, "qty"=>$qty));
		$cart->save();

		return true;
	}

	protected function sendErrorMessage($message)
	{
		print json_encode(array("code"=>609, "message"=>$message));	
	}
}





?>
