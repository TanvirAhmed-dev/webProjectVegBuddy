<?php
include("path.php");
session_start();

unset($_SESSION['user_id']);

$user=$_SESSION['user_id'];

if($user==false)
{
  echo "<script>location.href='index.php';</script>";
}