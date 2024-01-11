<?php 
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
		<head>
				<title>Change Password</title>

				<style type="text/css">
						body{
							height: 650px;
							background-image:url("images/login.jpg");
							background-repeat: no-repeat;
						}
						.wrapper{
							width: 400px;
							height: 400px;
							margin:100px auto;
							background-color: black;
							opacity: .8;
							color: white;
							padding: 27px 15px;
						}
						.form-control{
							width: 300px;
						}
						form .btn-default{
							border-color: #e7e7e7;
							background-color:black;
							color:gray;
							width:90px;
							height:35px;
							float:right;
							margin-right:150px;
							font-weight: bold; 
						}
				</style>
		</head>
		<body>
				<div class="wrapper">
						<div style="text-align: center;">
							<h2 style="text-align: center;">Change Your Password</h2><br>
						</div>
						<div style="padding-left: 30px; ">
							<form action="" method="post" >
								<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
								<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
								<input type="password" name="password" class="form-control" placeholder="New Password" required=""><br>
								<button class="btn btn-default" type="submit" name="submit" >Update</button>
							</form>
				        </div>
				
						<?php

							if(isset($_POST['submit'])){
								if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]' ;")){
						?>
										<script type="text/javascript">
									                 alert("The Password Updated Successfully.");
								        </script> 

						<?php
								}
								
							}
						?>
				</div>
		</body>
</html>