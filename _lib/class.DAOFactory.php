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
class DAOFactory {
	
	/*
	 * Create a DAO Instance and return it
	 */
	public static function getDAO($dao_key, $attr = null)
	{
		$classname = $dao_key.'MySQLDAO';

		if(!class_exists($classname)){
			try{
				require_once('dao/class.'.$classname.'.php');
			}
			catch(Exception $e){
				throw new Exception("No Class for ".$dao_key." was found."); 
			}
		} else {
			$dao = new $classname($attr);
			return $dao;
			
		}
	}

}

?>