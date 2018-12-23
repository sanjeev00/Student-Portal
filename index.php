<!doctype HTML>
<?php
session_start();
if(isset($_SESSION['login'])&&$_SESSION['login'])
{
	header('location:profile.php');
	exit();
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
	<script type="text/javascript" scr="./index.js"></script>
	<?php 
	 $_SESSION["login"]=false; ?>
</head>
<body>
	<header>
<div id=headwrapper>
	<img src=logomin.png height="100px" width="100px">
	<div id='head'><h1>Student Portal</h1></div></div>
		
	</header>
	
	<div id=mainwrapper>
		
		<div id='logbox'> 
		<fieldset id=field>
			<legend>Log In</legend>
		<form method="POST" action='slogin.php'>
			<font type=Tahoma>
			&nbsp;&nbsp;Roll No <input type="text" name="uname" required><br>
			Password <input type="password" name="pass" required><br></font>
			<?php 

				if(isset($_GET['loginfail']))
					echo "<font color=red text-align=center>Incorrect Roll No or password<br></font>";
			 ?>
			<div id='logbut'>
			<input type="Submit"id="lbut" name="login">
			</div>
			<br>
		</form>
	
		<a href='./register.php'><p>Not registered?click here to register</p></a>
	</form>
		</fieldset>
	</div>
	</div>
		
	</div>
</body>
</html> 