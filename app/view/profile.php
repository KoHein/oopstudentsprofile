<?php

/**
 *@For Private Profile Edit Processing
 *@Author KoHein
 */

if(CookieClass::exists(Config::database('cookie_name')) && !SessionClass::existss(Config::database('session_name'))) {
	$hash = CookieClass::get(Config::database('cookie_name'));
	$hashCheck = DB::getInstance() ->get('session', array('hash', '=', $hash));
if($hashCheck->count()) {
	$user = new UserClass($hashCheck->first()->user_id);
	$user->login();
	}
}
if(SessionClass::existss('profile'))
{
	echo '<p>' . SessionClass::flash('profile') . '</p>';
}
	$user = new UserClass(); //current
if($user->isLoggedIn())	{

?>
	
	<p>Hello <a href="detail/<?php echo ($user->data()->id); ?>"><?php echo ($user->data()->username); ?></a>!</p>

	<ul>
		<li><a href="logout">Log out</a></li>
		<li><a href="edit">Edit</a></li>
		<li><a href="passchange">Change Password</a></li>
	</ul>

<?php

/**
 *@For Checking Permission
 *@Author KoHein
 */

if($user->hasPermission('admin')) {
		echo '<p>You are an administartor!</p>';}
	} else {
		RedirectController::to('home');
}

?>