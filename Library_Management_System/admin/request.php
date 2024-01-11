<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
		<head>
				<title>Book Request</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<style type="text/css">

					.srch{
							padding-left: 400px;
					}
					.my-custom-scrollbar {				
							position: relative;
							height: 450px;
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
					.form-control{
							width: 300px;
							height: 40px;
							background-color: black;
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

					.container{
							margin-top:-20px;
							height: 600px;
							background-color: black;
							opacity: .8;
							color: white;
					}
					td{
						color: white;
					}
					th{
						color: white;
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
				        <br>

						<div class="container">
								<br>
								<h3 style="text-align: center;">Books Request</h3>
								<div class="table-wrapper-scroll-y my-custom-scrollbar">
										<div class="srch">
											<br>
											<form method="post" action="" name="form1">
												<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
												<input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
												<button class="btn btn-dark" name="submit" type="submit" style="margin-left:105px;">Submit</button><br>
											</form>
										</div>
								        <br>
								
								        <?php
								
											if(isset($_SESSION['login_user'])){

													$sql= "SELECT student.username,rollno,books.bid,name,authors,edition,status FROM student 
													inner join issue_book ON student.username=issue_book.username 
													inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
													$res= mysqli_query($db,$sql);

													if(mysqli_num_rows($res)==0){
															echo "<h2 style=text-align:center><b>";
															echo "There's no pending request.";
															echo "</h2></b>";
													}
													else{
															echo "<table class='table table-bordered' >";
															echo "<tr style='background-color:#b52020;'>";
																//Table header
																
															echo "<th>"; echo "Username";  echo "</th>";
															echo "<th>"; echo "Roll No";  echo "</th>";
															echo "<th>"; echo "BID";  echo "</th>";
															echo "<th>"; echo "Book Name";  echo "</th>";
															echo "<th>"; echo "Authors Name";  echo "</th>";
															echo "<th>"; echo "Edition";  echo "</th>";
															echo "<th>"; echo "Status";  echo "</th>";
														
															echo "</tr>";	

															while($row=mysqli_fetch_assoc($res)){
																	echo "<tr>";
																	echo "<td>"; echo $row['username']; echo "</td>";
																	echo "<td>"; echo $row['rollno']; echo "</td>";
																	echo "<td>"; echo $row['bid']; echo "</td>";
																	echo "<td>"; echo $row['name']; echo "</td>";
																	echo "<td>"; echo $row['authors']; echo "</td>";
																	echo "<td>"; echo $row['edition']; echo "</td>";
																	echo "<td>"; echo $row['status']; echo "</td>";
																	
																	echo "</tr>";
															}
															echo "</table>";
													}
											}
											else{
									    ?>
									            <br>
										        <h4 style="text-align: center;color: red;">You need to login to see the request.</h4>
								</div>	
								<?php
								                }

								if(isset($_POST['submit'])){
										$_SESSION['name']=$_POST['username'];
										$_SESSION['bid']=$_POST['bid'];

								?>
											<script type="text/javascript">
												window.location="approve.php"
											</script>
								<?php
								}
								 ?>
							
						</div>
			    </div>
		</body>
</html>