<?php

use LDAP\Result;

session_start();

function encrypt($password_string){
	$encrypted_pass = password_hash($password_string, PASSWORD_DEFAULT);
    return $encrypted_pass;
}

include('../database/db_connection.php');
$sql="select * from user where email='".$_POST['email']."'";

$result=mysqli_query($conn,$sql);

$num=mysqli_num_rows($result);

if($num>0):
    $data=mysqli_fetch_assoc($result);

    if(password_verify($_POST['password'],$data['password'])):
        $_SESSION['user_id']=$data['user_id'];
        echo "sucessfull";
        echo "<script>location.href='../home.php';</script>";
        // echo "<script>alert('Successfull log in');</script>";
        // echo "<script>alert('Successfull log in');location.href='../home.php';</script>";

        
    else:
        echo "Unsucessfull";
        echo "<script>alert('Incorrect mail or password');location.href='../index.php';</script>";
    endif;    
endif;
?>