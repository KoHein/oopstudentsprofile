<?php 

/**
 *@For TokenClass
 *@Author KoHein
 */

class TokenClass {
	public static function generate() {
		return SessionClass::put(Config::database('token_name'), md5(uniqid()));
	} 
	public static function chk($token) {
		$tokenName = Config::database('token_name');
		if (SessionClass::existss($tokenName) && $token === SessionClass::gets($tokenName)) {
			SessionClass::delete($tokenName);
			return true;
		}
		return false;
	}
}

?>
