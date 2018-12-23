
	<?php session_start();
	if(!isset($_POST['login']))
	{

		if($_SESSION['login']==false)
			header('location:index.php');
		else
			header('location:profile.php');
			
		exit();
	}


	require './_db/database.php';
    
    $user = strtoupper(Mysqli_real_escape_string($conn,$_POST["uname"]));
    $pass = Mysqli_real_escape_string($conn,$_POST["pass"]);
    $_SESSION['user'] =$user;
    
 
    
    $sql = "SELECT  roll, pass FROM users WHERE roll='$user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
  {
      $_SESSION['login']=false;
      header('location:index.php?loginfail');
      exit();
  }
    $row = mysqli_fetch_assoc($result);
    if(password_verify($_POST["pass"],$row["pass"])==true)
    	{
    	$_SESSION["login"]=true;
    	header('location:profile.php');
}
    else 
    	{
    	$_SESSION["login"]=false;
    	header("location:index.php?loginfail");
    }
 ?>
