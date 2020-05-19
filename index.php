<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Xin chào các bạn</h1>
	<form action="uploadimg.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="subImg" value="UPLOAD">
	</form>
</body>
</html>