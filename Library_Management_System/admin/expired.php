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
                                  background-size: 100%  1200px;
                                  background-repeat: no-repeat;
                              }
                            .srch{
                                  padding-left: 70%; 
                            }
                            .my-custom-scrollbar {
                                  position: relative;
                                  height: 500px;
                                  overflow: auto;
                            }
                            .table-wrapper-scroll-y {
                                  display: block;
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
                                   margin-top:-40px;
                                   height: 800px;
                                   background-color: black;
                                   opacity: .8;
                                   color: white;
                              }
                              .scroll{
                                   width: 100%;
                                   height: 500px;
                                   overflow: auto;
                              }
                              th,td{
                                    width: 10%;
                               }
                              td{
                                   color:white;
                              }
                              .expired{
                                    margin-left: -330px;
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
                                              if(isset($_SESSION['login_user'])) { 	
                                                  echo "Welcome ".$_SESSION['login_user']; 
                                              }
                                          ?>    
                                </div>
                                <br><br>

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
                                                        <h3 style="text-align: center;">Information of Books Returned or Expired </h3><br>
                                                        <?php
                                                                 if(isset($_SESSION['login_user'])){
                                                        ?>

                                                                          <div style="float: right; padding: 25px;">
                                                                                  <form method="post" action="">
                                                                                      <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;width:120px;">RETURNED</button> 
                                                                                                  &nbsp&nbsp
                                                                                                  <br>
                                                                                                  <br>
                                                                                      <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;width:120px;">EXPIRED</button>
                                                                                  </form>
                                                                          </div>

                                                                          <div class="srch" >
                                                                                  <br>
                                                                                  <form class="expired" method="post" action="" name="form1">
                                                                                          <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
                                                                                          <input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
                                                                                          <button class="btn btn-dark" name="submit" type="submit" style="margin-left:105px;">Return Book</button><br><br>
                                                                                  </form>
                                                                          </div>
                                                        <?php

                                                                          if(isset($_POST['submit'])) {

                                                                                  $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
                                                                                  $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';
                                                                                  $var2=date("Y/m/d");
                                                                                  mysqli_query($db,"UPDATE issue_book SET approve='$var1', `return` ='$var2' where username='$_POST[username]' and bid='$_POST[bid]' ");

                                                                                  mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
                                                                          }
                                                                }
                                                     
                                                                $c=0;
                                                                
                                                                $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
                                                                $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                                                                  
                                                                if(isset($_POST['submit2'])){
                                            
                                                                            $sql="SELECT student.username,rollno,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' ORDER BY `issue_book`.`return` DESC";
                                                                            $res=mysqli_query($db,$sql);

                                                                }
                                                                else if(isset($_POST['submit3'])){
                                                                            $sql="SELECT student.username,rollno,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' ORDER BY `issue_book`.`return` DESC";
                                                                            $res=mysqli_query($db,$sql);
                                                                }
                                                                else{
                                                                            $sql="SELECT student.username,rollno,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` DESC";
                                                                            $res=mysqli_query($db,$sql);
                                                                }
                                                         ?>
                                                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                                                <?php
                                                                echo "<table class='table table-bordered' style='width:100%;' >";
                                                                //Table header
                                                                
                                                                echo "<tr style='background-color: #b52020;'>";
                                                                echo "<th>"; echo "Username";  echo "</th>";
                                                                echo "<th>"; echo "Roll No";  echo "</th>";
                                                                echo "<th>"; echo "BID";  echo "</th>";
                                                                echo "<th>"; echo "Book Name";  echo "</th>";
                                                                echo "<th>"; echo "Authors Name";  echo "</th>";
                                                                echo "<th>"; echo "Edition";  echo "</th>";
                                                                echo "<th>"; echo "Status";  echo "</th>";
                                                                echo "<th>"; echo "Issue Date";  echo "</th>";
                                                                echo "<th>"; echo "Return Date";  echo "</th>";

                                                                echo "</tr>"; 
                                                                echo "</table>";

                                                                echo "<div class='scroll'>";
                                                                echo "<table class='table table-bordered' >";
                                                              
                                                                while($row=mysqli_fetch_assoc($res)){
                                                                    echo "<tr>";
                                                                    echo "<td>"; echo $row['username']; echo "</td>";
                                                                    echo "<td>"; echo $row['rollno']; echo "</td>";
                                                                    echo "<td>"; echo $row['bid']; echo "</td>";
                                                                    echo "<td>"; echo $row['name']; echo "</td>";
                                                                    echo "<td>"; echo $row['authors']; echo "</td>";
                                                                    echo "<td>"; echo $row['edition']; echo "</td>";
                                                                    echo "<td>"; echo $row['approve']; echo "</td>";
                                                                    echo "<td>"; echo $row['issue']; echo "</td>";
                                                                    echo "<td>"; echo $row['return']; echo "</td>";
                                                                   echo "</tr>";
                                                                }
                                                                 echo "</table>";
                                                                 echo "</div>";

                                                        ?>
                                    </div>
                      </div>
            </body>
</html>