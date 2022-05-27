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
				
		      	
				  <div class="col-md-12 col-lg-6">
					<div class="login-wrap p-0">
					<h3 class="mb-4 text-center">註冊</h3>
		      	<form class="signin-form" action="registercheck.php" method="post">
				<div class="row">
		      	<div class="form-group col-lg-6" >
		      		<input type="text" class="form-control" name="account" placeholder="帳號" required style="background-color: rgba(255,255,255,0.2);">
		      	</div>
				<div class="form-group col-lg-6">
	            	<input type="text" class="form-control" name="name" placeholder="姓名" required style="background-color: rgba(255,255,255,0.2);">
	            </div>
				</div>
				<div class="row">
	            <div class="form-group col-lg-6">
	            	<input id="password-field" type="password" class="form-control" name="password" placeholder="密碼" required style="background-color: rgba(255,255,255,0.2);">
	            	<span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password" style="margin-right:20px"></span>
				</div>
				<div class="form-group col-lg-6">
	            	<input type="text" class="form-control" name="phone" placeholder="電話" required style="background-color: rgba(255,255,255,0.2);">
				</div>
			</div>
				
				
				<div class="form-group">
	            	<input type="text" class="form-control" name="email" placeholder="電子郵件" required style="background-color: rgba(255,255,255,0.2);">
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">註冊</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	
								</div>
								
	            </div>
	          </form>
	         
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

