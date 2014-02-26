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
class SessionCache {
   
    public static function put($key, $value) {
		/* Set value for Session variable */
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
		/* Get Value of Session Variable*/
        if (self::isKeySet($key)) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    public static function isKeySet($key) {
        /* Return true if key is set*/
        return isset($_SESSION[$key]);
    }
    public static function unsetKey($key) {
		/* Unset a Session variable*/
		if(isset($_SESSION[$key])) unset($_SESSION[$key]);
    }
}
?>