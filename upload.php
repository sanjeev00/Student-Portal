<?php 
require './_db/database.php';
session_start();
$target_dir = "img/";
if(!isset($_POST['submit']))
{
	header('location:profile.php');

}
else{
$user = $_SESSION['user'];
$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
if($imageFileType=='jpg'||$imageFileType=='png'||$imageFileType=='jpeg')
	{
	$target_file = $target_dir.$_SESSION['user'].'.'.$imageFileType;
	$fn = './img/'.$_SESSION['user'].'.'.$imageFileType;
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	$sql = "UPDATE users SET img='$fn' WHERE roll='$user'";
	mysqli_query($conn, $sql);
	header('location:profile.php');
	exit();
	}
	
	header('location:profile.php?upimg=fail');

}
?>