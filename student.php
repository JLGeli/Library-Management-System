

<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
		<head>
			<title>Student Information</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<style type="text/css">
			.srch
			{
				padding-left:870px;
			}
			.container
			{
				height: 700px;
				background-color: black;
				opacity: .6;
				color: white;
				
			}
			body 
			{
				font-family: "Lato", sans-serif;
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
		<!-------------------------sidnav bar ---------------->
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
	<div class="container">
		<h2 style="text-align:center;"> List of Students</h2>
		<!-------------------------search bar ---------------->
		<div class="srch">
			<form	class="navbar-form" method="post" name="form1">
				
					<input class="form-control" type="text" name="search" placeholder= "search Student ID.">
					<button type="submit" name="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"> </span>
					</button>
				
			</form>
		</div>
		
		
		<?php
			
			if (isset($_POST['submit']))
			{
				$q=mysqli_query($db,"SELECT studentid,borrowerid,password,last,first,middle,campus,course,contact,email FROM `student` where studentid like 
									'%$_POST[search]%' ");
				
				
				
			
					if(mysqli_num_rows($q)==0)
			{
					echo"Sorry! No student have been found. Please search again.";
			}
				else 
				{
					echo "<table class='table table-bordered table-hover'>";
			echo "<tr style= 'background-color: blue;'>";
				//table header
		
				echo"<th>";	echo "Student ID";				echo"</th>";
				echo"<th>";	echo "Borrower ID";		echo"</th>";
				echo"<th>";	echo "Password";	echo"</th>";
				echo"<th>";	echo "Last Name";			echo"</th>";
				echo"<th>";	echo "First Name";			echo"</th>";
				echo"<th>";	echo "Middle Initial";		echo"</th>";
				echo"<th>";	echo "Campus";	echo"</th>";
				echo"<th>";	echo "Course";			echo"</th>";
				echo"<th>";	echo "Contact";			echo"</th>";
				echo"<th>";	echo "Email";		echo"</th>";
				
			echo "</tr >";
			
				while($row=mysqli_fetch_assoc($q))
				{
					echo"<tr>";
					echo"<td>"; echo $row['studentid'];			echo"</td>";
					echo"<td>"; echo $row['borrowerid']; 		echo"</td>";
					echo"<td>"; echo $row['password']; 		echo"</td>";
					echo"<td>"; echo $row['last'];  	echo"</td>";
					echo"<td>"; echo $row['first']; 		echo"</td>";
					echo"<td>"; echo $row['middle']; 	echo"</td>";
					echo"<td>"; echo $row['campus']; 		echo"</td>";
					echo"<td>"; echo $row['course'];  	echo"</td>";
					echo"<td>"; echo $row['contact']; 		echo"</td>";
					echo"<td>"; echo $row['email']; 	echo"</td>";
					
					echo"</tr>";
				}
				echo"</table>"
		;
				}
			}
				/* if button is not pressed. */
				else
				{
					
				
		
			$res=mysqli_query($db,"SELECT studentid,borrowerid,password,last,first,middle,campus,course,contact,email FROM `student` ORDER BY `student` . `studentid` ;");
			
			echo "<table class='table table-bordered table-hover'>";
			echo "<tr style= 'backgound-color: blue;'>";
				//table header
		
					echo"<th>";	echo "Student ID";				echo"</th>";
				echo"<th>";	echo "Borrower ID";		echo"</th>";
				echo"<th>";	echo "Password";	echo"</th>";
				echo"<th>";	echo "Last Name";			echo"</th>";
				echo"<th>";	echo "First Name";			echo"</th>";
				echo"<th>";	echo "Middle Initial";		echo"</th>";
					echo"<th>";	echo "Campus";	echo"</th>";
				echo"<th>";	echo "Course";			echo"</th>";
				echo"<th>";	echo "Contact";			echo"</th>";
				echo"<th>";	echo "Email";		echo"</th>";
			echo "</tr>";
			
				while($row=mysqli_fetch_assoc($res))
				{
					echo"<tr>";
					echo"<td>"; echo $row['studentid'];			echo"</td>";
					echo"<td>"; echo $row['borrowerid']; 		echo"</td>";
					echo"<td>"; echo $row['password']; 		echo"</td>";
					echo"<td>"; echo $row['last'];  	echo"</td>";
					echo"<td>"; echo $row['first']; 		echo"</td>";
					echo"<td>"; echo $row['middle']; 	echo"</td>";
					echo"<td>"; echo $row['campus']; 		echo"</td>";
					echo"<td>"; echo $row['course'];  	echo"</td>";
					echo"<td>"; echo $row['contact']; 		echo"</td>";
					echo"<td>"; echo $row['email']; 	echo"</td>";
					
					
					echo"</tr>";
				}
				echo"</table>";
				}
		?>
		</div> 
		</div> 
	</body>
	
</html>