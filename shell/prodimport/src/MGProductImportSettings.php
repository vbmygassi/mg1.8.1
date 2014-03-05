<?php

class MGImportSettings
{
	const JSON = 0; 
	const XML = 1;
	const DOCTYPE = MGImportSettings::JSON;
	const PRODUCTLIST = "http://10.14.10.37/karlie/index.php?forward=webservice/mygassi/view.php";
	// const PRODUCTLIST = "http://10.14.10.37/karlie/index.php?forward=webservice/mygassi/view_status.php&status=3";
	// const PRODUCTLIST = "http://127.0.0.1/testexport/eximp.php";
 	// const PRODUCTLIST = "http://127.0.0.1/testexport/eximp3.php";
	// const PRODUCTLIST = "http://127.0.0.1/testexport/vladimgerdt/mygassi_article.txt";
	const SQLLITE = "./db/sqllite.db";
	const SQLLITEBCKPP = "./db/bckpp/sqllite.db";
	const CSVEXPORT = "./export/product-import.csv";
	const XMLEXPORT = "./export/product-import.xml";
	const PHPEXPORT = "./export/product-export.php";
	const REFPROD = "./data/mprod.php";
	const SQLDUMP = "./export/sqldump/";
	const MAGEDBUSER = "root";
	const MAGEDBPASS = "2317.187.fuckingsuck";
	const MAGEDBHOST = "localhost";
	// const MAGEDBNAME = "magento7";
	const MAGEDBNAME = "mg6";
	const LOGTOSCREEN = true;
	const LOGTOFILE = true;
	const LOGFILE = "./log/import.log";
	const TIMEZONE = "Europe/Berlin";
	// import item types
	const PRODUCT_DEFAULT = "default";
	const PRODUCT_GROUP = "grouped";
	const CATEGORY = "category";
	// 
	const CATPREFIX = "999";
	// 1 is magic
	// 3 is Mage::app()->getStore()->getRootCategoryId();
	const ROOTCATS = "1/2/";
	//
	const RSYNC = "http://10.14.10.37/karlie/index.php?forward=webservice/mygassi/image_export.php";
	// const RSYNC = "http://127.0.0.1/testexport/image_export.php?nix=nix";
	// const IMAGEDOWNLOAD = "http://10.14.10.20/mygassipic/";
	// const IMAGEDOWNLOAD = "http://10.14.10.20/mygassipic_new/";
	const IMAGEDOWNLOAD = "http://10.14.10.37/karlie/webservice/mygassi/mygassipic/";
	// const IMAGEDOWNLOAD = "http://127.0.0.1/testexport/images/";
	// const PRODUCTLIST 
	const PRODUCTLISTCOPY = "./prodlist/prodlist.json";
	const PRODUCTLISTBCKPP = "./prodlist/bckpp/";
	const IMPRTTIMSTMPPTH = "./prodlist/import_timestamp";
	const FANTOMAS = "/Users/vico/Workspace/MyGassiShop1.8.1/magento/shell/ProdImport/data/images/fantomas.png";
	const MAGEROOT = "/Users/vico/Workspace/MyGassiShop1.8.1/magento/app/Mage.php";
}
