<?php 
		include "connection.php";
		include "navbar.php";
?>
<!DOCTYPE html>
<html>
		<head>
			<title>Change Password</title>	

			<style type="text/css">
				body
				{
					
					height: 350px;
					
					background-image: url("images/5.jpg");
					background-repeat: no-repeat;
				}
				.wrapper
				{
					width: 400px;
					height: 400px;
					margin: 100px auto;
					background-color: black;
					opacity: .8;
					color: white;
					padding: 27px;
				}
				.form-control
				{
					width: 300px;
				}
			</style>
		</head>
	<body>
			<div class="wrapper">
				<div style="text-align:center;">
					<h1 style="text-align: center; font-size: 20px; font-family:Arial;">Change Password</h1>
				</div>
				<div style="padding-left:10px">
				<form action="" method="post">
					<input type="text" name="username" class="form-control" placeholder="username" required=""><br>
					<input type="text" name="contact" class="form-control" placeholder="contact" required=""><br>
					<input type="password" name="password" class="form-control" placeholder=" new password" required=""><br>
					<button class="btn btn-default" type="submit" name="submit">Update</button>
				
				</form>
			</div>
		</div>
			<?php
				if(isset($_POST['submit']))
				{
					if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE 
								username='$_POST[username]' AND contact='$_POST[contact]';"));
					{
						?>
							<script type="text/javascript">
						alert("The password updated successfully");
							</script>
						<?php
					}
				}
				
			
			?>
	</body>
</html>