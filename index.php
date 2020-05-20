<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php 
		if(isset($_SESSION['username'])){
			echo "<h1>Xin chào : ".$_SESSION['name']." </h1>
			<form action='sigout.php'>
			<input type='submit' name='sigout' value='SIGOUT'>
			</form>
			<form action='uploadimg.php' method='post' id='form-upload' enctype='multipart/form-data'>
			<input type='file' name='file'>
			<input type='submit' name='subImg' value='UPLOAD'>
			</form>
		";
		}else{
			echo "<form action='sigin.php' method='post' id='form-sigin'>
			<div class='form-group'>
				<label>Tên Đăng nhập</label>
				<input type='text' name='userName' placeholder='  Tên đăng nhập'>
			</div>
			<div form-group>
				<label>Mật khẩu</label>
				<input type='password' name='passWord' placeholder='  Mật khẩu'>
			</div>
			<div form-group>
				<a href='sigup.php' class='dk'>Đăng ký tài khoản</a>
			</div>
			<input type='submit' name='sigin' value='Đăng nhập' id='siginn'>
			</form>";
		}
	 ?>
	
	
</body>
</html>