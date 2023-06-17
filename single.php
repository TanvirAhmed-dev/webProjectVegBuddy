<?php
//to hide the warnings 
error_reporting(E_ERROR | E_PARSE);
include("path.php");
include('controller/posts.php');
include('database/db_connection.php'); 

$id=$_GET['id'];
$sql = "SELECT * FROM `posts` WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if($result){
              // echo "ok";
              while ($row = mysqli_fetch_assoc($result)) {
                $title=$row['title'];

                $body=$row['body'];
                // $name=$row['name'];
                $name=$_SESSION['name'];

              }
            }
            else{
              echo "not ok";
            }
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.12.1/css/all.css"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/blogstyle.css" />
    <title>Veg Buddy</title>
  </head>
  <body>
    <!-- Navigation bar -->
    <!-- source for nav bar https://lightcodeblog.com/how-to-make-drop-down-menu-using-html-and-css/
                            https://www.youtube.com/watch?v=h3E68tTyE34 -->
    <!-- <div class="menu-bar">
      <h1 class="logo">Veg<span>Buddy</span></h1>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blog</a></li> 
        <li><a href="#">Contact us</a></li>

        <li>
          <a href="#">VegBuddy <i class="fas fa-caret-down"></i></a>

          <div class="dropdown-menu">
            <ul>
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div> -->
    <?php include("header.php");?> 
    <!-- Navigation bar -->

    <!-- horizontal carousel starts here -->
    <!-- Page wrapper -->
    <div class="page-wrapper">
      

      <!-- content -->

      <!-- //content -->

      <div class="content clearfix">
        <!-- main content -->
        <div class="main-content single">
            <h1 class="post-title"><?php echo $title; ?></h1>

            <div class="post-content"><?php echo $body; ?></div>
        </div>
        <!-- //main content -->

        <div class="siderbar single">

           
          
            <div class="section topics">
            <h2 class="section-title">Topics</h2>
            <ul>
            <?php
             $sql = "SELECT * FROM `topics`";
            $result = mysqli_query($conn, $sql);
            if($result){
              while ($row = mysqli_fetch_assoc($result)) {
                // $id=$row['id'];
                $name=$row['name'];
                $id=$row['id'];
                
                echo"<li><a href='blog.php?topicid=$id'>$name</a></li>";

                
              }
            }
              
            
             ?>

             
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- //page wrapper -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- slick carousel -->
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js">
    </script>

    <!-- custom script -->
    <script src="js/scripts.js"></script>
  </body>
</html>
