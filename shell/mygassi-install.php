<?php 
/**
 * setup of tracking flags
 */
require_once("mygassi-config.php");
require_once("mygassi-logger.php");
require_once(mageroot); 
Mage::app();

logger("Starting: mygassi-install");

// $setup = new Mage_Eav_Model_Entity_Setup('core_setup');
// $setup->updateAttribute('customer_address','telephone','is_required', 0);

function addOrderState($args)
{
	$installer = new Mage_Core_Model_Resource_Setup();
	$installer->startSetup();
	logger($installer->getTable('sales/order_status'));
	foreach($args as $arg)
	{
		$sql = "INSERT INTO  `{$installer->getTable('sales/order_status')}` (
			`status` ,
			`label`
		) VALUES (
			'".$arg["status"]."',  '".$arg["label"]."'
		);
		INSERT INTO  `{$installer->getTable('sales/order_status_state')}` (
			`status` ,
			`state` ,
			`is_default`
		) VALUES (
			'".$arg["status"]."',  '".$arg["state"]."',  '0'
		);";
		logger($sql);
		try{ 
			$installer->run($sql); 
		}
		catch(PDOException $e){
			print $e->getMessage();
		} 
		catch(Extension $e){ 
			logger($e->getMessage()); 
		}
	}
	$installer->endSetup();
}

addOrderState(
	$args = array(
		array(
			status => "retoure",
			label  => "Lieferung wird zurückgesandt",
			state  => "processing"
		),
		array(
			status => "wait-for-payone",
			label  => "Payone arbeitet",
			state  => "processing"
		),
		array(
			status => "sent",
			label  => "Versandt von Karlie",
			state  => "processing"
		),
		array(
			status => "referred_to_karlie",
			label  => "An Karlie gesandt",
			state  => "processing"
		),
		array(
			status => "appointed",
			label  => "Auftrag angenommen",
			state  => "processing"
		),
		array(
			status => "captured",
			label  => "Eingezogen",
			state  => "processing"
		),
		array(
			status => "payed",
			label  => "Bezahlt",
			state  => "processing"
		),
		array(
			status => "underpayed",
			label  => "Nicht vollständig gezahlt",
			state  => "processing"
		),
		array(
			status => "refund",
			label  => "Rückerstattet",
			state  => "processing"
		),
		array(
			status => "debt",
			label  => "Eingefordert",
			state  => "processing"
		),
		array(
			status => "reminded",
			label  => "Gemahn",
			state  => "processing"
		),
		array(
			status => "vauthorized",
			label  => "Gebucht",
			state  => "processing"
		),
		array(
			status => "vsettled",
			label  => "Abgerechnet",
			state  => "processing"
		),
		array(
			status => "transferd",
			label  => "Umgebucht",
			state  => "processing"
		),
		array(
			status => "invoiced",
			label  => "Rechnung erstellt",
			state  => "processing"
		) 
	)
);
exit(1);


$setup->addAttribute('customer', 'invoice_coupon', array(
	'input'         => 'text',
	'type'          => 'text',
	'label'         => 'Coupon',
	'visible'       => 1,
	'required'      => 0,
	'user_defined'  => 0
));

$setup->addAttribute('customer', 'newsletter_coupon', array(
	'input'         => 'text',
	'type'          => 'text',
	'label'         => 'Coupon',
	'visible'       => 1,
	'required'      => 0,
	'user_defined'  => 0
));

/**
 * adds parcel-id attribute to sale
 */
$res = $setup->addAttribute('order', 'parcel_id', 
	array(
	'label'                      => 'Parcel ID',
	'type'                       => 'text',
	'input'                      => 'text',
	'frontend'                   => '',
	'source'                     => '',
	'visible'                    => true,
	'required'                   => false,
	'user_defined'               => true,
	'is_user_defined'            => true,
	'searchable'                 => true,
	'filterable'                 => true,
	'comparable'                 => false,
	'visible_on_front'           => true,
	'visible_in_advanced_search' => false,
	'unique'                     => false 
	)
);

$res = $setup->addAttribute('catalog_product', 'is_top_product', array(
	'group'                      => 'MyGassi',
	'label'                      => 'Top Produkt',
	'type'                       => 'int',
	'input'                      => 'select',
	'frontend'                   => '',
	'source'                     => 'eav/entity_attribute_source_boolean',
	'visible'                    => true,
	'required'                   => false,
	'user_defined'               => true,
	'is_user_defined'            => true,
	'searchable'                 => true,
	'filterable'                 => true,
	'comparable'                 => false,
	'visible_on_front'           => false,
	'visible_in_advanced_search' => false,
	'default'			=> '0',
	'unique'                     => false 
));

$res = $setup->addAttribute('catalog_product', 'is_stream_product', array(
	'group'                      => 'MyGassi',
	'label'                      => 'Produkt im Stream',
	'type'                       => 'int',
	'input'                      => 'select',
	'frontend'                   => '',
	'source'                     => 'eav/entity_attribute_source_boolean',
	'visible'                    => true,
	'required'                   => false,
	'user_defined'               => true,
	'is_user_defined'            => true,
	'searchable'                 => true,
	'filterable'                 => true,
	'comparable'                 => false,
	'visible_on_front'           => false,
	'visible_in_advanced_search' => false,
	'default'			=> '0',
	'unique'                     => false 
));

$res = $setup->addAttribute('catalog_product', 'appears_on_the_internez', array(
	'group'                      => 'MyGassi',
	'label'                      => 'Im Onlineshop sichtbar',
	'type'                       => 'int',
	'input'                      => 'select',
	'frontend'                   => '',
	'source'                     => 'eav/entity_attribute_source_boolean',
	'visible'                    => true,
	'required'                   => false,
	'user_defined'               => true,
	'is_user_defined'            => true,
	'searchable'                 => true,
	'filterable'                 => true,
	'comparable'                 => false,
	'visible_on_front'           => false,
	'visible_in_advanced_search' => false,
	'default'			=> '0',
	'unique'                     => false 
));

$res = $setup->addAttribute('catalog_product', 'old_price', array(
	'group'                      => 'MyGassi',
	'label'                      => 'Streichpreis',
	'type'                       => 'text',
	'input'                      => 'text',
	'frontend'                   => '',
	'visible'                    => true,
	'required'                   => false,
	'user_defined'               => true,
	'is_user_defined'            => true,
	'searchable'                 => true,
	'filterable'                 => true,
	'comparable'                 => false,
	'visible_on_front'           => false,
	'visible_in_advanced_search' => false,
	'default'			=> '0',
	'unique'                     => false 
));

$setup->updateAttribute('catalog_product','short_description','is_required', 0);
$setup->updateAttribute('catalog_product','description','is_required', 0);

$setup->endSetup();	
logger("Done: mygassi-install");
exit(1);
