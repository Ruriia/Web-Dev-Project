<?php
  //session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "admin"){
          header('location:../user/index.php');
      }
  }

  require "action/databasekey.php";
  $key = connection();

  $sql = "select msdata.nim,msdata.nama,msdata.email,msdata.birthdate,msdata.gender as 'gender',msdata.academic_year,
  msfaculty.keterangan as 'fakultas',msmajor.keterangan as 'jurusan' from msdata,msmajor,msfaculty
  where msdata.major = msmajor.major and msdata.faculty = msfaculty.faculty";

  $result = $key->query($sql);
  
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
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recent Users
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="table-responsive mt-3">
        <table class="table">
          <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal lahir</th>
            <th>Gender</th>
            <th>Tahun Ajaran</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
          </tr>
         <?php
          $i = 0;
          while($row = $result->fetch()):
          $i++;
         ?>
          <tr>
            <td><?=$i ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['birthdate']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['academic_year']; ?></td>
            <td><?= $row['fakultas']; ?></td>
            <td><?= $row['jurusan']; ?></td>
          </tr>
         <?php endwhile; ?>
        </table>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>