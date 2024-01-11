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
                          padding-left: 70%;
                      }
                      body{
                          height:720px;
                          background-image:url("images/book_list.jpg");
                          background-size: 100% 1010px;
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
                      .container {
                           height: 750px;
                           background-color: black;
                           opacity: .8;
                           color: white;
                      }
                      .scroll {
                           width: 100%;
                           height: 500px;
                           overflow: auto;
                      }
                      th,td {
                            width: 10%;
                      }
                      td{
                            color:white;
                      }
                      .expired {
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
          <div class="container">
          <br>
            <h3 style="text-align: center;">Information of Books Returned or Expired </h3><br>
            <?php
              if(isset($_SESSION['login_user']))
              {
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

                
                <?php

            // }
        

              
                $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
                $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                
                if(isset($_POST['submit2']))
                {
                  
                    $sql="SELECT student.username,rollno,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' and issue_book.username ='$_SESSION[login_user]'  ORDER BY `issue_book`.`return` DESC";
                    $res=mysqli_query($db,$sql);
            

                }
                else if(isset($_POST['submit3']))
                {
                    $sql="SELECT student.username,rollno,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' and issue_book.username ='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
                    $res=mysqli_query($db,$sql);
                }
                else
                {
                    $sql="SELECT student.username,rollno,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes'  and issue_book.username ='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
                    $res=mysqli_query($db,$sql);
                }

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
              while($row=mysqli_fetch_assoc($res))
              {
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
            }
            else
            {
              ?>
                <h3 style="text-align: center;color:red">Login to see information of Books Returned or Expired</h3>
              <?php
            }
            ?>
          </div>
        </div>
        </body>
</html>