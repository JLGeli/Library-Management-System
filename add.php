<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
		<head>
			<title>Books</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<style type="text/css">
			.srch
			{
				padding-left:1200px;
			}
			body 
			{
				background-color:grey;
				font-family: "Lato", sans-serif;
				transition: background-color .5s;
			}

			.sidenav 
			{
			  height: 100%;
			  margin-top:110px ;
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
			.h:hover
			{
				color:white;
				width:200px;
				height:50px;
				background-color:grey;
			}
			.book
			{
				width: 500px;
				margin: 0px auto;
			}
			.form-control
			{
				background-color:white;
				color:black;
				height:35px;
				
				
			}
			</style>
			
		</head>
	<body>
		<!-------------------------sidenav--------------------->
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
				</div><br><br>
			<div class="h"> <a href="books.php">Books</a>  </div>
			<div class="h"> <a href="add.php">Add Books</a>  </div>
			<div class="h"> <a href="request.php">Book Request</a></div>
			<div class="h"> <a href="issue_info.php">Issue Information</a></div>
		<div class="h"> <a href="expired.php">Expired List</a></div>
		</div>
			
			<div id="main">
				<span style="font-size:30px;cursor:pointer color:black;" onclick="openNav()">&#9776; open</span>
				<div class="container">
					<h2 style="olor:black; font-family:Lucida Console; text-align:center;"><b>Add new Book</b></h2>
					
					<form class="book" action="" method="post">
						<input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
						<input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
						<input type="text" name="author" class="form-control" placeholder="Book author" required=""><br>
						<input type="text" name="edition" class="form-control" placeholder="Book Edition" required=""><br>
						<input type="text" name="date" class="form-control" placeholder="Date Published" required=""><br>
						<input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
						<input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
						<input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
					<button style="text-align:center;"class="btn btn-default" type="submit" name="submit">ADD</button>
						
					</form>
				</div>
					<?php
						if(isset($_POST['submit']))
						{
							if(isset($_SESSION['login_user']))
							{
								mysqli_query($db,"INSERT INTO books VALUES('$_POST[bid]','$_POST[name]','$_POST[author]'
													,'$_POST[edition]','$_POST[date]','$_POST[status]','$_POST[quantity]','$_POST[department]');");
							?>
							<script type="text/javascript">
								alert("book added successfully");
								</script>
							
							<?php
							}
							else
							{
								?>
									<script type="text/javascript">
								alert("You need to log in first");
								</script>
								
							<?php	
							}
						}
						
					?>
				</div>
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
			
			</body>
			</html>