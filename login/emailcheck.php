<!doctype html>
<?php session_start();
//輸入驗證碼的前端網頁

?>
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
				
		      	
				  <div class="col-md-12 col-lg-6" >
					<div class="login-wrap p-0">
					<h3 class="mb-4 text-center">信箱驗證</h3>
		      	<form class="signin-form" action="registerinsert.php" method="post">
				<div class="form-group" align=center>
	            	<p>已寄送驗證碼至<?php echo $email?></p>
	            </div>
				<div class="row">
				<div class="form-group col-lg-8" >
	            	<input type="text" class="form-control" name="validate" placeholder="請輸入驗證碼" style="background-color: rgba(255,255,255,0.2);">
				</div>
				<div class="form-group col-lg-4" >
					<button class="form-control btn-primary" style="width:160px;background-color: rgba(255,255,255,0.2);" onclick="javascript:location.href='validate.php'">重新發送驗證碼</button>
	            </div>
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

