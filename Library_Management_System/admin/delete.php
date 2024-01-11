<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
			<head>
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<title>Books</title>
					<style type="text/css">
							.my-custom-scrollbar {
									position: relative;
									height: 400px;
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
									margin-top:-18px;
									height: 600px;
									background-color: black;
									opacity: .8;
									color: white;
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
							td{
									color:white;
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
					
								<span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776;</span>

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
										<h2 style="text-align:center">List Of Books</h2>
										<br>
										<!--___________________search bar________________________-->
										<div class="srch">
											<form method="post" name="form1" >
													<div class="input-group mb-3">
													<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
														<div class="input-group-append">
														<button style="background-color: #b52020;" type="submit" name="submit1" class="btn btn-default">
															<i class="fa fa-trash" style="color:white"></i>
														</button>
														</div>
													</div>
											</form>
										
										</div>

										<div class="table-wrapper-scroll-y my-custom-scrollbar">
													<?php

															$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

															echo "<table class='table table-bordered table-hover' >";
															echo "<tr style='background-color: #b52020;'>";
																	//Table header
															echo "<th>"; echo "ID";	echo "</th>";
															echo "<th>"; echo "Book-Name";  echo "</th>";
															echo "<th>"; echo "Authors Name";  echo "</th>";
															echo "<th>"; echo "Edition";  echo "</th>";
															echo "<th>"; echo "Status";  echo "</th>";
															echo "<th>"; echo "Quantity";  echo "</th>";
															echo "<th>"; echo "Department";  echo "</th>";
															echo "</tr>";	

															while($row=mysqli_fetch_assoc($res)){
																	echo "<tr>";
																	echo "<td>"; echo $row['bid']; echo "</td>";
																	echo "<td>"; echo $row['name']; echo "</td>";
																	echo "<td>"; echo $row['authors']; echo "</td>";
																	echo "<td>"; echo $row['edition']; echo "</td>";
																	echo "<td>"; echo $row['status']; echo "</td>";
																	echo "<td>"; echo $row['quantity']; echo "</td>";
																	echo "<td>"; echo $row['department']; echo "</td>";

																	echo "</tr>";
															}
															echo "</table>";
															if(isset($_POST['submit1'])){
																	if(isset($_SESSION['login_user'])){
																			mysqli_query($db,"DELETE from books where bid = '$_POST[bid]'; ");
													?>
																			<script type="text/javascript">
																				alert("Delete Successful.");
																			</script>
													<?php
													     			}
															        else{
													?>
																			<script type="text/javascript">
																				alert("Please Login First.");
																			</script>
													<?php
															        }
													     	}
														
												    ?>
										</div>

						        </div>
			         	</div>
			</body>
</html>