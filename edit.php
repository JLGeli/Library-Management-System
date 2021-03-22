<?php
	include "navbar.php";
	include "connection.php"
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Edit Profile</title>
		<style type="text/css">
		.form-control
		{
			width:260px;
			height: 38px;
		}
		form
		{
			padding-left: 680px;
		}
		</style>
	</head>
	<body	style="background-color: skyblue;">
		<h2 style="text-align: center; color:#fff;">Edit Information</h2>
			<?php
				$sql="SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
				$result = mysqli_query($db,$sql) or die (mysql_error());

				while($row = mysqli_fetch_assoc($result))
				{
					$lastname=$row['lastname'];
					$firstname=$row['firstname'];
					$middlename=$row['middlename'];
					$username=$row['username'];
					$password=$row['password'];
					$contact=$row['contact'];
				}
			
			?>
		<div class="profile_info" style="text-align: center;">
			<span style="color: white; "> Welcome</span>
				<h4 style="color:white;"> <?php echo $_SESSION['login_user'];?></h4>	
		<br><br>
		</div>
			<form  action="" method="post" enctype="multipart/form-data">
				<label><h4><b>Lastname: </b></h4><label>
				<input class="form-control" type="text" name="lastname" placeholder="lastname" value="<?php echo $lastname;?>"><br>
				<label><h4><b>Firstname: </b></h4><label>
				<input class="form-control" type="text" name="firstname" placeholder="Firstname" value="<?php echo $firstname;?>"><br>
				<label><h4><b>Middlename: </b></h4><label>
				<input class="form-control" type="text" name="middlename" placeholder="middlename" value="<?php echo $middlename;?>"><br>
				<label><h4><b>Username: </b></h4><label>
				<input class="form-control" type="text" name="username" placeholder="username" value="<?php echo $username;?>"><br>
				<label><h4><b>Password: </b></h4><label>
				<input class="form-control" type="text" name="password" placeholder="password" value="<?php echo $password;?>"><br>
				<label><h4><b>Contact: </b></h4><label>
				<input class="form-control" type="text" name="contact" placeholder="contact" value="<?php echo $contact;?>"><br>
				
					<div style="padding-left: 100px;">
				<button class="btn btn-default" type="submit" name="submit">Save</button>
					</div>
			<form>	
		
		<?php
			
			if(isset($_POST['submit']))
			{
					$lastname = $_POST['lastname'];
					$firstname = $_POST['firstname'];
					$middlename =  $_POST['middlename'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					$contact = $_POST['contact']; 
					
					$sql1="UPDATE admin SET lastname='$lastname', firstname='$firstname', middlename='$middlename', username='$username', password='$password',
							contact='$contact' WHERE username='".$_SESSION['login_user']."';";
					if(mysqli_query($db,$sql1))
					{
						?>
							<script type="text/javascript">
								alert("saved successfully.");
							</script>
						<?php
					}
			}
		?>
	</body>
</html>