<?php
class Mygassi_Webshop_LoginController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		// redirects to summary with a valid session
		if(Mage::getSingleton("customer/session")->isLoggedIn()){
			$loc = Mage::getBaseUrl() . "web/summary/";
			Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
			exit(1);
		}	
	
		// fetches post variables
		$post = $this->getRequest()->getPost();

		// exists without post vars
		if(
			!isset($post["user_email"]) ||
			!isset($post["user_pass"])
		){
			$this->sendError("Bitte überprüfen Sie Ihre Eingaben.");
			exit(1);
		}

		// fetches user
		$customer = Mage::getModel("customer/customer")
			->setWebsiteId(Mage::app()->getWebsite()->getId())
			->loadByEmail($post["user_email"]);

		// validates user
		if(null == $customer->getId()){	
			$this->sendError("Ungültiger Benutzername oder Passwort.");
			exit(1);
		}
		
		// auths user
		try{
			Mage::getSingleton("customer/session")->login($customer->getEmail(), $post["user_pass"]);
		}
		catch(Exception $e){
			$this->sendError($e->getMessage());
			exit(1);
		}

		// starts user session
		// diss might blow your mind [ you hate somebody -like for real? just uncomment the try ...
		/*
		try{
			Mage::getSingleton("customer/session")->setCustomerAsLoggedIn($customer);
		}
		catch(Exception $e){
			$this->sendError($e->getMessage());
			exit(1);
		}
		*/

		// redirects to summary controller 
		$loc = Mage::getBaseUrl() . "web/summary/";
		Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
	}

	protected function sendError($message)
	{
		// $this->sendErrorJSON($message);
		$this->sendErrorMessage($message);
	}
	
	protected function sendErrorMessage($message)
	{
		$post = $this->getRequest()->getPost();
		Mage::getSingleton("core/session")->setRegInput($post);
		Mage::getSingleton("core/session")->setErrorMessage($message);
		$loc = Mage::getBaseUrl() . "web/checkout/";
		Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
	}
	
	protected function sendErrorJSON($message)
	{
		print json_encode(array("code"=>609, "message"=>$message));	
	}
}










?>
