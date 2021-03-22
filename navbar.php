<?php
	session_start();

?>

<!DOCTYPE html>
<html>
		<head>
		
			<title>Admin</title>
				<link rel="stylesheet" type="text/css" href="style.css">
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, intitial-scale=1">
		
			<link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
				
		</head>
	<body>
		
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand active ">Online Library Management System</a>
					</div>
					
					<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>		
					<li><a href="books.php">Books</a></li>
					<li><a href="about.php">About</a></li>
	
			</ul>
					<?php
						if(isset($_SESSION['login_user']))
						{
							?>
							<ul class="nav navbar-nav navbar-left">
								<li><a href="student.php">Student Information</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="profile.php">
									<div style="color: white">
							<?php
								echo "<img class='img-circle profile_img' height=25 width=25 src='images/".$_SESSION['pic']."'>";
								echo $_SESSION['login_user'];
								?>
									</div></a></li>
								
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
							
						</ul>
						<?php 
						}
						else
						{
							?>
							
				<ul class="nav navbar-nav navbar-right">
					<li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
					
					<li><a href="registration.php"><span class="glyphicon glyphicon-user"> SignUp</a></li>
					
						</ul>
					<?php					
							
						}
					?>	
		
			</nav>
		
		</div>	
	</body>
</html>