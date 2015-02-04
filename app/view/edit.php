<?php 

/**
 *@For Checking Login And Updating Private Profile Data
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
			'name'			=> array(
				'required'	=> true,
				'min'		=> 2,
				'max'		=> 50),
			'address'		=> array(
				'required'	=> true,
				'min'		=> 3,
				'max'		=> 70),
			'company'		=> array(
				'required'	=> true,
				'min'		=> 2,
				'max'		=> 70),
			'work'			=> array(
				'required'	=> true,
				'min'		=> 5,
				'max'		=> 70)
			));
		if($validation->passed()) {

			$picture = $_FILES['photo']['name'];
			$extension = strtolower(end(explode('.', $picture)));
			$temp = $_FILES['photo']['tmp_name'];
			$path = 'img/upload/' . substr(md5(time()), 0, 10) . '.' . $extension;
			$user->picture($temp, $extension, array ('photo' => $path));
			try {
				$user->update(array(
					'photo'		=> $path,
					'name'		=> ValidateController::get('name'),
					'address'	=> ValidateController::get('address'),
					'company'	=> ValidateController::get('company'),
					'work'		=> ValidateController::get('work')
					));
				SessionClass::flash('profile', 'Your details have been updated.');
				RedirectController::to('profile');
			} catch(Exception $e) {
				die($e->getMessage());
			}
		} else {
			foreach($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}

?>

 <form action="" method="post" enctype="multipart/form-data" >
 	<div class ="field">

		<label for="photo">Upload Photo</label>
		<input type="file" name="photo" value="" id="photo" class="full-input" required placeholder="Choose Your Photo"> <br> <br>

 		<label for="name">Nickname</label>
 		<input type="text" name="name" value="<?php echo ($user->data()->name); ?>"> <br> <br>

 		<label for="name">Address</label>
 		<input type="text" name="address" value="<?php echo ($user->data()->address); ?>"> <br> <br>

 		<label for="name">Company</label> 
 		<input type="text" name="company" value="<?php echo ($user->data()->company); ?>"> <br> <br>

 		<label for="name">Work</label>
 		<input type="text" name="work" value="<?php echo ($user->data()->work); ?>"> <br> <br>

 		<input type="submit" value="Update">
 		<input type="hidden" name ="token" value="<?php echo TokenClass::generate(); ?>"> <br> <br>
 	</div>
 </form>