<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
      <title>
	  </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                             <div class="container-fluid">
							  <div class="navbar-header">
							    <img src="images/logo.png">
								<a class="navbar-brand active">LIBRARY MANAGEMENT SYSTEM</a>
							  </div>
                              <?php
							      if(isset($_SESSION['login_user'])){
									  ?>
									     	<div style="color: white">
											<?php	
												echo "WELCOME ".$_SESSION['login_user']; 
											?>
                                            </div>
									
                                      <?php
								  }
							 ?>
							 
							  <ul class="nav navbar-nav">
								<li class="nav-item"><a class="nav-link"  href="index.php">HOME</a></li>
								<li class="nav-item"><a class="nav-link"  href="books.php">BOOKS</a></li>
								<li class="nav-item"><a class="nav-link"  href="help.php">HELP</a></li>

								
							  <?php
							      if(isset($_SESSION['login_user'])){
									  ?>
										<ul class="nav navbar-nav">
										      <li  class="nav-item"><a class="nav-link" href="profile.php"><span>PROFILE</span></a></li>           
										</ul>
									<li class="nav-item"><a class="nav-link" href="logout.php"><span> LOGOUT</span></a></li>
                                    <?php
								  }
								  else{
									  ?>
                                        <li class="nav-item"><a class="nav-link" href="student_login.php"><span> LOGIN</span></a></li>
									  <?php
								  }
							  ?>
							  
							  </ul>

		                </div>
                 </nav>
				
</body>
</html>