<?php


//session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "Admin"){
          header('location:../user/index.php');
      }
  }

  
  $sql1 = "SELECT COUNT(ticketid) AS countticket FROM ticket";
  $stmt1 = $key->query($sql1);
  $row1 = $stmt1->fetch();

  $sql2 = "SELECT ticket.done, COUNT(*) AS num FROM ticket GROUP BY ticket.done";
  $stmt2 = $key->query($sql2);
  
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
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row" style="margin-top:10px;">
        <div id="home-left" class="col-md-4">
          <div class="col-md-6">
            <h1 style="font-size: 85px;" class="text-center"><?= $row1['countticket']; ?></h1>           
            <p class="text-center">Tickets have opened.</p>
          </div>

          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <?php
                  while($row2 = $stmt2->fetch()):
                    if($row2['done'] == 1):
                ?>
                      <h1 class="text-center"><?= $row2['num']; ?></h1>
                      <p class="text-center">Have solved.</p>
                
                <?php
                    elseif($row2['done'] == 2):
                ?>
                      <h1 class="text-center"><?= $row2['num']; ?></h1>
                      <p class="text-center">Still opened.</p>
                <?php
                    endif;
                  endwhile;
                ?>
              </div>
            </div>
          </div>
          <a href="masteradmin.php?page=admin_tickets&cari=3&halaman=1"><button type="button" class="btn btn-primary btn-block">View tickets</button></a>
        </div>

        <div id="home-middle" class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ticket Priorities</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height: 352px; width: 705px;" width="881" height="440"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div id="home-right" class="col-md-4" style="background: #0080c0;">
          <h1 id="home-day" style="text-align: center; font-size: 45px; color: white;"></h1>
          <p id="home-date" style="text-align: center; font-size: 22px; letter-spacing: 1px; color: #0080c0; background: white;"></p>
          <h1 id="home-clock" style="text-align: center; font-size: 45px; color: white;"></h1>
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

<!-- Chart.js -->
<script src="bower_components/chart.js/Chart.js"></script>

<!-- Fast click -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>




</body>
</html>