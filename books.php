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
				padding-left:1100px;
			}
			body 
			{
			font-family: "Lato", sans-serif;
	
			
			margin-top:0px;
			background-repeat: no-repeat;
			
			}
			.container
			{
				height: 700px;
				
				
				
			}
			.sidenav 
			{
			  height: 100%;
			  margin-top:50px ;
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
				color:Black;
				width:200px;
				height:50px;
				background-color:grey;
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
				<div class="h"> <a href="books.php">Book</a>  </div>
			<div class="h"> <a href="add.php">Add Book</a>  </div>
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
   
</body>
		<!-------------------------search bar ---------------->
		<div class="srch">
			<form	class="navbar-form" method="post" name="form1">
				
					<input class="form-control" type="text" name="search" placeholder= "search books.">
					<button type="submit" name="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"> </span>
					</button>
				
			</form>
			<form	class="navbar-form" method="post" name="form1">
				
					<input class="form-control" type="text" name="bid" placeholder= "Enter books id." required="">
					<button type="submit" name="submit1" class="btn btn-default">Delete
					</button>
				
			</form>
		</div>
		<div class="container">
		<h2 style="Color:Black;">List of Books</h2>
		<?php
			
			if (isset($_POST['submit']))
			{
				$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");
				
				
				
			
					if(mysqli_num_rows($q)==0)
			{
					echo"sorry! no books found, search again";
			}
				else
				{
					echo "<table class='table table-bordered table-hover'>";
			echo "<tr style= 'background-color: #4863A0;'>";
				//table header
		
				echo"<th>";	echo "ID";				echo"</th>";
				echo"<th>";	echo "book-name";		echo"</th>";
				echo"<th>";	echo "authors name";	echo"</th>";
				echo"<th>";	echo "edition";			echo"</th>";
				echo"<th>";	echo "Date Published";	echo"</th>";
				echo"<th>";	echo "status";			echo"</th>";
				echo"<th>";	echo "quantity";		echo"</th>";
				echo"<th>";	echo "deprtment";		echo"</th>";
			echo "</tr>";
			
				while($row=mysqli_fetch_assoc($q))
				{
					echo"<tr style= 'background-color: white;'>";
					echo"<td>"; echo $row['bid'];			echo"</td>";
					echo"<td>"; echo $row['name']; 		echo"</td>";
					echo"<td>"; echo $row['author']; 		echo"</td>";
					echo"<td>"; echo $row['edition'];  	echo"</td>";
					echo"<td>"; echo $row['date'];  	echo"</td>";
					echo"<td>"; echo $row['status']; 		echo"</td>";
					echo"<td>"; echo $row['quantity']; 	echo"</td>";
					echo"<td>"; echo $row['department'];   echo"</td>";
					
					echo"</tr>";
				}
				echo"</table>"
		;	
				}
			}
				/* if button is not pressed. */
				else
				{
					
				
		
			$res=mysqli_query($db,"SELECT * FROM `books` ;");
			
			echo "<table class='table table-bordered table-hover'>";
			echo "<tr style= 'background-color: #4863A0;'>";
				//table header
		
				echo"<th>";	echo "Book ID";				echo"</th>";
				echo"<th>";	echo "Book Name";		echo"</th>";
				echo"<th>";	echo "Authors Name";	echo"</th>";
				echo"<th>";	echo "Edition";			echo"</th>";
				echo"<th>";	echo "Date Published";			echo"</th>";
				echo"<th>";	echo "Status";			echo"</th>";
				echo"<th>";	echo "Quantity";		echo"</th>";
				echo"<th>";	echo "Deprtment";		echo"</th>";
			echo "</tr>";
			
				while($row=mysqli_fetch_assoc($res))
				{
					echo"<tr style= 'background-color: white;'>";
					echo"<td>"; echo $row['bid'];			echo"</td>";
					echo"<td>"; echo $row['name']; 		echo"</td>";
					echo"<td>"; echo $row['author']; 		echo"</td>";
					echo"<td>"; echo $row['edition'];  	echo"</td>";
					echo"<td>"; echo $row['date'];  	echo"</td>";
					echo"<td>"; echo $row['status']; 		echo"</td>";
					echo"<td>"; echo $row['quantity']; 	echo"</td>";
					echo"<td>"; echo $row['department'];   echo"</td>";
					
					echo"</tr>";
				}
				echo"</table>";
			
				}
				if(isset($_POST['submit1']))
				{
					if(isset($_SESSION['login_user']))
					{
						mysqli_query($db, " DELETE from books where bid='$_POST[bid]';")
					
						?>
						<script type="text/javascript">
							alert("Delete Sucessful");
						</script>
						<?php
					}
						else {
					?>
						<script type="text/javascript">
							alert("Please login first");
						</script>
						<?php
							
				}
				}
				
		
				
		?>
		</div>	
	</body>
</div>
</html>