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
class Session{
	
	public static function isLoggedIn()
	{
		/*return true iff session is active*/
		if(isset($_SESSION[S_STATUS]) && $_SESSION[S_STATUS]==S_STATUS_ACTIVE) return true;
		else return false;
	}
	
	public static function isAdmin()
	{
		/*return true iff session owner is admin */
		if(isset($_SESSION[S_ADMIN])) return true;
		else return false;
	}
	
	public static function getLoggedInUser()
	{
		if(!self::isLoggedIn()) return null;
		return SessionCache::get(S_OWNER);
	}
	
}
?>