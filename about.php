<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Feedback</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, intitial-scale=1">
	
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style type="text/css">
			
			.wrapper
			{
				
				padding-left: 20px;
				margin: 0px auto;
				width:850px;
				height:1150px;
				background-color:black;
				opacity:.8;
				color: white;
				
			}
			
				.form-control
				{
					height: 70px;
					width: 600px;
				}
			.scroll
			{
				width:100%;
				height:400px;
				overflow: auto;
			}
			.logo2
			{	
			float: middle;
			padding-left:280px;
	
			}
			.sidenav 
			{
			  height: 100%;
			  margin-top:55px ;
			  width: 0;
			  position: fixed;
			  z-index: 1;
			  top: 0;
			  left: 0;
			  background-color: #111;
			  overflow-x: hidden;
			  transition: 0.5s;
			  padding-top: 60px;
			}
			.sidenav a
			{
			  padding: 8px 8px 8px 32px;
			  text-decoration: none;
			  font-size: 25px;
			  color: #818181;
			  display: block;
			  transition: 0.3s;
			}
			.sidenav a:hover 
			{
			  color: #f1f1f1;
			}
			.sidenav .closebtn 
			{
			  position: absolute;
			  top: 0;
			  right: 25px;
			  font-size: 36px;
			  margin-left: 50px;
			}
			@media screen and (max-height: 450px) 
			{
			  .sidenav {padding-top: 15px;}
			  .sidenav a {font-size: 18px;}
			
			}
			.img-circle
			{
				margin-left: 30px;
			}
			</style>
	</head>
	<body>
		<div id="mySidenav" class="sidenav">
			 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<div style="color:white margin-left:60px;font-size:20px;">
				
				<?php
				if(isset($_SESSION['login_user']))
				{
					echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
					echo "<br><br>";
					echo "Welcome".$_SESSION['login_user'];
				}	
							?>
				</div>
			
			 <a href="books.php">Books</a>
			 <a href="books.php">Add Books</a>
			 <a href="request.php">Book Request</a>
			 <a href="issue_info.php">Issue Infomation</a>
			 <div class="h"> <a href="expired.php">Expired List</a></div>
		</div>
			
			<div id="main">
				<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

				<script>
					function openNav() {
					  document.getElementById("mySidenav").style.width = "250px";
					  document.getElementById("main").style.marginLeft = "250px";
					document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
					}

					function closeNav() {
						document.getElementById("mySidenav").style.width = "0";
						document.getElementById("main").style.marginLeft = "0";
						document.body.style.backgroundColor = "white";
					}
				</script>
		<div class="wrapper">
			<div class="logo2">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<img src="images/qcu.png" height="110px" width="150px">
			</div>
			
			<h1 style="text-align:center;">Mission</h1>
			<h5>	<p style="text-align:center;"> To provide education that will awaken full understanding of the essence of the 
				natural resources of the country,<br> and the potentials of human resources of the nation.</p></h5>
				<br>
			<h1 style="text-align:center;">Vision</h1>
		<h5>	<p style="text-align:center;"> The constituents of the Philippines as a whole,
			<br>while starting in Quezon City in a particular, <br>
			enjoy the good life mainly as a result of their native talent. 
			<br>Gained wisdom and hard-work.</p></h5>
	
			<br>
			<h1 style="text-align:center;">Core-values</h1>	
		<h5><p style="text-align:center;">Nationalism/Pagkamakabayan<br>
							Integrity/Pagkamarangal<br>
							Creativity/Pagkamalikhain<br>
							Excellence/Kahusayan<br>	
							Industry/Pagkamasipag<br>
							Unity/Pagkakaisa<br>
							</p></h5>
							<br>
			<h1 style="text-align:center;">New Mission</h1>
			<h5>	<p style="text-align:center;"> To provide a comprehensive education that enhances the lives of QCU students for nation building and as world citizens.</p></h5>				
				
				<br>
			<h1 style="text-align:center;">New Vision</h1>
			<h5>	<p style="text-align:center;">To be recognized as the #1 local University of employable graduates.</p></h5>				
				
				<br>
				<h1 style="text-align:center;">QCU Address</h1>	
		<h5><p style="text-align:center;">673 Quirino Highway, San Bartolome, 1116 Quezon City, Philippines<br>
							Contact:289368050 <br>
							Email: qcpu@quezoncity.gov.ph<br>
							
							</p></h5>	<br>
											
					<h1 style="text-align:center;">Purpose of Library Management System </h1>	
					<h5><p style="text-align:center;"><ol>
			 To reduces the manual paperwork and gives proper information of books that has been recorded automatically. </li>
			<li>Librarian can update the information of books and manage availability and arriver record of the books. </li>
			<li>To saves human efforts and time. </li>
			<li>To make it easier for students/teachers to easily search and find the books.</li>
			</ol>
</p></h5>

	</div>
	</body>
</html>