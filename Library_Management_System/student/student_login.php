<?php
     include "connection.php";
	 include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	
	<style>
	       
	</style>
</head>

<body>
    <div class="student_login">
             
     <section>
              
                    <br>
                    <div class="box1">
                            <br>
                            <h1>Login Form</h1><br>
                            <form name="login" action="" method="post">
                                  <div class="login">
                                       <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                                       <input class="form-control" type="password" name="password" placeholder="Password" required="">
									   <p style="color: black; padding-left: 5px;">
									          <a style="color:black;text-decoration:none;" href="update_password.php">Forgot password?</a>
										</p>
                                       <input class="btn btn-default" type="submit" name="submit" value="Login">
								   </div>
                                   <p style="color: black; padding-left: 110px;">
                                      <br><br>
                                      Don't have account?<a style="color: black;text-decoration:none;" href="registration.php">Sign Up</a>
                                   </p>
							</form>
                    </div>
             
     </section>
	 
	 <?php

			if(isset($_POST['submit'])){
				  $count=0;
				  $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
				  
				  $row= mysqli_fetch_assoc($res);
				  $count=mysqli_num_rows($res);

				  if($count==0){
					?>
					  <div class="alert alert-danger" style="width: 420px; margin-left: 464px; background-color: #de1313; color: white; text-align: center;">
						<strong>The username and password doesn't match</strong>
					  </div>    
					<?php
				  }
				  else{
					$_SESSION['login_user'] = $_POST['username'];

					?>
					 <script type="text/javascript">
						window.location="index.php"
					  </script>
					<?php
				  }
			}

  ?>
</div>
</body>

</html>
