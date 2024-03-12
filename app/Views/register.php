<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
								ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
								Perspiciatis.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<?php if(isset($validation)) :?>
								<div class="alert alert-danger px-3"><?= $validation->listErrors(); ?></div>
							<?php endif; ?>
						<form action="<?php echo base_url('register'); ?>" method="post" enctype="multipart/form-data">
							<div class="row">
									<div class="col">
										<div class="form-group">
											<span class="form-label">Username</span>
											<input class="form-control" type="text" name="username" id="username" value="<?= set_value('username'); ?>"  placeholder="Enter your username">
										</div>
										<div class="form-group">
											<span class="form-label">First Name</span>
											<input class="form-control" type="text" name="fname" id="fname" value="<?= set_value('fname'); ?>"  placeholder="Enter your firstname">
										</div>
										<div class="form-group">
											<span class="form-label">Last Name</span>
											<input class="form-control" type="text" name="lname" id="lname" value="<?= set_value('lname'); ?>"  placeholder="Enter your lastname">
										</div>
										
									</div>
										<div class="col">
											<div class="form-group">
												<span class="form-label">Email</span>
												<input class="form-control" type="email" name="email" id="email" value="<?= set_value('email'); ?>"  placeholder="Enter your email">
											</div>
											<div class="form-group">
												<span class="form-label">Password</span>
												<input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
											</div>
											<div class="form-group">
												<span class="form-label">Person Image</span>
												<input class="form-control" type="file" name="user_img" id="user_img"  placeholder="Enter your person image">
											</div>
										</div>
								</div>
								<div class="text-center">
									<p>haved an account <a href="/Login" class="text-decoration-none">login now</a></p>
								</div>
								<hr>
								<div class="form-btn text-center">
									<button type="submit" class="submit-btn">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>