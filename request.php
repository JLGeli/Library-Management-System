<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
		<head>
			<title>Book Request</title>
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
				
				background-repeat: no-repeat;
				font-family: "Lato", sans-serif;
				transition: backgound-color .5s;
			}

			.sidenav 
			{
			  height: 100%;
			  margin-top:75px ;
			  width: 0;
			  position: fixed;
			  z-index: 1;
			  top: 0;
			  left: 0;
			  background-color: #111;
			  overflow-x: hidden;
			  transition: 0.5s;
			  padding-top: 50px;
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
					<div class="srch">
						<form method="post" action="" name="form1"><br>
							<input type="text" name="studentid" class="form-control" placeholder="Student ID" required=""><br>
							<input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
						<button class="btn btn-default" name="submit" type="submit"> Submit</button>
						</form>
					</div>
				<h2 style="text-align:center;">Request of Books</h2>
				<?php
				
					if (isset($_SESSION['login_user']))
					{
						$sql=" SELECT student.studentid,borrowerid, books.bid,name,author,edition,status FROM student INNER JOIN issue_books 
						ON student.studentid=issue_books.studentid INNER JOIN books on issue_books.bid=books.bid WHERE issue_books.approve =''";
						$res=mysqli_query($db,$sql);
						
						if(mysqli_num_rows($res)==0)
				{
					echo "<h3><b>";
					echo "There's no pending Request";
					echo "</h3></b>";
				}
					else
				{
					echo "<table class='table table-bordered table-hover'>";
					echo "<tr style= 'background-color: #4863A0;'>";
					//table header
		
				echo"<th>";	echo "Student ID";				echo"</th>";
				echo"<th>";	echo "Borrower ID";				echo"</th>";
				echo"<th>";	echo "Book ID";			echo"</th>";
				echo"<th>";	echo "Book name";			echo"</th>";
				echo"<th>";	echo "Authors name";			echo"</th>";
				echo"<th>";	echo "Edition";			echo"</th>";
				echo"<th>";	echo "Status";			echo"</th>";
				echo "</tr>";
			
				while($row=mysqli_fetch_assoc($res))
				{
					echo"<tr >";
					echo"<td>"; echo $row['studentid'];			echo"</td>";
					echo"<td>"; echo $row['borrowerid']; 		echo"</td>";
					echo"<td>"; echo $row['bid']; 		echo"</td>";
					echo"<td>"; echo $row['name'];  	echo"</td>";
					echo"<td>"; echo $row['author'];  	echo"</td>";
					echo"<td>"; echo $row['edition'];  	echo"</td>";
					echo"<td>"; echo $row['status'];  	echo"</td>";
					
					echo"</tr>";
				}
				echo"</table>";
				}
					}
					
				else
				{
					?>
					<h4 style="text-align:center; color: white;"> You need to login first to see the requests.</h3>
						
					<?php
				}
					
					if(isset($_POST['submit']))
					{
						$_SESSION['st_name']=$_POST['studentid'];
						$_SESSION['bid'] = $_POST['bid'];
						
					?>	
					<script type="text/javascript">
						window.location="approve.php"
					</script>
					
					<?php
					}
					
			?>	
			</div>
	</body>
</html>