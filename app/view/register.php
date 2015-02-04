<?php 

/**
 *@For Register Form
 *@Author KoHein
 */

if(ValidateController::exists()) {
if(TokenClass::chk(ValidateController::get('token'))); {
	echo "i have been run <br><br>"; 	
	$ValidateControllers = new ValidateController();
		$validation  = $ValidateControllers->check($_POST, array(
			'username' => array(
					'required' => true,
					'min' => 2,
					'max' => 25,
					'unique' => 'register'),
			'password' => array(
					'required' => true,
					'min' => 6),
			'password_again' => array(
					'required' => true,
					'matches' => 'password'),
			'name' => array(
					'required' => true,
					'min' =>2,
					'max' => 50),
			'email' => array(
					'required' => true,
					'min' =>7,
					'max' => 50),
			'phone' => array(
					'required' => true,
					'min' =>5,
					'max' => 20),
			'address' => array(
					'required' => true,
					'min' =>3,
					'max' => 200),
			'fromadd' => array(
					'required' => true,
					'min' =>3,
					'max' => 200),
			'work' => array(
					'required' => true,
					'min' =>5,
					'max' => 70),
			'company' => array(
					'required' => true,
					'min' =>2,
					'max' => 100)
		));
		if($validation->passed()) {
			$user = new UserClass();
			$salt = HashClass::salt(32);

			$picture = $_FILES['photo']['name'];
            $extension = strtolower(end(explode('.', $picture)));
            $temp = $_FILES['photo']['tmp_name'];
            $path = 'img/upload/' . substr(md5(time()), 0, 10) . '.' . $extension;
            $user->picture($temp, $extension, array (
                'photo' => $path));   
			try {
				$user->create(array(
					'photo' => $path,
					'username' => ValidateController::get('username'),
					'password' => HashClass::make(ValidateController::get('password'), $salt),
					'salt' => $salt,
					'name' => ValidateController::get('name'),
					'email' => ValidateController::get('email'),
					'phone' => ValidateController::get('phone'),
					'address' => ValidateController::get('address'),
					'fromadd' => ValidateController::get('fromadd'),
					'work' => ValidateController::get('work'),
					'company' => ValidateController::get('company'),
					'joined' => date('Y-m-d H:i:s'),
					'group' => 1
					));
				SessionClass::flash('home', 'You Have Been Register!!');
				RedirectController::to('home');
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

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    
    <meta charset="UTF-8">
    <title>Students Profile</title>
    <meta name="description" content="Students Profile Forms Responsive">
	<meta name="author" content="Ko Hein">
	
	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- IE  Compatibility -->
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	
    <!-- Google Fonts -->
	<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700|Open+Sans:300,400,700' rel='stylesheet'>

    
	<!-- studentsprofile Flat Forms Demo  Stylesheets -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/studentsprofile.css">
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" id="colors" href="css/colors/green.css">
	
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
	
	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="">
	<link rel="apple-touch-icon" href="">
	<link rel="apple-touch-icon" sizes="72x72" href="">
	<link rel="apple-touch-icon" sizes="114x114" href="">

</head>
<body>
<!-- For demo change colors -->
	<div class="colors-container">
		<ul class="colors">
			<li data-color="yellow.css"></li>
			<li data-color="red.css"></li>
			<li data-color="purple.css"></li>
			<li data-color="orange.css"></li>
			<li data-color="grey.css"></li>
			<li data-color="green.css"></li>
			<li data-color="darkgrey.css"></li>
			<li data-color="darkblue.css"></li>
			<li data-color="blue.css"></li>
			<li data-color="black.css"></li>
		</ul>
	</div>
<!-- End colors panel -->	
	<div class="studentsprofile-container">
	<form action = "" method="post" enctype="multipart/form-data" class="studentsprofile">
			<header>
				<i class="icon-mail-forward"></i>
				Register Form
			</header>
			<fieldset>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="photo">Upload Photo</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-picture"></i></span>
						<input type="file" name="photo" value="" id="photo" class="full-input" required placeholder="Choose Your Photo">
					</div>
				</section>
			
				<section class="form-field first clearfix">
					<label class="label one-quarter" for="username">Username</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-user"></i></span>
						<input type="text" name="username"  <?php echo ValidateController::get('username'); ?>" id="username" class="full-input" required placeholder="Type your username">
					</div>
				</section>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="password">Password</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-key"></i></span>
						<input type="password" name="password" id="password" class="full-input" required placeholder="Type your password">
					</div>
				</section>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="password_again">Password Again</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-lock"></i></span>
						<input type="password" name="password_again" id="password_again" class="full-input" required placeholder="Type your password again">
					</div>
				</section>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="name">Nickname</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-heart"></i></span>
						<input type="text" name="name" value="<?php echo ValidateController::get('name'); ?>" id="name" class="full-input" required placeholder="Type your Nickname => Eg. Ko Hein :D">
					</div>
				</section>
	
				<section class="form-field clearfix">
					<label class="label one-quarter" for="email">E-mail</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-envelope"></i></span>
						<input type="email" name="email" value="<?php echo ValidateController::get('email'); ?>" id="email" class="full-input" required placeholder="Type your email">
						<span class="note color-change hidden-note">Please type a valid email for feedback.</span>
					</div>
				</section>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="phone">Phone</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-phone"></i></span>
						<input type="text" name="phone" value="<?php echo ValidateController::get('phone'); ?>" id="phone" class="full-input" required placeholder="Type your mobile phone number">
					</div>
				</section>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="address">Current Address</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-rocket"></i></span>
						<input type="text" name="address" value="<?php echo ValidateController::get('address'); ?>" id="address" class="full-input" required placeholder="Type your current address">
					</div>
				</section>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="fromadd">Home Town</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-home"></i></span>
						<input type="text" name="fromadd" value="<?php echo ValidateController::get('fromadd'); ?>" id="fromadd" class="full-input" required placeholder="Type your hometown => eg. Mandalay">
					</div>
				</section>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="work">Your Skill</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-thumbs-up"></i></span>
						<input type="text" name="work" value="<?php echo ValidateController::get('work'); ?>" id="work" class="full-input" required placeholder="Type your position">
					</div>
				</section>

				<section class="form-field first clearfix">
					<label class="label one-quarter" for="company">Company</label>
					<div class="three-quarter inside-icon right-side">
					<span class="icon"><i class="icon-circle-arrow-right"></i></span>
						<input type="text" name="company" value="<?php echo ValidateController::get('company'); ?>" id="company" class="full-input" required placeholder="Type your current company name => eg. MyanmarLinks">
					</div>
				</section>
				
			</fieldset>
			<footer>
				<input type="reset" class="btn" value="Clear">
				<input type = "hidden" name="token" value="<?php echo TokenClass::generate(); ?>">
				<input type="submit" class="btn" value="Register">
			</footer>
		</form>
	</div>
	
	<!-- END -->
	<script>
	/* 
		This code is just for the demo purpose. 
	*/
		(function() {
			var colors = document.querySelectorAll('.colors li'),
				i = 0,
				color;
				
				function createStyle( style ) {
					var cl =document.getElementById('colors');
						document.head.removeChild(cl);
					var link = document.createElement('link');
					link.rel = 'stylesheet';
					link.id = 'colors';
					link.setAttribute('href','css/colors/'+style)
					document.head.appendChild(link);
				}
				
				for(; i< colors.length; i++ ) {
					if( !window.attachEvent ) {
					
						colors[i].addEventListener('click', function() {
							color = this.getAttribute('data-color');	
							createStyle(color);
						}, false);
						
					} else {
						
						colors[i].attachEvent('onclick', function() {
							color = this.getAttribute('data-color');
							createStyle(color);
						});
						
					}
				}

		})();
	</script>
</body>
</html>