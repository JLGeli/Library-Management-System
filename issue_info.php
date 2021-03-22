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
				
				background-repeat: no-repeat;
				font-family: "Lato", sans-serif;
				transition: backgound-color .5s;
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
				margin-left: 450px;
			}
			.scroll
			{
				width: 100%;
				height: 500px;
				overflow: auto;
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
					<div class="container">
						<h2 style="text-align:center;"> Information of Borrowed Books</h2>
						<?php
						$c=0;
							if(isset($_SESSION['login_user']))
							{
								$sql=" SELECT student.studentid,borrowerid, books.bid,name,author,edition,issue, issue_books.return 
								FROM student INNER JOIN issue_books ON student.studentid = issue_books.studentid 
								INNER JOIN books ON issue_books.bid = books.bid 
								WHERE issue_books. approve = 'YES' ORDER BY `issue_books`. `return` ASC";
											
								$res=mysqli_query($db,$sql);
								echo "<div class='scroll'>";
								echo "<table class='table table-bordered' style='width:100%;'>";
								
								echo "<tr style= 'background-color: #4863A0;'>";
				
		
						echo"<th>";	echo "Student ID";				echo"</th>";
						echo"<th>";	echo "Borrower ID";				echo"</th>";
						echo"<th>";	echo "Book ID";			echo"</th>";
						echo"<th>";	echo "Book name";			echo"</th>";
						echo"<th>";	echo "Authors name";			echo"</th>";
						echo"<th>";	echo "Edition";			echo"</th>";
						echo"<th>";	echo "Issue Date";			echo"</th>";
						echo"<th>";	echo "Return Date";			echo"</th>";
						
						echo "</tr>";
						echo"</table>";
								
								
							echo "<div class='scroll'>";
								echo "<table class='table table-bordered'>";	
				while($row = mysqli_fetch_assoc($res))
				{
					$d= date("Y-M-D");
					 if($d > $row ['return'])
					 {
						 $c = $c+1;
						 
						 $var = '<p style="color:yellow; background-color:red;" >Expired</p>';
						 mysqli_query($db, "UPDATE issue_books SET approve='$var' where `return`='$row[return]'
												and approve = 'YES' limit $c;");
					echo $d. "</br>";
					}
						
					
					echo"<tr >";
					echo"<td>"; echo $row['studentid'];			echo"</td>";
					echo"<td>"; echo $row['borrowerid']; 		echo"</td>";
					echo"<td>"; echo $row['bid']; 		echo"</td>";
					echo"<td>"; echo $row['name'];  	echo"</td>";
					echo"<td>"; echo $row['author'];  	echo"</td>";
					echo"<td>"; echo $row['edition'];  	echo"</td>";
					echo"<td>"; echo $row['issue'];  	echo"</td>";
					echo"<td>"; echo $row['return'];  	echo"</td>";
					echo"</tr>";
				}
					
					echo"</table>";
					echo "</div>";
					}
					else
					{
						?>			
					<h3 style="text-align:center;"> Login to see Information of Borrowed Books</h3>

						<?php
					}
					?>
				</div>
			</div>
		</body>
	</html>