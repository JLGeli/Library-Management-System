<?php
	include "connection.php";
	include "navbar.php";

?>
<!DOCTYPE html>
<html>
		<head>
		
			<title>Admin Registration</title>
				<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, intitial-scale=1">
	
		
		
		<style>
			section
		{
			height: 750px;
			width: 1580px;
			margin-top:-20px;
			background-image: url("images/233.jpg");
			opacity: .9;
			background-repeat: no-repeat;
			background-size: 1600px 750px;				
		}
			.logo2
		{	
			float: left;
			padding-left: 50px;
	
		}
		.box1
		{
			height: 550px;
			width:550px;
			background-color:  #ADD8E6;
			margin-top: -20px;
			opacity: .8;
			padding:10px;
		}
		</style>
		</head>
	<body>
	
		<section>
			<div class="log_img">	
			<br><br>
				<div class="box1">
				<div class="logo2">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp
					<img src="images/qcu.png" height="110px" width="150px">&nbsp
						<h1 style="text-align: center; font-size: 35px; font-family:Arial;">Library Management System</h1>
						<h1 style="text-align: center; font-size: 25px;">User Login Form</h1>
				<form name="login" action="" method="post">
					<br>
						<div class="login">
							<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
							<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
						<input class="btn btn-default" type="submit" name="submit" value="Login" style="color:black; width:60px; height:30px;">
					</div>	
				</form>
					<p style="color:black; padding-left:15px;">
						<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<a style="color:red; text-decoration:none;" href="update_password.php">Forgot Password?</a></br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						No Library Account yet?<a style="color:black;" href="registration.php">Sign up</a>
					</p>
				</div>
			</div>
		</section>
		
			<?php
			if(isset($_POST['submit']))
			{
				$count=0;
				$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username= '$_POST[username]' && password='$_POST[password]';");
				$row= mysqli_fetch_assoc($res);
				
				$count=mysqli_num_rows($res);
				
				if($count==0)
				{
					
					?>
				<!---
					<script type="text/javascript">
				alert("the studentid and password doesnt match");
			</script>
					
					--->
					<div class="alert alert-danger" style="width:650px; margin-left:400px;">
						<strong>The username and password doesnt match</strong>
					</div>
					
				<?php
				}
			
				else
				{
					/*----------- if username and password matches --------*/
					$_SESSION['login_user']= $_POST['username'];
					$_SESSION['pic'] = $row ['pic'];
						
					?>
					<script type="text/javascript">
					window.location="index.php"
					</script>
					
					<?php
				}
			}
			
			
			?>
		
		
		
	</body>
</html>