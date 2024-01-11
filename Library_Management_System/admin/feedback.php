<?php
 include "connection.php";
 include "navbar.php";
?>
<!DOCTYPE html>
<html>
		<head>
				<title>Feedback</title>
				<link rel="stylesheet" type="text/css" href="style.css">
				<style type="text/css">
						body{
							background-image: url("images/");
							background-repeat:no-repeat;
							
						}
						.feedback_wrapper{
							padding: 10px;
							margin: 30px auto;
							width:900px;
							height: 500px;
							background-color: black;
							opacity: .8;
							color: white;
						}
						.form-control{
							height: 90px;
							width: 100%;
						}
						.scroll{
							width: 100%;
							height: 300px;
							overflow: auto;
						}
						td{
							color:white;
						}

				</style>
		</head>

		<body>

				<div class="feedback_wrapper">
						    <br>
							<h4>If you have any suggesions or questions please comment below.</h4>
							<br>
							<form style="" action="" method="post">
								<input class="form-control" type="text" name="comment" placeholder="Write something..."><br><br>	
								<input class="btn btn-dark" type="submit" name="submit" value="Comment" style="width: 100px; height: 40px; display: block;margin: 0 auto;">		
							</form>
				
		                	<br><br>

							<div class="scroll">
									<?php
											if(isset($_POST['submit'])){
												$sql="INSERT INTO `comments` VALUES('','Admin','$_POST[comment]');";
												if(mysqli_query($db,$sql)){
													$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
													$res=mysqli_query($db,$q);

													echo "<table class='table table-bordered'>";
													while ($row=mysqli_fetch_assoc($res)){
															echo "<tr>";
															echo "<td>"; echo $row['username']; echo "</td>";
															echo "<td>"; echo $row['comment']; echo "</td>";
															echo "</tr>";
													}
												}

											}

											else{
												$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
												$res=mysqli_query($db,$q);

												echo "<table class='table table-bordered'>";
												while ($row=mysqli_fetch_assoc($res)){
															echo "<tr>";
															echo "<td>"; echo $row['username']; echo "</td>";
															echo "<td>"; echo $row['comment']; echo "</td>";
															echo "</tr>";
												}
											}
									?>
				            </div>
				</div>
		</body>
</html>