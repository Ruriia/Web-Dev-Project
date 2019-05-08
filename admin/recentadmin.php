<?php
  
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "Admin"){
          header('location:../user/index.php');
      }
  }
  $dicari = (isset($_POST['search'])) ? $_POST['search'] : "" ;
  $dicari = (isset($_GET['dicari'])) ? $_GET['dicari'] : $dicari;

  require "action/databasekey.php";
  $key = connection();
  $halaman = $_GET['halaman'];  
  $temp = 10;
  $bottom = ($halaman-1) * $temp;
  //-------------------------------------
  $count = 0;
  $i = ($halaman-1) * $temp;

  if($dicari == ""){
    
    $hitung = "SELECT count(*) as panjang from msdata where authorize = 2";
            
    $jalan = $key->query($hitung);
    $hasil = $jalan->fetch();
    $length = $hasil['panjang'];
    $limit = ceil($length/$temp);
    
    $sql = "SELECT nim,nama,email,birthdate,gender as 'gender' FROM msdata where authorize = ? order by nim LIMIT " . $bottom . ",". $temp;
    $result = $key->prepare($sql);
    $result->execute([$_GET['authorize']]);
  
  
  }else{
    $halaman = "SELECT count(*) as panjang FROM msdata
    where authorize = ? and (nim = ? or nama like ? or nama like ? or nama like ? or 
    email like ? or email like ?) order by nim";

    $result = $key->prepare($halaman);
    $result->execute([
      $_GET['authorize'],
      $dicari,
      $dicari."%",
      "%".$dicari."%",
      "%".$dicari,
      $dicari."%",
      "%".$dicari."%"
    ]);
    $panjang = $result->fetch();
    $length = $panjang['panjang'];
    $limit = ceil($length/$temp);

    $sql = "SELECT nim,nama,email,birthdate,gender as 'gender' FROM msdata
    where authorize = ? and (nim = ? or nama like ? or nama like ? or nama like ? or 
    email like ? or email like ?) order by nim LIMIT " . $bottom . "," . $temp ;
  
    $result = $key->prepare($sql);
    $result->execute([
      $_GET['authorize'],
      $dicari,
      $dicari."%",
      "%".$dicari."%",
      "%".$dicari,
      $dicari."%",
      "%".$dicari."%"
    ]);
  

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
  <title>Helpdesk KRS | Recent <?= $_SESSION['loginas']; ?></title>
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
        Recent Admin
        <small>Masukkan NIKW atau Nama yang ingin dicari
        <form action="masteradmin.php?page=recentadmin&authorize=2&halaman=1" method="post">
          <input type="text" placeholder="Search" style="border-radius:5px;" name="search" value="<?= $dicari;?>">
          <button type="submit">Search</button>
          <a href="masteradmin.php?page=recentadmin&authorize=2&halaman=1 " style="color: red;">Reset</a>
        </form>
        </small>
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
            <th>NIKW</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal lahir</th>
            <th>Gender</th>
          </tr>
         <?php
          
          
          while($count < $limit) : 
          
          $count++;
          while($row = $result->fetch()):
          
          $i++;
         ?>
          <tr>
            <td><?=$i ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= date('d-F-Y', strtotime($row['birthdate'])); ?></td>
            <td><?= $row['gender']; ?></td>
          </tr>

         <?php endwhile;?>
         <a href="masteradmin.php?page=recentadmin&authorize=2&halaman=<?= $count?>&dicari=<?= $dicari?>"> <?= $count?></a>
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


