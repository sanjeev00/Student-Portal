<?php

session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<?php
require './_db/database.php';

$query = mysqli_real_escape_string($conn,$_POST['search']);

$sql = "SELECT * FROM users WHERE name  LIKE '%$query%'";
$res = mysqli_query($conn,$sql);
$num = mysqli_num_rows($res);
while($row = mysqli_fetch_array($res))
{
	$link = './profile.php?id='.$row['id'];
?>

<div class=person>

<div class=img>
<img src=<?php echo $row['img'] ?> height="100" width="100">
</div>
<div>
	<a href=<?php echo $link; ?>><?php echo $row['name']; ?></a>
	<p><?php echo $row['dept']; ?></p>
	<p><?php echo $row['year']; ?>&nbsp;year</p>	
</div>
</div>

<?php

}







?>
</body>
</html>


