<?php

session_start();
if(!$_SESSION["login"])
	{
	header("location:index.php");
	exit();
	}

if(!isset($_POST['Submit']))
 {
  	header('location:index.php');
  	exit();
  }
$user = $_SESSION['user'];
$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$year = $_POST['year'];
$dept = $_POST['dept'];
 require './_db/database.php';
 $sql="UPDATE users SET name='$name' ,dob='$dob', email='$email', mobile='$mobile',dept='$dept',year='$year' where roll='$user'";
 $result = mysqli_query($conn,$sql);

 header('location:profile.php');
 ?>