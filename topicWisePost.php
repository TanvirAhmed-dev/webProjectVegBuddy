<?php


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

        <?php 
            $topic_id=$_GET['topicid'];
        $sql = "SELECT * FROM `posts` WHERE topic_id=$topic_id";
        $result = mysqli_query($conn, $sql);
        if($result){
          while ($row = mysqli_fetch_assoc($result)) {
            // $id=$row['id'];
            // $name=$row['name'];
            $id=$row['id'];


            $name=$_SESSION['name'];
    $time=$row['created_at'];
    
    // echo $row['image'];
     $img=$row['image'];

            echo"
            <div class='post'>
            <img src='./signUp/user_pictures/$img.jpg' class='post-image' />
            <div class='post-preview'>
              <h2>
                <a href='single.php'
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
        
        ?>
















      <div class="content clearfix">
        <!-- main content -->
        <div class="main-content single">
            <h1 class="post-title"><?php echo $title; ?></h1>

            <div class="post-content"><?php echo $body; ?></div>
        </div>
        <!-- //main content -->

        <div class="siderbar single">

            <div class="section popular">
                <h2 class="section-title">Popular</h2>

                <div class="post clearfix">
                    <img src="images/mainBG_home.jpg" alt="">
                    <a href="" class="title"><h4>How to overcome your fears</h4></a>
                </div>

                <div class="post clearfix">
                    <img src="images/mainBG_home.jpg" alt="">
                    <a href="" class="title"><h4>How to overcome your fears</h4></a>
                </div>

                <div class="post clearfix">
                    <img src="images/mainBG_home.jpg" alt="">
                    <a href="" class="title"><h4>How to overcome your fears</h4></a>
                </div>

                <div class="post clearfix">
                    <img src="images/mainBG_home.jpg" alt="">
                    <a href="" class="title"><h4>How to overcome your fears</h4></a>
                </div>

                <div class="post clearfix">
                    <img src="images/mainBG_home.jpg" alt="">
                    <a href="" class="title"><h4>How to overcome your fears</h4></a>
                </div>

                <div class="post clearfix">
                    <img src="images/mainBG_home.jpg" alt="">
                    <a href="" class="title"><h4>How to overcome your fears</h4></a>
                </div>
            </div>
          
          <div class="section topics">
            <h2 class="section-title">Topics</h2>
            <ul>
              <li><a href="#">Recipe</a></li>
              <li><a href="#">Recipe</a></li>
              <li><a href="#">Recipe</a></li>
              <li><a href="#">Recipe</a></li>
              <li><a href="#">Recipe</a></li>
              <li><a href="#">Recipe</a></li>
              <li><a href="#">Recipe</a></li>
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