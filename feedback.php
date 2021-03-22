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
			body
			{
				background-image: url("images/12.jpg");
				 background-repeat: no-repeat;
  				background-size: 1600px 850px;
			}
			.wrapper
			{
				padding: 10px;
				margin: -20px auto;
				width:900px;
				height:650px;
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
			</style>
	</head>
	<body>
		<div class="wrapper">
			<h4>If you have any suggestion or question please comment below.</h4>
			<form style="" action="" method="post">
				<input class="form-control" type="text" name="comment" placeholder="write something"><br>
				<input class="btn btn-default"type="submit" name="submit" value="comment" style="width: 150px; height:30px;">
			</form>
		<br><br>
		<div class="scroll">
			<?php
				if(isset($_POST['submit']))
				{
					$sql="INSERT INTO `comment` VALUES('','$_POST[comment]');";
					if (mysqli_query($db,$sql))
					{ 
						$q="SELECT * FROM `comment` ORDER BY `comment`.`id` DESC";
						$res=mysqli_query($db,$q);
						echo "<table class='table table-bordered'>";
						while ($row = mysqli_fetch_assoc($res))
						{
							echo "<tr>";
								echo "<td>"; echo $row['comment']; echo"</td>";
							echo "</tr>";
						}
					}
				}
					else
					{
							$q="SELECT * FROM `comment` ORDER BY `comment` . `id` ";
						$res=mysqli_query($db,$q);
						echo "<table class='table table-bordered'>";
						while ($row = mysqli_fetch_assoc($res))
						{
							echo "<tr>";
							echo "<td>"; echo $row['comment']; echo"</td>";
							echo "</tr>";
						}
					}
				?>
		</div>
		</div>
	</body>
</html>