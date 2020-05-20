<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="sigup.php" method="post" id="form-sigin">
			<div form-group>
				<label>First Name</label>
				<input type="text" name="firstName" placeholder="  First name">
			</div>
			<div form-group>
				<label>Last Name</label>
				<input type="text" name="lastName" placeholder="  Last Name">
			</div>
			<div class="form-group">
				<label>Tên Đăng nhập</label>
				<input type="text" name="userName" placeholder="  Tên đăng nhập">
			</div>
			<div form-group>
				<label>Mật khẩu</label>
				<input type="password" name="passWord" placeholder="  Mật khẩu">
			</div>
			
			<input type="submit" name="sigup" value="Đăng ký" id="sigup">
	</form>
</body>
</html>
<?php 
	if(isset($_POST['sigup'])){
		require "db.php";
		$firstName= $_POST['firstName'];
		$lastName= $_POST['lastName'];
		$userName= $_POST['userName'];
		$pass= $_POST['passWord'];
		if(empty($firstName)||empty($lastName)||empty($userName)||empty($pass)){
			header("Location: sigup.php?emptyfield");
			exit();
		}else if(!preg_match("/[a-zA-Z0-9]*$/",$userName)){
			header("Location: sigup.php?invalidusername");
			exit();
		}else{
			$query="SELECT * FROM users WHERE username=?;";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$query)){
				header("Location: sigup.php?sqlerror");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt,'s',$userName);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck=mysqli_stmt_num_rows($stmt);
				if($resultCheck>0){
					header("Location: sigup.php?usertaken");
					exit();
				}else{
					$query="INSERT INTO users(first,last,username,password) VALUES (?,?,?,?);";
					$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$query)){
							header("Location: sigup.php?sqlerror");
							exit();
					}else{
						//$hashPass=password_hash($passWord,PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt,'ssss',$firstName,$lastName,$userName,$pass);
						mysqli_stmt_execute($stmt);
						header("Location: index.php?successfull");
						exit();
					}
				}
			}
			mysqli_stmt_close($stmt);
			mysqli_close($conn);
		}	
	}
 ?>