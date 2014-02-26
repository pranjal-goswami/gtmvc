<?
/**
 * © 2013-2015 GreekTurtle
 *
 * LICENSE:
 *
 * This file is part of GTMVC (http://www.greekturtle.com).
 *
 * The contents of this file cannot be copied, distributed or modified without prior
 * consent of the author. 
 *
 * Project : GTMVC
 * File :  
 * Description : GT MVC Framework Builder
 *
 * @author Pranjal Goswami <pranjal[at]weblength[dot]co[dot]in> 
 * 
 * BADesigns | GreekTurtle | Weblength Infonet Pvt. Ltd. 
 *
 * Created : Wed Feb 26 2014 12:44:31 GMT+0530 (India Standard Time)
 */ 
date_default_timezone_set('Asia/Calcutta');
session_start();
 
$local_path = str_replace('\\','/',dirname(dirname(__FILE__)));
$needle = 'htdocs';
if(strpos($local_path,$needle) === false){ 
	define('SERVER','web');
	$needle = 'public_html';
	$app_path = substr($local_path,(strpos($local_path,$needle)+strlen($needle)));
}
else{
	define('SERVER','localhost'); 
	$app_path = substr($local_path,(strpos($local_path,$needle)+strlen($needle)));
}
define('GTMVC_WEBAPP_ROOT',$app_path);

require_once('app.config.php');
require_once('class.Loader.php');

Loader::register();

?>