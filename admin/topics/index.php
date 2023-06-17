<?php
//to hide the warnings 
error_reporting(E_ERROR | E_PARSE);

include("../../path.php") ?>
<?php include('../../controller/topics.php') ?>
<?php include('../../database/db_connection.php') ;

$user=$_SESSION['user_id'];

if($user==false)
{
  echo "<script>alert('First log in');location.href='../../index.php';</script>";
}

?>


<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous" />

  <link rel="stylesheet" href="../../css/blogstyle.css" />
  <!-- Admin styling -->
  <link rel="stylesheet" href="../../css/admin.css" />
  <title>Admin Section-Manage Topics</title>
</head>

<body>
  <!-- Navigation bar -->
  <!-- source for nav bar https://lightcodeblog.com/how-to-make-drop-down-menu-using-html-and-css/
                            https://www.youtube.com/watch?v=h3E68tTyE34 -->
  <div class="menu-bar">
  <h1 class="logo"><a href="../../home.php">Veg<span>Buddy</span></a></span></h1>
    <ul>
      <li>
      <a href="#"> <i class="fas fa-caret-down"></i></a>
      <!-- <?php echo $_SESSION['name'] ?> -->
        <div class="dropdown-menu">
          <ul>
            <!-- <li><a href="#">Dashboard</a></li> -->
            <li><a href="#">Logout</a></li>
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
        <li><a href="../posts/index.php">Manage Posts</a></li>
        <!-- <li><a href="../users/index.php">Manage Users</a></li> -->
        <li><a href="index.php">Manage Topics</a></li>
      </ul>
    </div>
    <!-- //left sidebar -->

    <!-- Admin content -->
    <div class="admin-content">
      <div class="button-group">
        <a href="create.php" class="btn btn-big">Add Topic</a>
        <a href="index.php" class="btn btn-big">Manage Topics</a>
      </div>

      <div class="content">
        <h2 class="page-title">Manage Topics</h2>

        <table>
          <thead>
            <th>SN</th>
            <th>Name</th>
            <th colspan="2">Action</th>
          </thead>

          <tbody>
            <?php
             $sql = "SELECT * FROM `topics`";
            $result = mysqli_query($conn, $sql);
            if($result){
              while ($row = mysqli_fetch_assoc($result)) {
                $id=$row['id'];
                $name=$row['name'];
                
                echo"<tr>
                <td>$id</td>
                <td>$name</td>
               
                <td><a href='index.php?deleteid=$id' class='delete'>delete</a></td>
              </tr>";
              }
            }
            //<td><a href='edit.php' class='edit'>edit</a></td>
            
             ?>
            <!-- <tr>
              <td><?php echo $key ?></td>
              <td><?php echo $topic['name'] ?></td>

              <td><a href="#" class="edit">edit</a></td>
              <td><a href="#" class="delete">delete</a></td>
            </tr> -->


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
            
                
                