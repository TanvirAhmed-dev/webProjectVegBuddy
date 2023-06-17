<?php 
session_start();
//  include ('../admin/topics/index.php');
include('../database/db_connection.php');
include('../admin/posts/create.php');

// include('../authentication/user_authentication.php');
// include('C:\xampp\htdocs\VegBuddy\VegBuddyV1\database\db_connection.php');
// include('../database/db_connection.php');

// $sql= "SELECT * FROM 'topics'";
// $result=mysqli_query($conn,$sql);
// if($result)
// {
//     while($row=mysqli_fetch_assoc($result))
//     {
//         $topics[]=$row;
//     }
// }


if(isset($_POST['add-post']))
{

    // $title=$_POST['title'];
    // $description=$_POST['description'];
    $userid=$_SESSION['user_id'];
    $title=$_POST['title'];
    $body=$_POST['body'];

    $img_name=$_FILES['image']['name'];
    // $tmp_name = $_FILES['my_image']['tmp_name'];
    $dest="../signUp/user_pictures/".$img_name.".jpg";

    $result= move_uploaded_file($_FILES['image']['tmp_name'],$dest);
    if($result){
        $_POST['image']=$img_name;
        // for a new push
        /// git add .
        // git commit -m "something and something"
        ///git push
    }

    $topic_id = $_POST['Topic'];
    
    $published=1;

    
    

    

    // if(isset($_FILES['image']['name'])):
    //     if(move_uploaded_file($_FILES['image']['tmp_name'],$dest)):
    //         $sqlim="update user set image=1 where user_id='".$user_id."'";
    //         mysqli_query($conn, $sqlim);
    //     else:
    //         echo "couldn't upload the file";
    //     endif;
    // endif;

    // $query="insert into posts(user_id,title,image,body,published) values('$userid'  , '$title' ,'0', '$body' ,  '$published')";

    $query="insert into posts(user_id,topic_id,title,image,body,published) values('$userid'  ,'$topic_id', '$title' ,'$img_name', '$body' ,  '$published')";

    $run=mysqli_query($conn , $query) ;

    // $dest="user_pictures/".$user_id.".jpg";

//     $dest="../signUp/user_pictures/".$user_id.".jpg";

// //echo $patient_id;

// if(isset($_FILES['image']['name'])):
// 	if(move_uploaded_file($_FILES['image']['tmp_name'],$dest)):
// 		$sqlim="update user set image=1 where id='".$user_id."'";
// 		mysqli_query($conn, $sqlim);
// 	else:
// 		echo "couldn't upload the file";
// 	endif;
// endif;
   

     echo "<script>location.href='../admin/posts/index.php';</script>";
     
}

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `posts` WHERE `posts`.`id` = $id";
    $result=mysqli_query($conn,$sql);
}

?>