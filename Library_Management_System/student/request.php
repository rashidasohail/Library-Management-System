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
	
		body{
				height:720px;
				background-image:url("images/book_list.jpg");
				background-size: 100%  800px;
				background-repeat: no-repeat;
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
			.container
            {
                height: 600px;
                background-color: black;
                opacity: .8;
                color: white;
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
                if(isset($_SESSION['login_user']))

                { 	
                    echo "Welcome ".$_SESSION['login_user']; 
                }
            ?>
        </div><br><br>

		<div class="h"><a href="books.php">Books</a></div>
		<div class="h"><a href="request.php">Book Request</a></div>
		<div class="h"><a href="issue_info.php">Issue Information</a></div>
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
				<h2 style="text-align:center">Books Request</h2>
				<br>
				<div class="srch">
					<form method="post" name="form1" >
							<div class="input-group mb-3">
							<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
								<div class="input-group-append">
								<button style="background-color: #b52020;color:white;" type="submit" name="submit1" class="btn btn-default">
								<i class="fa fa-book"></i>	
								</button>
								</div>
							</div>
					</form>
                </div>
				
				<?php
				if(isset($_SESSION['login_user']))
					{   
						
						$q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' and approve='' ;");

						if(mysqli_num_rows($q)==0)
						{
							echo "<h2 style=text-align:center><b>";
							echo "There's no pending request";
							echo "</h2></b>";
						}
						else
						{
					echo "<table class='table table-bordered table-hover' >";
						echo "<tr style='background-color: #b52020;'>";
							//Table header
							
							echo "<th>"; echo "Book-ID";  echo "</th>";
							echo "<th>"; echo "Approve Status";  echo "</th>";
							echo "<th>"; echo "Issue Date";  echo "</th>";
							echo "<th>"; echo "Return Date";  echo "</th>";
							
						echo "</tr>";	

						while($row=mysqli_fetch_assoc($q))
						{
							echo "<tr>";
							echo "<td>"; echo $row['bid']; echo "</td>";
							echo "<td>"; echo $row['approve']; echo "</td>";
							echo "<td>"; echo $row['issue']; echo "</td>";
							echo "<td>"; echo $row['return']; echo "</td>";
							
							echo "</tr>";
						}
					echo "</table>";
						}
					}
				else{
						echo "</br></br></br>"; 
						echo "<h3 style=text-align:center;color:red><b>";
						echo "Please login first to see the request information.";
						echo "</b></h3>";
					}

					if(isset($_POST['submit1']))
					{
						if(isset($_SESSION['login_user']))
						{
							mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
							?>
								<script type="text/javascript">
									window.location="request.php"
								</script>
							<?php
						}
						else
						{
							?>
								<script type="text/javascript">
									alert("You must login to Request a book");
								</script>
							<?php
						}
					}
		      ?>
	  </div>
 </div>
</body>
</html>