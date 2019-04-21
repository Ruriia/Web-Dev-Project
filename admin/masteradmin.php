<?php

session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:login.php');
  }else{
      if($_SESSION['loginas'] != "admin"){
          header('location:../user/index.php');
      }
  }
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Helpdesk KRS Website</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- for stylesheet -->
  <?php include 'template-parts/head.php'; ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php include 'template-parts/header.php'; ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'template-parts/aside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php 
        if(!isset($_GET['page'])){
          $page = 'homeadmin';
        }else {
          $page = $_GET['page'];
        }
        require $page . '.php';
      ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'template-parts/footer.php'; ?>


</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Include Date Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="inputbirthday"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>1 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

<!-- Make default value of password -->
<script>
  $('#inputpassword').focusin(function(){
    var pass = $('#inputbirthday').val();
    var tanggal = pass.substring(0,2);
    var bulan = pass.substring(3,5);
    var tahun = pass.substring(6);
    var temp = tanggal.concat(bulan);
    var temp1 = temp.concat(tahun);
    $('#inputpassword').val(temp1);
  });
</script>

</body>
</html>