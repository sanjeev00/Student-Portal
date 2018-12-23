
<!DOCTYPE html>
<?php 
session_start();
if($_SESSION['login'])
{
	header('location:profile.php');
	exit();
}

 ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<script type="text/javascript">
		function matchp()
		{
			var  pass = document.forms['register']['pass'];
			var  cpass = document.forms['register']['cpass'];
			
			if(cpass.value!=pass.value)
			{
			document.getElementById('match').innerHTML="<p><font color=red>Passwords do not match</font></p>";
			}
			else
				document.getElementById('match').innerHTML="<p><font color=green>Passwords match</font></p>";
		}
		function validate()
		{
			document.getElementById('match').innerHTML="";
			var  roll = document.forms['register']['roll'];
			var  name = document.forms['register']['name'];
			var  dept = document.forms['register']['dept'];
			var  dob = document.forms['register']['dob'];
			var  year = document.forms['register']['year'];
			var  email = document.forms['register']['email'];
			var  mob = document.forms['register']['mobile'];
			var  pass = document.forms['register']['pass'];
			var  cpass = document.forms['register']['cpass'];
			if(cpass.value!=pass.value)
			{
			document.getElementById('match').innerHTML="<p><font color=red>Passwords do not match</font></p>";
			
			return false;
			}
			else
			return true;
		}
	</script>
	
 
</head>
<body>

<div>
	
	<header>
<div id=headwrapper>
	<a href="/"><img src=logomin.png height="100px" width="100px"></a>
	<div id='head'><h1>Student Portal</h1></div></div>
		
	</header>
	<div  class=main>
		
		<div id='regbox'> 
	<fieldset id='field2'>
		<legend>Register</legend>
		
	<form onsubmit="return validate();" name="register" method="post" action='val.php'>
		<div id=regroup>
		<?php 
		if(isset($_GET['exist']))
			echo "Roll No already exists<br><br>";
		 ?>
		<div id=inp>Roll No<input type="text" required name="roll" maxlength="9" placeholder="CS20B1020" autofocus pattern='^(ME|CS|EC|EE|CE)[1-2][0-9][B|M]\d{4}$' title="Roll should be valid and in uppercase" ></div>
		<div id=inp>Name <input type="text" name="name" placeholder="Name" required pattern='^[A-Za-z\s]*$' title="numbers and symbols are not allowed" ></div>
		<div id=dob>DOB <input type="date" name="dob" required ></div>
		<div id=dep>Department <select name='dept' required>
			<option hidden disabled selected value>select</option>
			<option>CSE</option>
			<option>ECE</option>
			<option>EEE</option>

			<option>ME</option>
			<option>CE</option>
		</select></div>
		<div id=inp>Year <select name='year' required>
			<option hidden disabled selected value>select</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
		</select></div>
		<div id=inp>Email <input type="email" name="email" placeholder="abc@gmail.com" required=""></div>
		<div id=inp>Mobile <input type="text" name="mobile" placeholder="0000000000" maxlength="10" pattern="^[0-9]{10}$" required ></div>
		<div id=inp>Password <input type="Password" name='pass' placeholder="Password" minlength="8" onkeyup='matchp();' required></div>
		<div id=cpass>Confirm Password<input  type="Password" name="cpass" placeholder="Password" onkeyup='matchp();' required></div>
		<p id=match></p>
		<div id=regbuttons>
		<input class="rbut register" type="submit" name="Submit" value='Register'>&nbsp;
		<input class="rbut reset"type="reset" name="Reset" >
		</div>
		</div>
	</form>

	</fieldset>
	</div>
	</div>
</div>
</body>
</html>
