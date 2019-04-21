<?php
require 'masteradmin.php';

session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:login.php');
  }else{
      if($_SESSION['loginas'] != "admin"){
          header('location:../user/index.php');
      }
  }
?>

