<?php 

/**
 *For Routing
 *@Param param
 *@Response array
 *@Author KoHein
 */

return array (
	'home'         => 'HomeController@view',
    'register'     => 'ValidateController@view',
	'login'        => 'LoginController@view',   
    'logout'       => 'LogoutController@view',
    'profile'      => 'ProfileController@view',
    'edit'         => 'EditController@view',
    'passchange'   => 'PasschangeController@view',
    'detail'       => 'DetailController@view',
    '404'          => 'RedirectController@view',
	);

 ?>