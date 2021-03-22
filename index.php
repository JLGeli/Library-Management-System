<?php


	session_start();
	
?>
<!DOCTYPE html>
<html>
		<head>
		<title>
			Online Library Management System
		</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, intitial-scale=1">
		<style type="text/css">	
			.wrapper
		{
			height: 650px;
			width: 1430px;
			background-color: #grey;
		}
	
			header
		{
			height: 130px;
			width: 1580px;
			background-color:grey;	
			padding:10x;
	
		}

			section
		{
			height: 650px;
			width: 1580px;
			margin-top:0px;
			background-image: url("images/233.jpg");
			opacity: .9;
			background-repeat: no-repeat;
			background-size: 1600px 650px;				
		}
		
			
			nav
		{
			
			float:left;
			word-spacing:30px;
			padding: 20px;
		}
			nav li
		{	
			display: inline-block;
			line-height: 70px;
			
		}
		.box
		{
			height: 300px;
			width:450px;
			background-color:  #ADD8E6;
			
			margin: 0px auto;
			opacity: .8;
	
		}
		.logo2
		{	
			float: left;
			padding-left: 145px;
	
		}
		</style>
	</head>
	<body>
		<div class="wraper">
		<header>
		
		<div class="logo">
			<img src="images/123.png" height="110px" width="150px">
			<h1 style ="color: black;">Online Library Management System</h1>
		</div>
			
			<?php
			if(isset($_SESSION['login_user']))
			{ ?>
				<nav>
					<ul>
						<li><a href="index.php">Home<a/></li>
						<li><a href="books.php">Books<a/></li>
						<li><a href="about.php">About<a/></li>
						
						
						<li><a href="logout.php">Logout<a/></li>
						<li><a href=""><a/></li>
						
						
					</ul>
				</nav>		
			<?php
			}
			
			
			else
			{
				
				?>
				<nav>
					
						<li><a href="index.php">Home<a/></li>
						<li><a href="books.php">Books<a/></li>
						<li><a href="about.php">About<a/></li>
						<li><a href="admin_login.php">Login<a/></li>
						<li><a href="registration.php">Signup<a/></li>
						<li><a href=""><a/></li>
						
						
					</ul>
				</nav>			
			<?php	
				
			}
			
			?>
			
			
					
			</div>	
		</header>
		<section><br>
		<div class="sec_img">
		<div class="box">
		<div class="logo2">
			<img src="images/qcu.png" height="158px" width="158px">
				<br>
					<h1 style="text-align: center; font size: 35px;">Welcome to Library</h1><br>
					<h1 style="text-align: center; font-size: 15px;">Opens at 09:00am</h1><br>
					<h1 style="text-align: center; font-size: 15px;">Closes at 05:00pm</h1>
				</div>
			
			
		</section>
		
	</div>
		<?php
			include "footer.php";
		?>
	</body>
</html>