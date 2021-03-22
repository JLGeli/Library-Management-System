<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
		<head>
			<title>Approve Request</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<style type="text/css">
			.srch
			{
				padding-left:950px;
			}
			.form-control
			{
				width: 200px;
				height:30px;
				background-color:white;
				color:black;
			}
			body 
			{
				background-image: url("images/6.jpg");
				background-repeat: no-repeat;
				font-family: "Lato", sans-serif;
				transition: backgound-color .5s;
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
			.container
			{
				height: 700px;
				background-color: black;
				opacity: .6;
				color: white;
				
			}
			.approve
			{
				margin-left: 400px;
			}
			</style>
		</head>
	<body>
		<div id="mySidenav" class="sidenav">
			 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<div style="color:white margin-left:60px;font-size:20px;">
				
				<?php
				if(isset($_SESSION['login_user']))
					echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
				{
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
					<div class="container">
						<h3 style="text-align:center;"> Approve request</h3>
						<form class="approve" action="" method="post">
							<input type="text" name="approve" placeholder="YES or NO" required="" class="form-control"><br>
							<input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>
							<input type="text" name="return" placeholder="return Date yyyy-mm-dd" required="" class="form-control"><br>
							<button class="btn btn-default" type="submit" name="submit">Approve </button>

					</form>
						
					</div>
				</div>
				<?php
					if(isset($_POST['submit']))
					{
						mysqli_query($db,"UPDATE `issue_books` SET `approve` = '$_POST[approve]',`issue` = '$_POST[issue]',`return` = '$_POST[return]' WHERE studentid = '$_SESSION[st_name]' AND bid = '$_SESSION[bid]';");
					
					mysqli_query($db, "UPDATE books SET quantity = quantity-1 where bid = '$_SESSION[bid]';");
					
					$res=mysqli_query($db,"SELECT quantity from books here bid = '$_SESSION[bid]';");
					
					while ($row = mysqli_fetch_assoc($res))
					{
						if($row['quantity']==0)
						{
							mysqli_query($db,"UPDATE books SET status = 'not-available' where bid = '$_SESSION[bid]';");
						}
					}
					?>
						<script type="text/javascript">
							alert("Update Sucessfully.");
							window.location ="request.php"
						</script>
					<?php
					}
					
				
				?>
				
			
			</body>
			
		</html>