<?php 
	if(isset($_POST['sigin'])){
		require "db.php";
		$userName=$_POST['userName'];
		$passWord=$_POST['passWord'];
		if(empty($userName)||empty($passWord)){
			header("Location: index.php?nofiled");
			exit();
		}else{
			$query="SELECT * FROM users WHERE username=?;";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$query)){
				header("Location: index.php?nodata");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt,'s',$userName);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				if($row=mysqli_fetch_assoc($result)){
					$checkPass=false;
					if($passWord===$row['password']){
						$checkPass=true;
					}
					if($checkPass==true){
						session_start();
						$_SESSION['username']=$row['username'];
						$_SESSION['password']=$row['password'];
						$_SESSION['name']=$row['first'];
						header("Location: index.php?siginsucess");
						exit();
					}else{
						header("Location: index.php?wrongpwd");
						exit();
					}
				}else{
					header("Location: index.php?nouser");
					exit();
				}
			}
		}
	}else{
		header("Location: index.php");
		exit();
	}
?>
