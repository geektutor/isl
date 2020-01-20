<?php
 session_start(); 
 require('config.php');
 $user_check = $_SESSION['login_user']; 
 $ses_sql = mysqli_query($conn,"SELECT user FROM admin WHERE user = '$user_check'"); 
 $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC); 
 $login_session = $row['id']; if(!isset($_SESSION['login_user'])){ header("location:login.php"); } ?>