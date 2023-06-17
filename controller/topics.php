
<?php 
session_start();
 include('C:\xampp\htdocs\VegBuddyFINAL\database\db_connection.php');
 
if(isset($_POST['add-topic']))
{

    $title=$_POST['title'];
    $description=$_POST['description'];

    $query="insert into topics(name,description) values('$title' , '$description')";

    $run=mysqli_query($conn , $query) ;

    echo "<script>location.href='../admin/topics/index.php';</script>";
     
}

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `topics` WHERE `topics`.`id` = $id";
    $result=mysqli_query($conn,$sql);
}
?>