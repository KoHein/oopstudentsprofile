<?php 

/**
 *@For SessionClass
 *@Author KoHein
 */

class SessionClass {
	public static function existss($name) {
		return (isset($_SESSION[$name])) ? true : false;
	}
	public static function put($name, $value) {
		return $_SESSION[$name] = $value;
	}
	public static function gets($name) {
		return $_SESSION[$name];
	}
	public static function delete($name) {
		if(self::existss($name)) {
			unset($_SESSION[$name]);
		}
	}
	public static function flash($name, $string = '') {
		if(self::existss($name)) {
			$session = self::gets($name);
			self::delete($name);
			return $session;
		} else {
			self::put($name, $string);
		}
	}
}

?>