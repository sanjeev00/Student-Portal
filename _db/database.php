<?php 


    $servername = "localhost";
	$username = "root";
	$password = "1234!@#$";
	$conn = new mysqli($servername, $username, $password);
	$_SESSION['conn']=$conn;
	//if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
    $DB_NAME ='mydb';
    $db=mysqli_select_db($conn,$DB_NAME);

 