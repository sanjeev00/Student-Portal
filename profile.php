<!DOCTYPE html>
<html>
<head>
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
	<title>Student Profile</title>
	<link rel='stylesheet' type='text/css' href="profile.css">


</head>
<body>
	<div id=big>
	<div id=headwrapper>
		<div class=logo>
		
		<a id=logonav href="profile.php"><h1>SP</h1></a>
	</div>
	<div class=items>
	<form method='POST' action='profile.php'>
		<div class=search>
			<input type="text" name="search" >
			<button name='submit' type="submit"><img id=s src='searchicon.png'></button>
			
		</div>
	</form>
	<form action='profile.php' method="POST">
	<div class=logout>
	<input id=logoutbut type="submit" name="Logout" value="Logout">
	</div>
	</form>
	</div>
</div>
<div id=bodywrap>
<div id=contentwrapper>
<?php 
$user = $_SESSION['user']; 
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$stmt = $conn->prepare('SELECT * FROM users WHERE id = ?');
	
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result =$stmt->get_result();
    $row = mysqli_fetch_assoc($result);
}
else

{

$sql = "SELECT  * FROM users WHERE roll='$user'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
}

?>
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
<?php if(!isset($_POST['search'])) {?>
<p>
	<a  href="edit.php">edit information</a>
</p>
<?php } ?>
</div>
<div id=maincontent>
<?php
if(!isset($_POST['search']))
{
	?>
<p><span>Roll No</span> : <?php echo $row["roll"] ?>
</p>
<p><span>Name</span> : <?php echo $row["name"] ?>
</p>

<p><span>Dob</span>: <?php echo $row["dob"] ?>
</p>

<p><span>Department</span>: <?php echo $row["dept"] ?>
</p>

<p><span>Year</span> : <?php echo $row["year"] ?>
</p>

<p><span>Mobile </span>: <?php echo $row["mobile"] ?>
</p>

<p><span>email</span> : <?php echo $row["email"] ?>
</p>
<?php 
} ?>
<?php
if(isset($_POST['search'])){
$query = mysqli_real_escape_string($conn,$_POST['search']);

$sqll = "SELECT * FROM users WHERE name  LIKE '%$query%'";
$res = mysqli_query($conn,$sqll);
$num = mysqli_num_rows($res);
if($num==0||$_POST['search']=="")
echo "No search results found";
else{
while($roww = mysqli_fetch_array($res))
{
	$link = './profile.php?id='.$roww['id'];
?>

<div class=person>

<div class=img>
<img src=<?php echo $roww['img'] ?> height="100" width="100">
</div>
<div id=det>
	<a href=<?php echo $link; ?>><?php echo $roww['name']; ?></a>
	<p><?php echo $roww['dept']; ?></p>
	<p><?php echo $roww['year']; ?>&nbsp;year</p>	
</div>
</div>

<?php

}
}
}





?>
</div>
</div>
</div>

<div id=foot></div>
</div>
<script type="text/javascript" src=edit.js>
	</script>
</body>
</html>

