<?php 

/**
 *@For Login Form
 *@Author KoHein
 */

if(ValidateController::exists()) {
	if(TokenClass::chk(ValidateController::get('token'))); {
		$ValidateControllers = new ValidateController();
		$validation  = $ValidateControllers->check($_POST, array(
			'username' => array ('required' => true),
			'password' => array ('required' => true)
			));
		if($validation->passed()) {
			$user = new UserClass();
			$remember = (ValidateController::get('remember') === 'on') ? true : false;
			$login = $user->login(ValidateController::get('username'), ValidateController::get('password'), $remember);
			if($login) {
				RedirectController::to('profile');
			} else {
				echo '<p>Sorry, Logging in failed.</p>';
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

    
	<!-- studentsprofile Demo  Stylesheets -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/studentsprofile.css">
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" id="colors" href="css/colors/red.css">
	
	
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
	
	<div class="studentsprofile-container small">
		<form action="" method="post" class="studentsprofile">
			<header>
				<i class="icon-user"></i>
				Login Form 
			</header>
			<fieldset>
			
				<section class="form-field first clearfix">
					<label class="label one-quarter" for="username">Username</label>
					<div class="three-quarter inside-icon left-side">
						<span class="icon"><i class="icon-user"></i></span>
						<input type="text" name="username" id="username" class="full-input" required placeholder="your username">
					</div>
				</section>
	
				<section class="form-field clearfix">
					<label class="label one-quarter" for="password">Password</label>
					<div class="three-quarter">
						<div class="inside-icon left-side">
                        <span class="icon"><i class="icon-unlock"></i></span>
						<input type="password" name="password" id="password" class="full-input small" required placeholder="your password">
						</div>
						
						<span class="note"><a href="home">Back To Home</a></span>
					</div>
				</section>
				<section class="form-field last clearfix">
					<div class="one-quarter"></div>
					<div class="three-quarter checkbox">
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">
						<i></i>
						Remember Me
						</label>
					</div>
				</section>
				
				
			</fieldset>
			<footer>
				<input type="hidden" name="token" value="<?php echo TokenClass::generate(); ?>">
				<a href="http://localhost/studentsprofile/public/register">
				<input type="button" class="btn" value="Register">
				</a>
				<input type="submit" class="btn" value="Login">
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