<?php 
	include "connection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
		<head>
					<title>Profile</title>
					<style type="text/css">
							.container{
								width: 500px;
								margin: 0 auto;
								color: white;
								background-color:black;
								opacity: .8;
							}
							th,td{
								color:white;
							}
							body{
								height:500px;
								background-image:url("images/profile.jpg");
								background-size: 100% 1010px;
								background-repeat: no-repeat;
							}
					</style>
		</head>
		<body>
		        <br>
				<div class="container">
					    <br>
						<div class="pro_wrapper">
										<?php 
											$q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[login_user]';");
										?>
									
										<h2 style="text-align: center;">PROFILE</h2>

										<?php
										$row=mysqli_fetch_assoc($q);
							
									    ?>
										<div style="text-align: center;"> <b>Welcome </b>
											<h4>
												<?php echo $_SESSION['login_user']; ?>
											</h4>
										</div>
										<?php
										
											echo "<b>";
											echo "<table class='table table-bordered'>";
												echo "<tr>";
													echo "<td>";
														echo "<b> First Name: </b>";
													echo "</td>";

													echo "<td>";
														echo $row['firstname'];
													echo "</td>";
												echo "</tr>";

												echo "<tr>";
													echo "<td>";
														echo "<b> Last Name: </b>";
													echo "</td>";
													echo "<td>";
														echo $row['lastname'];
													echo "</td>";
												echo "</tr>";

												echo "<tr>";
													echo "<td>";
														echo "<b> User Name: </b>";
													echo "</td>";
													echo "<td>";
														echo $row['username'];
													echo "</td>";
												echo "</tr>";

												echo "<tr>";
													echo "<td>";
														echo "<b> Password: </b>";
													echo "</td>";
													echo "<td>";
														echo $row['password'];
													echo "</td>";
												echo "</tr>";

												echo "<tr>";
													echo "<td>";
														echo "<b> Email: </b>";	
													echo "</td>";
													echo "<td>";
														echo $row['email'];
													echo "</td>";
												echo "</tr>";

												echo "<tr>";
													echo "<td>";
														echo "<b> Contact: </b>";
													echo "</td>";
													echo "<td>";
														echo $row['phone'];
													echo "</td>";
												echo "</tr>";

												
											echo "</table>";
											echo "</b>";
										?>
									<br>
						</div>
				</div>
		</body>
 </html>