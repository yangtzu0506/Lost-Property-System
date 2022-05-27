<!doctype html>
<?php session_start();?>
<html lang="en">
  <head>
  	<title>登入</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<a href="../index.php"><h2 class="heading-section"><strong>失物招領系統</strong></h2></a>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">登入</h3>

		      	<form class="signin-form" action="logincheck.php" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="account" placeholder="帳號" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="password" placeholder="密碼" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">登入</button>
	            </div>
				</form>
	            <div class="form-group d-md-flex">
								<div class="w-50 text-md-left">
								<button type="submit" class="form-control btn btn-primary px-3" style="font-color:black;width:160px"><a href="register.php" style="color:black">註冊</a></button>
								</div>
								<div class="w-50 text-md-right">
								<button type="submit" class="form-control btn btn-primary px-3" style="font-color:black;width:160px"><a href="#" style="color:black">忘記帳號</a></button>
								</div>
	            </div>
	         
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

