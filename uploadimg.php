<?php 
	if(isset($_POST["subImg"])){
		$file=$_FILES['file'];
		$fileName=$_FILES['file']['name'];
		$fileType=$_FILES['file']['type'];
		//nơi chứa thư mục image
		$fileTpmName=$_FILES['file']['tmp_name'];
		$fileErr=$_FILES['file']['error'];
		$fileSize=$_FILES['file']['size'];
		$fileNameReal=explode(".",$fileName);
		$fileDuoi=strtolower(end($fileNameReal));
		$mangDuoi=array("jpg","jpeg","png","pdf");
		if(in_array($fileDuoi,$mangDuoi)){
			if($fileErr===0){
				if($fileSize<1000000){
					$fileNameNew=uniqid('',true).".".$fileDuoi;
					$fileDestination="upload/".$fileNameNew;
					move_uploaded_file($fileTpmName,$fileDestination);
					header("Location: index.php?updatesucess");
				}else{
					echo "big size";
				}
			}else{
				echo "file error";
			}
		}
	}
?>