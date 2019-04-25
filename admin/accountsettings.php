<?php


//session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "admin"){
          header('location:../user/index.php');
      }
  }

  require 'action/databasekey.php';
  $key = connection();

  $sql = "SELECT * FROM msdata WHERE";

  $result = $key->query($sql);
?>


    <section class="content-header">
      <h1>
        Account Settings
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    <div class="content container-fluid">
        <div class="bootstrap-iso">
      
        </div>
    </div>
    
