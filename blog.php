<?php 
//to hide the warnings 
error_reporting(E_ERROR | E_PARSE);
include("path.php");
include('database/db_connection.php');

session_start();

$user=$_SESSION['user_id'];

if($user==false)
{
  echo "<script>alert('First log in');location.href='index.php';</script>";
}
// include(ROOT_PATH . "/database/db.php"); 
// include("database/db.php");?>

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
    <title>dropdown Menu</title>
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
        <li><a href="register.html">Sign Up</a></li>

        <li>
          <a href="login.html">Login <i class="fas fa-caret-down"></i></a>

          <div class="dropdown-menu">
            <ul>
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div> -->

    <!-- Navigation bar -->

      <?php include("header.php");?> 

  
    <!-- horizontal carousel starts here -->
    <!-- Page wrapper -->
    <div class="page-wrapper">
      <!-- Post slider  -->
      <div class="post-slider">
        <h1 class="slider-title">Trending Posts</h1>
        <i class="fas fa-chevron-left prev"></i>
        <i class="fas fa-chevron-right next"></i>

        <div class="post-wrapper">
         

          <?php 

$sql = "SELECT * FROM `posts`";
$result = mysqli_query($conn, $sql);
if($result){
  while ($row = mysqli_fetch_assoc($result)) {
    $title=$row['title'];
    // $id=$row['id'];
    // $name=$row['name'];
    $name=$_SESSION['name'];
    $time=$row['created_at'];
    $id=$row['id'];
    // echo $row['image'];
     $img=$row['image'];

    // $image=$_FILES["file"]["name"]; 
    //          $img="upload/".$image;
          echo"
          <div class='post'>
            <img src='./signUp/user_pictures/$img.jpg' class='slider-image' />

            <div class='post-info'>
              <h4>
                <a href='single.php?id=$id'
                  >$title</a
                >
              </h4>
              <br />
              <i class='far fa-user'>$name</i>
              &nbsp;
              <i class='far fa-calendar'>$time</i>
            </div>
          </div>";
  }
}
          ?>
          

          

          
        </div>
      </div>
      <!-- //post slider  -->

      <!-- content -->

      <!-- //content -->

      <div class="content clearfix">
        <!-- main content -->
        <div class="main-content">
          <!-- <h1 class="recent-post-title">Recent posts</h1> -->

          

          <?php
          $topic_id=$_GET['topicid'];

          if(isset($_GET['topicid'])){
           echo" <h1 class='recent-post-title'>Related posts</h1>";
             $sql = "SELECT * FROM `posts` WHERE topic_id='$topic_id' ";
            $result = mysqli_query($conn, $sql);
            if($result){
              while ($row = mysqli_fetch_assoc($result)) {
                // $id=$row['id'];
                $name=$_SESSION['name'];
                $id=$row['id'];
                
                $title=$row['title'];
                $time=$row['created_at'];
                $img=$row['image'];

                echo"
            <div class='post'>
            <img src='./signUp/user_pictures/$img.jpg' class='post-image' />
            <div class='post-preview'>
              <h2>
                <a href='single.php?id=$id'
                  >$title</a
                >
              </h2>
              <i class='far fa-user'>$name</i>
              &nbsp;
              <i class='far fa-calendar'>$time</i>
             
              <a href='single.php' class='btn btn-read-more'>Read More</a>
            </div>
          </div>";
              }
            }

//             <script>
// document.getElementById("p1").innerHTML = "New text!";
// </script>
          }
            
            //  


          else{
            echo" <h1 class='recent-post-title'>All posts</h1>";

             $sql = "SELECT * FROM `posts`";
            $result = mysqli_query($conn, $sql);
            if($result){
              while ($row = mysqli_fetch_assoc($result)) {
                 $id=$row['id'];
                $name=$_SESSION['name'];
                $id=$row['id'];
                
                $title=$row['title'];
                $time=$row['created_at'];
                $img=$row['image'];

                echo"
            <div class='post'>
            <img src='./signUp/user_pictures/$img.jpg' class='post-image' />
            <div class='post-preview'>
              <h2>
                <a href='single.php?id=$id'
                  >$title</a
                >
              </h2>
              <i class='far fa-user'>$name</i>
              &nbsp;
              <i class='far fa-calendar'>$time</i>
             
              <a href='single.php?id=$id' class='btn btn-read-more'>Read More</a>
            </div>
          </div>";
              }
            }
          }
            
             ?>
         

          

          
        </div>
        <!-- //main content -->

        <div class="siderbar">
          <div class="section search">
            <h2 class="section-title">Search</h2>
            <form action="blog.php" method="post">
              <input
                type="text"
                name=" search-term"
                class="text-input"
                placeholder="Search..."
              />
            </form>
          </div>

          <?php
          
          // if(isset($_POST['search-term'])){
          //   echo" <h1 class='recent-post-title'>Searched Posts</h1>";
          //   $searchTerm=$_POST['search-term'];
          //   $query=" SELECT * FROM `posts` WHERE title,body LIKE `posts` or `posts`";
          //   $result = mysqli_query($conn, $sql);
          
          //   if($result){
          //     while ($row = mysqli_fetch_assoc($result)) {
          //       // $id=$row['id'];
          //       $name=$_SESSION['name'];
          //       $id=$row['id'];
                
          //       $title=$row['title'];
          //       $time=$row['created_at'];

          //       echo"
          //   <div class='post'>
          //   <img src='./signUp/user_pictures/$img.jpg' class='post-image' />
          //   <div class='post-preview'>
          //     <h2>
          //       <a href='single.php'
          //         >$title</a
          //       >
          //     </h2>
          //     <i class='far fa-user'>$name</i>
          //     &nbsp;
          //     <i class='far fa-calendar'>$time</i>
             
          //     <a href='single.php' class='btn btn-read-more'>Read More</a>
          //   </div>
          // </div>";
          //     }
          //   }
          // }

         
          ?>

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
