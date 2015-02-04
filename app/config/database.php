<?php 
/**
 *For Database Configuration
 *@Param param
 *@Response array
 *@Author KoHein
 */
return array(
	'engine'		=> 'mysql',
	'dbname'		=> 'studb',
	'hostname'		=> 'localhost',
	'username'		=> 'root',
	'password'		=> '12345',
	'token_name'	=> 'token',
	'session_name'	=> 'register',
	'cookie_name'	=> 'hash',
	'cookie_expiry'	=> 604800,
	'connection'	=> array(
    	PDO::ATTR_PERSISTENT => true
		),
	);
 
 ?>