<?php
	session_start();
	require_once "../LogIn/checkaccount.php";
	setcookie('check',false,time()+15*60);
	$_SESSION['power'] = 'gv';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="./CSS/style.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		#loi{
			display: block;
			text-align: right;
			color: rgb(255, 81, 81);
			font-size: 0.7rem;
			margin: 20px 0;
			transition: .3s
		}
	</style>
</head>
<body>
	<img class="wave" src="./Img/wave.png">
	<h1>Giáo viên</h1>
	<div class="container">
		<div class="img">
			<img src="./Img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="./Img/avatar.svg">
				<h2 class="title">Giáo dục</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Tên đăng nhập</h5>
           		   		<input id="user_login" type="text" class="input" name="user">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mật khẩu</h5>
           		    	<input id="pass_login" type="password" class="input" name="pass">
            	   </div>
            	</div>
            	<a href="#">Quên mật khẩu?</a>
				<?php 
					if($loi)
						echo "<p id=\"loi\"> Tài khoản hoặc mật khẩu không chính xác</p>";
				?>
            	<input type="submit" class="btn" value="Đăng nhập" name="submit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./Js/main.js"></script>
    <script type="text/javascript" src="./Js/login.js"></script>
</body>
</html>