<!DOCTYPE html>
<html lang="en">
<head>
	<title>Students Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://localhost/StudentsProfile/public/css/bootstrap.min.css">

	<!-- Optional theme -->	
	<link rel="stylesheet" href="http://localhost/StudentsProfile/public/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="http://localhost/StudentsProfile/public/js/bootstrap.min.js"></script>
</head>
<body style="background:#27872E">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center" style="color:#FFF">Students Profile</h2>
				<hr style="height:5px;background:gray">
			</div>
		</div>
		<div class="row">
			<?php 
			// get user table
			$user = DB::getInstance()->get('register', array(1, '=', 1));
			foreach($user->results() as $user) :  ?>
			<div class="col-sm-6 col-md-3">
				<a href="detail/<?php echo $user->id;?>" title="<?php echo $user->username;?>">


					<div class="thumbnail" style="background-color:#CFCFCF">
						<div style="height:250px;overflow:hidden">
							<img style="height:250px; width:250px" src="<?php echo $user->photo;?>" alt="<?php echo $user->username;?>">
						</div>
						<div class="caption">
							<h3 class="text-center"><?php echo $user->username;?></h3>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
</body>
</html>