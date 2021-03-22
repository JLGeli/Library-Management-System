<?php
	include "connection.php";
	include "navbar.php"
?>

<!DOCTYPE html>
<html>
		<head>
			<title> Profile </title>
				<style type="text/css">
					.wrapper
					{
						width:300px;
						margin: 0 auto;
						color: black;
					}
				</style>
		</head>
	<body style="background-color: skyblue;">
		<div class="container">
			<form action="" method="post">
				<button class="btn btn-default" style="float: right; width:50px;" name="submit1" type="submit">Edit</button>
			</form>
			<div class="wrapper">
			<?php
				if(isset($_POST['submit1']))
				{
					?>
					<script type="text/javascript">
					window.location="edit.php"
					</script>
					<?php
				}
				
				$q= mysqli_query($db, "SELECT * FROM admin where username='$_SESSION[login_user]';");
				
				?>
					<h2 style="text-align: center;">My profile</h2>
					<?php
						$row=mysqli_fetch_assoc($q);
						
						echo "<div style='text-align: center'>
						<img class='img-circle profile_img' height=100 width=100 src='images/".$_SESSION['pic']."'>
						</div>";
					?>
				<br>	<div style="text-align: center;"><b> Welcome</b>
					<h4>
						<?php
							echo $_SESSION['login_user'];
						?>
					</h4>
				</div>
					<?php
						echo "<b>";
						echo "<table class='table table-bordered'>";
							echo "<tr>";
								echo "<td>";
									echo "<b>Last name: </b>";
								echo "</td>";
								
								echo "<td>";
									echo $row['lastname'];
								echo "</td>";
							echo "</tr>";
							
							echo "<tr>";
								echo "<td>";
									echo "<b>First name: </b>";
								echo "</td>";
								echo "<td>";
									echo $row['firstname'];
								echo "</td>";
							echo "</tr>";
							
							echo "<tr>";
								echo "<td>";
									echo "<b>Middle name: </b>";
								echo "</td>";
									
								echo "<td>";
									echo $row['middlename'];
								echo "</td>";						
							echo "</tr>";
							
							echo "<tr>";	
								echo "<td>";
									echo "<b>Username:</b>";
								echo "</td>";
									
								echo "<td>";
									echo $row['username'];
								echo "</td>";
							echo "</tr>";
							
							echo "<tr>";	
								echo "<td>";
									echo "<b>Password:</b>";
								echo "</td>";
								echo "<td>";
									echo $row['password'];
								echo "</td>";
							echo "</tr>";
							
							echo "<tr>";	
								echo "<td>";
									echo "<b>Contact:</b>";
								echo "</td>";
								echo "<td>";
									echo $row['contact'];
								echo "</td>";
							echo "</tr>";
							
						echo "</table>";
						echo "</b>"
					?>
			</div>
		</div>
	</body>
</html>