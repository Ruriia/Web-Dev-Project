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

  $halaman = $_GET['halaman'];  
  $temp = 10;
  $bottom = ($halaman-1) * $temp;
  //-------------------------------------
  $count = 0;
  $i = ($halaman-1) * $temp;

  if($dicari == ""){
    $panjang = "SELECT COUNT(*) as panjangticket FROM ticket";
    $getpanjang = $key->query($panjang);
    $getlength = $getpanjang->fetch();
    $length = $getlength['panjangticket'];
    $limit = ceil($length/$temp);


    $sql = "SELECT ticket.*, mscategory.keterangan AS keteranganCategory, mspriority.keterangan AS keteranganPriority
            FROM ticket, mscategory, mspriority WHERE mscategory.category = ticket.category
            AND mspriority.priority = ticket.priority ORDER BY ticket.date_created DESC, ticket.time_created DESC LIMIT " . $bottom . "," . $temp;
    $result = $key->prepare($sql);
    $result->execute();
  }else{

    $panjang = "SELECT COUNT(*) as panjangticket FROM ticket WHERE subject like ? or subject like ? or subject like ? or nim like ? or ticketid like ? or email like ?";
    $getpanjang = $key->prepare($panjang);
    $getpanjang->execute([
      $dicari."%",
      "%".$dicari."%",
      "%".$dicari,
      $dicari,
      $dicari,
      $dicari."%"
    ]);
    $getlength = $getpanjang->fetch();
    $length = $getlength['panjangticket'];
    $limit = ceil($length/$temp);


    $sql = "SELECT ticket.*, mscategory.keterangan AS keteranganCategory, mspriority.keterangan AS keteranganPriority
            FROM ticket, mscategory, mspriority WHERE mscategory.category = ticket.category
            AND mspriority.priority = ticket.priority and (subject like ? or subject like ? or subject like ? or nim like ? or ticketid like ? or email like ?) order by ticket.done LIMIT " . $bottom . "," . $temp;
    $result = $key->prepare($sql);
    $result->execute([
      $dicari."%",
      "%".$dicari."%",
      "%".$dicari,
      $dicari,
      $dicari,
      $dicari."%"
    ]);
  }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Helpdesk KRS Website</title>
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
        <strong>Tickets</strong>
        <small></small>
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
          <table class="table table-hover">
          <tbody>
            <tr>
              <th>No. Ticket</th>
              <th>User's Email</th>
              <th>NIM</th>
              <th>Subject</th>
              <th>Category</th>
              <th>Priority</th>
              <th>Date Created</th>
              <th>Time Created</th>
              <th>Status</th>
              <th></th>
            </tr>
          <?php
          while($count < $limit) : 
          
            $count++;
            $i = 0;
            while($row = $result->fetch()):
            $tgl = $row['date_created'];
            // Konversi format tanggal
            $tgl = new DateTime($tgl);
            $tgl = $tgl->format('d M Y');
          ?>
            <tr>
              <td><?= $row['ticketid']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['nim']; ?></td>
              <td><?= $row['subject']; ?></td>
              <td><?= $row['keteranganCategory']; ?></td>
              <td><?= $row['keteranganPriority']; ?></td>
              <td><?= $tgl; ?></td>
              <td><?= $row['time_created']; ?></td>
              <td>
                <?php
                  if($row['done'] == 1){
                    echo "<span style='color:green;'><strong>Opened</strong></span>";
                  }elseif($row['done'] == 2){
                    echo "<span style='color:red;'><strong>Closed</strong></span>";
                  }                
                ?>
              </td>
              <td><a href="masteradmin.php?page=detail_tickets&ticketid=<?= $row['ticketid']; ?>" style="border: 1.6px solid #0080ff; border-radius: 3px; padding: 3px;">
                  <strong>View</strong></a>
              </td>
            </tr>
          </tbody>
          <?php endwhile; ?>
          <?php endwhile; ?>
          </table>
          <ul class="pagination pagination-sm inline" style="float: right;">
          <!--<li><a href="masteradmin.php?page=admin_tickets&cari=3&halaman=<?= $x ?>&dicari=<?= $dicari; ?>"> <?= $x?></a></li>-->
          
          <li><a href="masteradmin.php?page=admin_tickets&cari=3&halaman=1&dicari=<?= $dicari?>"> First</a></li>

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
          <li><a href="masteradmin.php?page=admin_tickets&cari=3&halaman=<?= $xi;?>&dicari=<?= $dicari?>"> <?= $xi;?></a></li>

        <?php
        endif; 
        endwhile;
        $x = $halaman - 1;
        $halamanlimit = $x + 4;
          while($x<$count): 
            $x++;
            if($x < $halamanlimit && $x <= $limit):?>
           <li><a href="masteradmin.php?page=admin_tickets&cari=3&halaman=<?= $x ?>&dicari=<?= $dicari?>"> <?= $x?></a></li>
          <?php
          endif;
            
        endwhile; ?>
        <li><a href="masteradmin.php?page=admin_tickets&cari=3&halaman=<?= $x ?>&dicari=<?= $dicari?>">Last</a></li>
         </ul>
      </div>
    </div>
    </section>
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