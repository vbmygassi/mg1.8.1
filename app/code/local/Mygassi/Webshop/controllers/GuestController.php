<?php
class Mygassi_Webshop_GuestController extends Mage_Checkout_Controller_Action
{
	public function indexAction()
	{
		print Mage::getSingleton("core/layout")
			->createBlock("core/template")
			->setTemplate("web/guest.phtml")
			->toHtml();
	}
	
	public function regAction()
	{

		// fetches post variables
		$post = $this->getRequest()->getPost();

		// redirects without post values
		if(
			!isset($post["user_firstname"]) ||
			!isset($post["user_lastname"]) ||
			!isset($post["user_email"]) ||
			!isset($post["user_telephone"]) ||
			!isset($post["user_mobile"]) ||
			!isset($post["user_street"]) ||
			!isset($post["user_str_nr"]) ||
			!isset($post["user_city"]) ||
			!isset($post["user_zip"]) ||
			!isset($post["user_country"])
		){
			$this->sendError("Bitte überprüfen Sie Ihre Eingabe");
			exit(1);
		}

		// validates firstname
		if(4 > strlen($post["user_firstname"])){
			$this->sendError("Der Vorname ist nicht gültig.");
			exit(1);
		}
			
		// validates lastname
		if(4 > strlen($post["user_lastname"])){
			$this->sendError("Der Nachname ist nicht gültig.");
			exit(1);
		}

		// validates email
		if(!filter_var($post["user_email"], FILTER_VALIDATE_EMAIL)){
			$this->sendError("Die Email ist nicht gültig.");
			exit(1);
		}

		// validates telephone
		if(4 > strlen($post["user_telephone"])){
			$this->sendError("Die Telephonenummer ist nicht gültig.");
			exit(1);
		}
		
		// validates mobile 
		if(4 > strlen($post["user_mobile"])){
			$this->sendError("Die Mobilenummer ist nicht gültig.");
			exit(1);
		}

		// validates street add 
		if(1 > strlen($post["user_str_nr"])){
			$this->sendError("Die Hausnummer ist nicht gültig.");
			exit(1);
		}

		// validates street  
		if(1 > strlen($post["user_street"])){
			$this->sendError("Die Strasse ist nicht gültig.");
			exit(1);
		}

		// validates zip  
		if(3 > strlen($post["user_zip"])){
			$this->sendError("Die Postzleitzahl ist nicht gültig.");
			exit(1);
		}

		// validates country  
		if(2 > strlen($post["user_country"])){
			$this->sendError("Die Landeskennung ist nicht gültig.");
			exit(1);
		}

		// fetches [if] existing customer
		$customer = Mage::getModel("customer/customer")
			->setWebsiteId(Mage::app()->getWebsite()->getId())
			->loadByEmail($post["user_email"]);

		// existing user cannot register
		if(null != $customer->getId()){
			$this->sendError("Diese Kunden-Mailadresse existiert bereits.");
			exit(1);
		}	
	
		// fetches a new customer
		$customer = Mage::getModel("customer/customer");

		// sets up customer
		$customer->setWebsiteId(Mage::app()->getWebsite()->getId());
		$customer->setStore(Mage::app()->getStore());
		$customer->setFirstname($post["user_firstname"]);
		$customer->setLastname($post["user_lastname"]);
		$customer->setEmail($post["user_email"]);
		$pass = $customer->generatePassword(32); 
		$customer->setPasswordHash($pass);
		$customer->setConfirmation(null); // ?? confirmation email		

		try {
			$customer->save();
		}
		catch(Exception $e){
			$this->sendError($e->getMessage());
			exit(1);
		}
		
		$address = Mage::getModel("customer/address");
		$address->setCustomerId($customer->getId());
		$address->setFirstname($customer->getFirstname());
		$address->setLastname($customer->getLastname());
		$address->setCountryId("DE");
		$address->setStreet(array($post["user_street"], $post["user_str_nr"]));
		$address->setCity($post["user_city"]);
		$address->setTelephone($post["user_telephone"]);
		$address->setMobile($post["user_mobile"]);
		$address->setIsDefaultBilling("1");
		$address->setIsDefaultShipping("1");
		$address->setSaveInAddressBook("1");
		$address->setRegionId($post["user_region_id"]);
		$address->setRegion($post["user_region"]);
		$address->save();

		// todo:
		// do not do this but send an email
		try{
			Mage::getSingleton("customer/session")->loginById($customer->getId());
		}
		catch(Exception $e){
			$this->sendError($e->getMessage());
			exit(1);
		}	
		
		// todo: 
		// wait for confirmation email
		// redirects to summary 
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
		$loc = Mage::getBaseUrl() . "web/guest/";
		Mage::app()->getResponse()->setHeader("Location", $loc)->sendHeaders();
	}	
	
	protected function sendErrorJSON($message)
	{
		print json_encode(array("code"=>609, "message"=>$message));	
	}
}













?>
