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
							<?php if(session()->getFlashdata('msg')) :?>
								<div class="alert alert-danger px-3"><?= session()->getFlashdata('msg'); ?></div>
							<?php endif; ?>
							<?php if(isset($validation)) :?>
								<div class="alert alert-danger px-3"><?= $validation->listErrors(); ?></div>
							<?php endif; ?>
						<form action="<?php echo base_url('login'); ?>" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<span class="form-label">Email</span>
												<input class="form-control" type="email" name="email" id="email"  placeholder="Enter your email">
											</div>
											<div class="form-group">
												<span class="form-label">Password</span>
												<input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
											</div>
								<div class="text-center">
									<p>haved an account <a href="<?= base_url('/Register'); ?>" class="text-decoration-none">Register now</a></p>
								</div>
								<hr>
								<div class="form-btn text-center">
									<button type="submit" class="submit-btn">Login</button>
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