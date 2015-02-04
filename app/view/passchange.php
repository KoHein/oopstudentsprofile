<?php 

/**
 *@For Password Changing Process
 *@Author KoHein
 */

$user = new UserClass();
if(!$user->isLoggedIn()) {
	RedirectController::to('home');
}
if(ValidateController::exists()) {
	if(TokenClass::chk(ValidateController::get('token'))); {
		$ValidateControllers = new ValidateController();
		$validation  = $ValidateControllers->check($_POST, array(
			'password_current' => array(
				'required' => true,
				'min' 	   =>  6
				),
			'password_new' => array(
				'required' => true,
				'min'	   => 6
				),
			'password_new_again' => array(
				'required' => true,
				'min'	   => 6,
				'matches'  => 'password_new'
				)
			));
		if($validation->passed()) {
			if(HashClass::make(ValidateController::get('password_current'), $user->data()->salt) !== $user->data()->password) {
				echo 'Your current password is wrong.';
			} else {
				// echo 'Ok!';
				$salt = HashClass::salt(32);
				$user->update(array(
					'password' => HashClass::make(ValidateController::get('password_new'), $salt),
					'salt' => $salt
					));
				SessionClass::flash('profile', 'Your Password has been changed!');
				RedirectController::to('profile');
			}
		} else {
			foreach($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}

?>

<form action="" method="post">
	<div class="field">
		<label for="password_current">Current Password</label>
		<input type="password" name="password_current" id"password_current">
	</div>

	<div class="field">
		<label for="password_new">New password</label>
		<input type="password" name="password_new" id="password_new">
	</div>

	<div class="field">
		<label for="password_new_again">New password again</label>
		<input type="password" name="password_new_again" id="password_new_again">
	</div>

	<input type="submit" value="Change">
	<input type="hidden" name="token" value="<?php echo TokenClass::generate(); ?>">
</form>
