<?php
  //session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "Admin"){
          header('location:../user/index.php');
      }
  }
  
  $dicari = (isset($_POST['search'])) ? $_POST['search'] : "" ;
  $dicari = (isset($_GET['dicari'])) ? $_GET['dicari'] : $dicari;
 
  $halaman = $_GET['halaman'];  
  $temp = 10;
  $bottom = ($halaman-1) * $temp;

  //-------------------------------------
  $count = 0;
  $i = ($halaman-1) * $temp;

  if($dicari == ""){
  $hitung = "SELECT count(*) as panjang from msdata where authorize = 1";
  $jalan = $key ->query($hitung);
  $hasil = $jalan->fetch();
  $length = $hasil['panjang'];
  $limit = ceil($length/$temp);
  $sql = "SELECT msdata.nim,msdata.nama,msdata.email,msdata.birthdate,msdata.gender as 'gender',msdata.academic_year,
  msfaculty.keterangan as 'fakultas',msmajor.keterangan as 'jurusan' FROM msdata,msmajor,msfaculty
  where msdata.major = msmajor.major and msdata.faculty = msfaculty.faculty and msdata.authorize = ? order by nim 
  LIMIT " . $bottom . ", " . $temp;

  $result = $key->prepare($sql);
  $result->execute([$_GET['authorize']]);
  
  }else{
    $hitung = "SELECT count(*) as panjang FROM msdata
    where authorize = ? and (nim = ? or nama like ? or nama like ? or nama like ? or 
    email like ? or email like ?) order by nim";

    $result = $key->prepare($hitung);
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


    $sql = "SELECT msdata.nim,msdata.nama,msdata.email,msdata.birthdate,msdata.gender as 'gender',msdata.academic_year,
    msfaculty.keterangan as 'fakultas',msmajor.keterangan as 'jurusan' FROM msdata,msmajor,msfaculty
    where (msdata.major = msmajor.major and msdata.faculty = msfaculty.faculty and msdata.authorize = ?) 
    and (msdata.nim = ? or msdata.nama like ? or msdata.nama like ? or msdata.nama like ? or 
    msdata.email like ? or msdata.email like ?) order by nim LIMIT " . $bottom . ", " . $temp;
    
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
        <strong>All Users</strong><!--
        <small>Masukkan NIM atau Nama yang ingin dicari
        <form action="masteradmin.php?page=recentusers&authorize=1&halaman=1" method="post">
          <input type="text" placeholder="Search" style="border-radius:5px;" name="search" value="<?= $dicari; ?>">
          <button type="submit">Search</button>
          <a href="masteradmin.php?page=recentusers&authorize=1&halaman=1" style="color: red;">Reset</a>
        </form>
        </small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="box">
      <div class="box-body table-responsive">
      <tbody>
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
          while($count < $limit):
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
            <td><?= $row['academic_year']; ?></td>
            <td><?= $row['fakultas']; ?></td>
            <td><?= $row['jurusan']; ?></td>
          </tr>
         <?php endwhile; ?>
         <?php endwhile; ?>
        </table>
        <ul class="pagination pagination-sm inline" style="float: right;">
        <!--<li><a href="masteradmin.php?page=recentusers&authorize=1&cari=1&halaman=<?= $x ?>&dicari=<?= $dicari?>"> <?= $x?></a></li>-->
          
          <li><a href="masteradmin.php?page=recentusers&authorize=1&cari=1&halaman=1&dicari=<?= $dicari?>"> First</a></li>

        <?php 
          $x = $halaman;
          $halamanlimit = $x - 2;
          $xi = $halamanlimit-1;
          while($x > $halamanlimit):
            $xi++;
            $x--;
            if($xi < 1) :
              continue;
            else :
        ?>
          <li><a href="masteradmin.php?page=recentusers&authorize=1&cari=1&halaman=<?= $xi;?>&dicari=<?= $dicari?>"> <?= $xi;?></a></li>

        <?php
        endif; 
        endwhile;
        $x = $halaman - 1;
        $halamanlimit = $x + 4;
          while($x<$count): 
            $x++;
            if($x < $halamanlimit && $x <= $limit):?>
           <li><a href="masteradmin.php?page=recentusers&authorize=1&cari=1&halaman=<?= $x ?>&dicari=<?= $dicari?>"> <?= $x?></a></li>
          <?php
          endif;
            
        endwhile; ?>
        <li><a href="masteradmin.php?page=recentusers&authorize=1&cari=1&halaman=<?= $x ?>&dicari=<?= $dicari?>">Last</a></li>
         </ul>
      </tbody>
      </div>
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
