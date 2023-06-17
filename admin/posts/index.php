<?php
session_start();
//to hide the warnings 
error_reporting(E_ERROR | E_PARSE);
$user=$_SESSION['user_id'];

if($user==false)
{
  echo "<script>alert('First log in');location.href='../../index.php';</script>";
}

 include('../../database/db_connection.php');
// include('../../authentication/user_authentication.php') 
include('../../controller/posts.php')?>
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

    <link rel="stylesheet" href="../../css/blogstyle.css" />
    <!-- Admin styling -->
    <link rel="stylesheet" href="../../css/admin.css" />
    <title>Admin Section-Manage Posts</title>
  </head>
  <body>
    <!-- Navigation bar -->
    <!-- source for nav bar https://lightcodeblog.com/how-to-make-drop-down-menu-using-html-and-css/
                            https://www.youtube.com/watch?v=h3E68tTyE34 -->
    <div class="menu-bar">
    <h1 class="logo"><a href="../../home.php">Veg<span>Buddy</span></a></span></h1>
      <ul>
            <li>
          <a href="#"><?php
                    
                   
                    echo $_SESSION['name'] ?>
                     <i class="fas fa-caret-down"></i></a>

          <div class="dropdown-menu">
            <ul>
              <!-- <li><a href="#">Dashboard</a></li> -->
              <li><a href="../../logout.php">Logout</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
    <!-- Navigation bar -->


    <!-- Admin Page wrapper -->
    <div class="admin-wrapper">
      
        <!-- left sidebar -->
        <div class="left-sidebar">
           <ul>
            <li><a href="index.php">Manage Posts</a></li>
            <!-- <li><a href="../users/">Manage Users</a></li> -->
            <li><a href="../topics/">Manage Topics</a></li>
           </ul>
        </div>
         <!-- //left sidebar -->

         <!-- Admin content -->
         <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add Post</a>
                <a href="index.php" class="btn btn-big">Manage Post</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Posts</h2>

                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <tbody>
                    <?php
             $sql = "SELECT * FROM `posts`";
            $result = mysqli_query($conn, $sql);
            if($result){
              while ($row = mysqli_fetch_assoc($result)) {
                $title=$row['title'];
                $id=$row['id'];
                // $name=$row['name'];
                $name=$_SESSION['name'];
                
                echo"<tr>
                <td>$id</td>
                <td>$title</td>
                <td>$name</td>
               
                <td><a href='index.php?deleteid=$id' class='delete'>delete</a></td>
              </tr>";
              }
            }
               // <td><a href='edit.php' class='edit'>edit</a></td>
            
             ?>

                       
                    </tbody>

                </table>
            </div>
         </div>
         <!-- //Admin content -->
      
    </div>
    <!-- //page wrapper -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

   

    <!-- custom script -->
    <script src="../../js/scripts.js"></script>
  </body>
</html>
