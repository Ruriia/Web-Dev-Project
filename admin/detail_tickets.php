<?php
  if(!isset($_SESSION['loginas'])){
    header('location:../form_login.php');
  }else{
    if($_SESSION['loginas'] != "Admin"){
        header('location:../user/index.php');
    }
  }

  

  $sql = "SELECT question.ticketid, question.message, question.gambar, question.dari, question.sender,
            msdata.nama AS namauser,
            question.date_sent AS date, question.time_sent AS time
            FROM question, msdata, ticket
            WHERE question.ticketid = ticket.ticketid AND msdata.email = ticket.email";
  $result = $key->query($sql);
  
  $sqlbaru = "SELECT msdata.nama as namauser, mscategory.keterangan as kategori, ticket.subject as subjek,
  mspriority.keterangan as prioritas, referticket.keterangan as done
  from msdata, ticket, question, mscategory, mspriority, referticket where
  ticket.ticketid = ? and ticket.email = msdata.email and ticket.category = mscategory.category
  and mspriority.priority = ticket.priority and referticket.done = ticket.done";
  $hasil = $key->prepare($sqlbaru);
  $hasil->execute([$_GET['ticketid']]);
  $row = $hasil->fetch();
?>


<!DOCTYPE html>
<html>
<head>
  <!-- Nanti digunakan untuk styling chat box nya -->
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tickets
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="padding-bottom: 0; margin-bottom: 0;">
        <div class="row">
            <div class="col-sm-3"> <!-- Untuk Ticket Info -->
                <h1 class="h3">Ticket Information</h1>
                <p>User: &ensp;<?= $row['namauser']; ?></p>
                <p>Ticket no: &ensp;<?= $_GET['ticketid']; ?></p>
                <p>Category : &ensp;<?= $row['kategori'];?></p>
                <p>Subject : &ensp;<?= $row['subjek'];?></p>
                <p>Priority : &ensp;<?= $row['prioritas'];?></p>
                <p>Status : &ensp;<?= $row['done'];?></p>
            </div>

            <div class="col-sm-9 mb-0">
                <div class="row"> <!-- Membagi area chat view dan text box -->               
                    <div class="col-sm-12" id="chatview" style="height: 300px; overflow-y:scroll;"> <!-- Untuk chat view -->
                        <?php while($data = $result->fetch()): 
                            $tgl = $data['date'];
                            $tgl = new DateTime($tgl);
                            $tgl = $tgl->format('d/m/Y');    
                        ?>                           
                            <?php if($data['ticketid'] == $_GET['ticketid']): ?>
                                <?php if($data['dari'] == 1): ?>
                                    <div class="row">
                                        <div class="col-sm-6 mt-3" style="border-radius:20px; background: #67bec2; color: white; padding-top: 5px; margin-bottom: 10px;">            
                                            <strong><?= $data['sender']; ?></strong>
                                            <br />
                                            <small><?= $tgl ?>&ensp;<?= $data['time']; ?></small>
                                            <br />
                                            <p><?= $data['message']; ?></p>
                                        </div>                                    
                                    </div>
                                <?php endif; ?>

                                <?php if($data['dari'] == 2): ?>
                                    <div class="row">
                                        <div class="col-sm-6 mt-3"></div>

                                        <div class="col-sm-6 mt-3" style="border-radius:20px; background: #ffffff; padding-top: 5px; margin-bottom: 10px;">            
                                            <strong><?= $data['sender']; ?></strong>
                                            <br />
                                            <small><?= $tgl ?>&ensp;<?= $data['time']; ?></small>
                                            <br />
                                            <p><?= $data['message']; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>                      
                    </div>
                    <div class="col-sm-12" id="textbox" style="background: white; height: 215px;"> <!-- Untuk text box -->
                        <form action="action/newchat.php?&ticketid=<?= $_GET['ticketid']; ?>" method="post">
                            <div class="row" style="margin-top: 5px; margin-bottom: 5px;">
                                <div class="col-sm-12">
                                    <button type="button" style="width: 30px;"><strong>B</strong></button>
                                    <button type="button" style="width: 30px;"><em>I</em></button>
                                    <button type="button" style="width: 30px;"><ins>U</ins></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="textarea1" rows="6" name="messageinput" placeholder="Reply here..."></textarea>                           
                            </div>                            
                            <button type="submit" class="btn btn-sm btn-primary">SEND</button>
                        </form>
                    </div>
                </div>
           
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