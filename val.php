<?php
	require './_db/database.php';
    if(!isset($_POST['Submit']))
  	{
  	header('location:index.php');
  	exit();
  }
   /*$sqlc="CREATE TABLE  users(
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
   	roll VARCHAR(30) NOT NULL,
    pass VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL,
    dept VARCHAR(30) NOT NULL,
    dob VARCHAR(30) NOT NULL,
    year VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    mobile VARCHAR(30) NOT NULL
)";
  
    if ($conn->query($sqlc) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

    $roll= Mysqli_real_escape_string($conn,$_POST['roll']);
    $name= Mysqli_real_escape_string($conn,$_POST['name']);
    $dept= Mysqli_real_escape_string($conn,$_POST['dept']);
    $dob= Mysqli_real_escape_string($conn,$_POST['dob']);
    $year= Mysqli_real_escape_string($conn,$_POST['year']);
    $email= Mysqli_real_escape_string($conn,$_POST['email']);
    $mobile= Mysqli_real_escape_string($conn,$_POST['mobile']);
    $pass= Mysqli_real_escape_string($conn,$_POST['pass']);
    $q = "SELECT * FROM users WHERE roll = '$roll'";
    $exist=mysqli_query($conn,$q);
    if (mysqli_num_rows($exist) != 0)
  {
      header('location:register.php?exist');
      exit();
  }
  	$pass = password_hash($pass,PASSWORD_DEFAULT);


    $sql = "INSERT INTO users(roll,pass,name,dept,dob,year,email,mobile) VALUES('{$roll}','{$pass}','{$name}','{$dept}','{$dob}','{$year}','{$email}','{$mobile}');";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
    	echo "registered successfully";
    }

$conn->close();
header('Location: index.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
