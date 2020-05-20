<?php
    $servername='localhost:3307';
    $username='root';
    $password='';
    $dbname='uploadimage';
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
    	die("Connection fail :".mysqli_connect_error());
    }
