<?php
	 session_start();
?>
<!DOCTYPE html>
<html>
		<head>
					<title>Library Management System</title>
					<link rel="stylesheet" type="text/css" href="style.css">
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					
				    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</head>

		<body>
					<div class="wrapper">
							<?php
									if(isset($_SESSION['login_user'])){
							?>
											<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
														<div class="container-fluid">
															<div class="navbar-header">
																<img src="images/logo.png">
																<a class="navbar-brand active">LIBRARY MANAGEMENT SYSTEM</a>
															</div>
															
															<ul class="nav navbar-nav">
																<li class="nav-item"><a class="nav-link"  href="index.php">HOME</a></li>
																<li class="nav-item"><a class="nav-link"  href="books.php">BOOKS</a></li>
																<li class="nav-item"><a class="nav-link"  href="logout.php">LOGOUT</a></li>
																<li class="nav-item"><a class="nav-link"  href="help.php">HELP</a></li>
															</ul>

														</div>
											</nav>
							<?php
									}
									else{
							?>
											<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
													<div class="container-fluid">
															<div class="navbar-header">
																<img src="images/logo.png">
																<a class="navbar-brand active">LIBRARY MANAGEMENT SYSTEM</a>
															</div>
															
															<ul class="nav navbar-nav">
																<li class="nav-item"><a class="nav-link"  href="index.php">HOME</a></li>
																<li class="nav-item"><a class="nav-link"  href="books.php">BOOKS</a></li>
																<li class="nav-item"><a class="nav-link"  href="admin_login.php">LOGIN</a></li>
																<li class="nav-item"><a class="nav-link"  href="help.php">HELP</a></li>
															</ul>

													</div>
											</nav>
							<?php
									}
									
							?>

							<section >	
										<div class="sec_img">
												<br>
												<div class="container-fluid box">
													<br><br><br>
													<h1 style="text-align: center; font-size: 50px; text-transform:uppercase;">Welcome to our Library</h1><br><br>
													<h1 style="text-align: center;font-size: 25px;">We stand behind your success</h1><br>
												</div>
										</div>
							</section>
								
							<footer>
									<div class="container-fluid">
											<p style="color:white;  text-align: center;">	
													Email:&nbsp library@gmail.com <br>
													Mobile:&nbsp &nbsp 022-3028399
											</p>
									</div>
							</footer>
						
					</div>
		</body>

</html>
