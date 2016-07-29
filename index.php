<?php

/**
* Alephclient for all RTA
*
* @package RTA
* @author EH
*
*
*/

//Mandatory defines
define('BASEPATH' , '1'); //restrict direct access to included scripts
define('APP_NAME' , 'RTA'); //restrict direct access to included scripts
define('CONFIG_FILE' , 'config.php'); 
define('LOG_TOKEN',$_SERVER['REMOTE_ADDR']);

//Init stuff like logging+ini file
require_once 'init.php';
require_once RESTLER_LOCATION;
spl_autoload_register('spl_autoload');
$r = new Restler();
$r->setSupportedFormats('JsonFormat','XmlFormat');
$r->addAPIClass('rtaservice');
$r->handle();
?>