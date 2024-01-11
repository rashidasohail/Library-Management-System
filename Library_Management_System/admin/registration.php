<?php
     include "connection.php";
     include "navbar.php";
?>
<!DOCTYPE html>
<html>
		<head>
				<title>Admin Registration</title>
				<link rel="stylesheet" type="text/css" href="style.css">
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1"> 
				
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</head>

		<body>
				<div class="student_registration">
					<section>
							    	<br>
									<div class="box2" style="height:550px">
											
											<h1>Registration Form</h1>
											<form name="login" action="" method="post">	
													<div class="login">
															<input class="form-control" type="text" name="firstname" placeholder="First Name" required=""> <br>
															<input class="form-control" type="text" name="lastname" placeholder="Last Name" required=""> <br>
															<input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
															<input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
															<input class="form-control" type="email" name="email" placeholder="Email" required=""><br>
															<input class="form-control" type="tel" name="phone" placeholder="Phone No" required=""><br>
															<input class="btn btn-default" type="submit" name="submit" value="Register">
													</div>
											</form>
		
									</div>
							
					</section>
		    	</div>
				
				<?php

							if(isset($_POST['submit'])){
									$count=0;
									$sql="SELECT username from `admin`";
									$res=mysqli_query($db,$sql);

									while($row=mysqli_fetch_assoc($res)){
											if($row['username']==$_POST['username']){
													$count=$count+1;
											}
								    }
									if($count==0){
											mysqli_query($db,"INSERT INTO ADMIN VALUES('', '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[phone]');");
				?>
											<script type="text/javascript">
												alert("Registered successfully");
											</script>
				<?php
									}
							        else{
				?>
											<script type="text/javascript">
											   alert("This username already exist.");
											</script>
				<?php

							       }

						    }

				?>
		</body>

</html>
