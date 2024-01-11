<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
  <html>
        <head>
              <title>Books</title>
              <meta name="viewport" content="width=device-width, initial-scale=1">

              <style type="text/css">
                    .srch{
                            padding-left: 1000px;
                                  
                    }
                
                    body{
                            height:720px;
                            background-image:url("images/book_list.jpg");
                            background-size: 100%  800px;
                            background-repeat: no-repeat;
                    }
                    .container{   
                            margin-top:-30px;
                            height: 600px;
                            background-color: black;
                            text-align: center;
                            opacity: .8;
                            color: white;
                            width:600px;
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

                    .book{
                            width: 400px;
                            margin: 0px auto;
                    }
                    .form-control{
                            background-color: #080707;
                            color: white;
                            height: 40px;
                    }

              </style>
        </head>
        <body>
                                             <!--_________________sidenav_______________-->
              
                    <div id="mySidenav" class="sidenav">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                          <div style="color: white; margin-left: 37px; font-size: 20px;">

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
                            <span style="font-size:30px;cursor:pointer; color: white;" onclick="openNav()">&#9776;</span>
                            <script>
                                  function openNav() {
                                    document.getElementById("mySidenav").style.width = "300px";
                                    document.getElementById("main").style.marginLeft = "300px";
                                    document.body.style.backgroundColor = "black";
                                  }

                                  function closeNav() {
                                    document.getElementById("mySidenav").style.width = "0";
                                    document.getElementById("main").style.marginLeft= "0";
                                    document.body.style.backgroundColor = "black";
                                  }
                            </script>

                            <div class="container">
                                    <br>
                                    <h2 style="color:white; text-align: center"><b>Add New Books</b></h2><br>
                  
                                    <form class="book" action="" method="post">
                      
                                          <input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
                                          <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
                                          <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
                                          <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
                                          <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
                                          <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
                                          <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>

                                          <button style="text-align: center;" class="btn btn-dark" type="submit" name="submit">Insert Book</button>
                                    </form>
                             </div>

                             <?php
                                  if(isset($_POST['submit'])){
                                          if(isset($_SESSION['login_user'])){
                                                       mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]') ;");
                             ?>

                                                       <script type="text/javascript">
                                                              alert("Book Added Successfully.");
                                                       </script>
                            <?php
                                          } 

                                          else{
                            ?>
                                                      <script type="text/javascript">
                                                        alert("You need to login first.");
                                                      </script>
                            <?php
                                          }
                                 }
                            ?>
                    </div>


        </body>
</html>