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


define('ERROR_CODE','error');
define('SUCCESS_CODE','success');
define('INFO_CODE','info');

/* Database Connection Credentials */
if(SERVER=='localhost'){
$path = dirname(__FILE__).'/';
	if(file_exists($path.'../../pranjal'))
	{
		define('DB_SERVER','localhost');
		define('DB_USER','root');
		define('DB_PWD','regiate');
		define('DB_NAME','inscribe');
	}
	else if(file_exists($path.'../../naman'))
	{	
		define('DB_SERVER','localhost');
		define('DB_USER','root');
		define('DB_PWD','spades');
		define('DB_NAME','inscribe');
	}
	else
	{ 	//default values
		define('DB_SERVER','localhost');
		define('DB_USER','root');
		define('DB_PWD','');
		define('DB_NAME','inscribe');
	}}

?>