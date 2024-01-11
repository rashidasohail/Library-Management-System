<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
		<head>
				<title>Student Information</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<style type="text/css">
					.my-custom-scrollbar {
							position: relative;
							height: 350px;
							overflow: auto;
			        }
			       .table-wrapper-scroll-y {
			                display: block;
		         	}
					body{
							height:720px;
							background-image:url("images/book_list.jpg");
							background-size: 100%  800px;
							background-repeat: no-repeat;
						}
					.container{
							height: 600px;
							background-color: black;
							opacity: .8;
							color: white;
						}
					td{
							color:white;
						}
					.sidenav {
							height: 100%;
							margin-top: 105px;
							width: 0;
							position: fixed;
							z-index: 1;
							top: 0;
							left: 0;
							background-color: #222;
							overflow-x: hidden;
							transition: 0.5s;
							padding-top: 60px;
					}

					.sidenav a {
							padding: 8px 8px 8px 32px;
							text-decoration: none;
							font-size: 20px;
							color: #818181;
							display: block;
							transition: 0.3s;
					}

					.sidenav a:hover {
							color: white;
					}

					.sidenav .closebtn {
							position: absolute;
							top: 0;
							right: 25px;
							font-size: 36px;
							margin-left: 50px;
					}

					#main {
							transition: margin-left .5s;
							padding: 19px;
					}

					@media screen and (max-height: 450px) {
							.sidenav {padding-top: 15px;}
							.sidenav a {font-size: 18px;}
					}
					.h:hover{
							color:white;
							width: 300px;
							height: 50px;
							background-color:#b52020;
					}
					th{
							color:white;
					}

				</style>
		</head>
		<body>
					<!--_________________sidenav_______________-->
					
					<div id="mySidenav" class="sidenav">
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

							<div style="color: white; margin-left: 20px; font-size: 20px;">

								<?php
									if(isset($_SESSION['login_user'])){ 	
										echo "Welcome ".$_SESSION['login_user']; 
									}
								?>
							</div><br><br>

							<div class="h"> <a href="add.php">Add Books</a> </div> 
							<div class="h"> <a href="delete.php">Delete Books</a> </div> 
							<div class="h"> <a href="request.php">Book Request</a></div>
							<div class="h"> <a href="issue_info.php">Issue Information</a></div>
							<div class="h"><a href="expired.php">Books Returned/Expired</a></div>
					</div>

					<div id="main">
				
							<span style="font-size:30px;cursor:pointer;color:white" onclick="openNav()">&#9776;</span>

							<script>
									function openNav() {
									document.getElementById("mySidenav").style.width = "250px";
									document.getElementById("main").style.marginLeft = "250px";
									document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
									}

									function closeNav() {
									document.getElementById("mySidenav").style.width = "0";
									document.getElementById("main").style.marginLeft= "0";
									document.body.style.backgroundColor = "white";
									}
							</script>
					

					
				<div class="container">
						<br>
						<h2 style="text-align:center">Students Record</h2>
						</br>

						<!--__________________________search bar________________________-->
						<div class="srch">
									<form method="post" name="form1" >
											<div class="input-group mb-3">
												    <input class="form-control" type="text" name="search" placeholder="Student username.." required="" style="width:200px">
													<div class="input-group-append">
														<button style="background-color:#b52020;color:white" type="submit" name="submit" class="btn btn-default">
														<i class="fa fa-search"></i>
														</button>
													</div>
											</div>
									</form>
								
							</div>
								
							<div class="table-wrapper-scroll-y my-custom-scrollbar">
								
							     <?php

								        if(isset($_POST['submit'])){
												$q=mysqli_query($db,"SELECT firstname,lastname,username,rollno,email,phone FROM `student` where username like '%$_POST[search]%' ");

												if(mysqli_num_rows($q)==0){
													echo "Sorry! No student found with that username. Try searching again.";
												}
												else{
														echo "<table class='table table-bordered' >";
														echo "<tr style='background-color: #b52020;'>";
															//Table header
														echo "<th>"; echo "First Name";	echo "</th>";
														echo "<th>"; echo "Last Name";  echo "</th>";
														echo "<th>"; echo "Username";  echo "</th>";
														echo "<th>"; echo "Roll No";  echo "</th>";
														echo "<th>"; echo "Email";  echo "</th>";
														echo "<th>"; echo "Contact";  echo "</th>";
														
														echo "</tr>";	
									
														while($row=mysqli_fetch_assoc($q)){
															echo "<tr>";
															echo "<td>"; echo $row['firstname']; echo "</td>";
															echo "<td>"; echo $row['lastname']; echo "</td>";
															echo "<td>"; echo $row['username']; echo "</td>";
															echo "<td>"; echo $row['rollno']; echo "</td>";
															echo "<td>"; echo $row['email']; echo "</td>";
															echo "<td>"; echo $row['phone']; echo "</td>";

															echo "</tr>";
														}
														echo "</table>";
									            }
							        	}
									
								        else{
												$res=mysqli_query($db,"SELECT firstname,lastname,username,rollno,email,phone FROM `student`;");

												echo "<table class='table table-bordered table-hover' >";
												echo "<tr style='background-color: #b52020;'>";
												//Table header
												echo "<th>"; echo "First Name";	echo "</th>";
												echo "<th>"; echo "Last Name";  echo "</th>";
												echo "<th>"; echo "Username";  echo "</th>";
												echo "<th>"; echo "Roll No";  echo "</th>";
												echo "<th>"; echo "Email";  echo "</th>";
												echo "<th>"; echo "Contact";  echo "</th>";
												echo "</tr>";	

												while($row=mysqli_fetch_assoc($res)){
														echo "<tr>";
														
														echo "<td>"; echo $row['firstname']; echo "</td>";
														echo "<td>"; echo $row['lastname']; echo "</td>";
														echo "<td>"; echo $row['username']; echo "</td>";
														echo "<td>"; echo $row['rollno']; echo "</td>";
														echo "<td>"; echo $row['email']; echo "</td>";
														echo "<td>"; echo $row['phone']; echo "</td>";

														echo "</tr>";
												}
											    echo "</table>";
								        }

							    ?>
					       </div>
				</div>
		</body>
</html>