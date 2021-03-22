<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
		<head>
		
			<title>admin Registration</title>
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
		
			.logo2
			{	
			float: left;
			padding-left: 50px;
	
			}
			.box2
			{
			height: 650px;
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
			<div class="reg_img">	
			<br><br>
				<div class="box2">
				<div class="logo2">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp
					<img src="images/qcu.png" height="110px" width="150px">&nbsp
				
					<h1 style="text-align: center; font-size: 35px; font-family:Arial;">Library Management System</h1>
					<h1 style="text-align: center; font-size: 25px;">User Registration Form</h1>
				<form name="registration" action="" method="post">
					<br>
						<div class="login">
					<input class="form-control" type="text" name="username" placeholder="username" required=""><br>
					
					<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
					<input class="form-control" type="text" name="lastname" placeholder="Last name" required=""><br>
					<input class="form-control" type="text" name="firstname" placeholder="First Name" required=""><br>
					<input class="form-control" type="text" name="middlename" placeholder="Middle Initial" required=""><br>
					<input class="form-control" type="text" name="contact" placeholder="contact" required=""><br>
					
						<input class="btn btn-default" type="submit" name="submit" value="Sign up" style="color:black; width:75px; height:30px;">
				</form>
					
					
				</div>
			</div>
		</section>
			<?php
				if(isset($_POST['submit']))
				{
				$count=0;
				$sql="SELECT username from admin";
				$res=mysqli_query($db,$sql);
				
				while($row=mysqli_fetch_assoc($res))
				{
					if($row['username']==$_POST['username'])
					{
						$count=$count+1;
					}
				}
					if($count==0)
						
						{mysqli_query($db,"INSERT INTO `admin` VALUES('','$_POST[lastname]','$_POST[firstname]','$_POST[middlename]',
													'$_POST[username]','$_POST[password]','$_POST[contact]','qw.jpg');");
		
				
		?>
			<script type="text/javascript">
				alert("registation success");
			</script>
		<?php
			}
			
				else
				{		?>
				<script type="text/javascript">
				alert("username already used");
			</script>
			<?php	
			}
			
			}
			?>
				
	</body>
</html>