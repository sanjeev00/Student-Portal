<!DOCTYPE html>
<html>
<?php session_start();

if(isset($_POST['Logout']))
	{
		session_unset();
		session_destroy();
		header('location:index.php');
		exit();
	}
	if(!$_SESSION["login"])
	{
	header("location:index.php");
	exit();
	}
	require './_db/database.php';


?>
<head>
	<title></title>
		<link rel='stylesheet' type='text/css' href="profile.css">

</head>
<body>
	<?php 
$user = $_SESSION['user']; 
$sql = "SELECT  * FROM users WHERE roll='$user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div id=big>
	<div id=headwrapper>
		<div class=logo>
		
		<a id=logonav href="profile.php"><h1>SP</h1></a>
	</div>
	<div class=items>
	
	<form action='profile.php' method="POST">
	<div class=logout>
	<input id=logoutbut type="submit" name="Logout" value="Logout">
	</div>
	</form>
	</div>
</div>
<div id=bodywrap>
	<div id=contentwrapper>
	<div id=sidebar>
			
	<img src=<?php echo $row["img"] ?>  height=200 width=200>

	<?php if(!isset($_GET['id']))
	{
	if(isset($_GET['upimg']))
		echo"<p>upload a valid image(jpg,png)</p>";
	echo "

	<button id=upload onclick='visible();' >Upload Profile picture</button>
	<form action='upload.php' method='post' enctype='multipart/form-data'>
	    <script>
	    function visible()
	    {
	    	document.getElementById('fileToUpload').style.visibility='visible';
	    	document.getElementById('ubut').style.visibility='visible';
	    	document.getElementById('upload').style.visibility='hidden';
	    }
	    </script>
	    <input type='file' name='fileToUpload'  style='visibility:hidden;' id='fileToUpload'><br><br>
	    <input type='submit' value='UploadImage'  style='visibility:hidden;' id='ubut' name='submit'>
	</form>

	";


	}


	 ?>
	</div>
<div id=maincontent2>
<form  name="register" method="post" action='update.php'>
		<div id=regroup>
<div id=inp>Roll No<input type="text" value=<?php echo $row['roll'] ?> disabled required name="roll" maxlength="9" placeholder="CS20B1020" autofocus pattern='^(ME|CS|EC|EE|CE)[1-2][0-9][B|M]\d{4}$' title="Roll should be valid and in uppercase" ></div>
		<div id=inp>Name <input type="text" name="name" value=<?php echo $row['name'] ?> placeholder="Name" required pattern='^[A-Za-z\s]*$' title="numbers and symbols are not allowed" ></div>
		<div id=dob>DOB <input type="date" name="dob" required  value=<?php echo $row['dob'] ?>></div>
		
		<div id=dep>Department <select name='dept' id=dept disabled required>
			
			<option>ECE</option>
			<option>CSE</option>
			
			<option>EEE</option>

			<option>ME</option>
			<option>CE</option>
		</select>
		<input type="checkbox" name="deptc" id=deptc  onchange="change('deptc','dept');">change
	</div>

		
		<div id=inp>Year <select name='year'id=year disabled required>
			
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
		<input type="checkbox" name="yc" id=yc onclick="change('yc','year');">change
		</select>
	</div>
		<div id=inp>Email <input type="email" name="email" value=<?php echo $row['email']; ?> required=""></div>
		<div id=inp>Mobile <input type="text" name="mobile" value=<?php echo $row['mobile']; ?> maxlength="10" pattern="^[0-9]{10}$" required ></div>
		<input class="rbut register" type="submit" name="Submit" value='Update'>
	</form>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
	function change(id,id2){
		if(document.getElementById(id).checked==true)
		{
			document.getElementById(id2).disabled=false;

		}
		else
			document.getElementById(id2).disabled=true;
	}
	function a() {
		var y= "<?php echo $row['dept'] ?>";
		var x;
		if(y=='ECE')
			x=0;
		if(y=='CSE')
			x=1;
		if(y=='EEE')
			x=2;
		if(y=='ME')
			x=3;
		if(y=='CE')
			x=4;
		console.log(x);
		document.getElementById('dept').selectedIndex = x;
		var c ="<?php echo $row['year'] ?>";
		var d = c-1;
		console.log(d,typeof c);
		document.getElementById('year').selectedIndex = d;
	}
	a();
</script>
		</body>
</html>