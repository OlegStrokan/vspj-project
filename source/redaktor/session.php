<?php
   include('../db.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connection,"select username, role from users where username = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $role_session = $row['role'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
   
   if($role_session != 2)
   {
	   header("location:../index.php");
   }
?>