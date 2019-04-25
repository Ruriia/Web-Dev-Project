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

  $sql = "SELECT * FROM msdata WHERE msdata.email = ?";

  $hasil = $key->prepare($sql);
  $hasil->execute([$_SESSION['email']]);

  $data = $hasil->fetch();
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
            <div class="row">
                <div class="col-mt-3"><strong>Full name</strong></div>
                <div class="row-mt-6">Testing</div>
            </div>
        </div>
    </div>
    
