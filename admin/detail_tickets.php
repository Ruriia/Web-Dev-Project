<?php
  if(!isset($_SESSION['loginas'])){
    header('location:../form_login.php');
  }else{
    if($_SESSION['loginas'] != "Admin"){
        header('location:../user/index.php');
    }
  }

  

  $sql = "SELECT question.ticketid, question.message, question.dari, question.sender,
            msdata.nama AS namauser,
            question.date_sent AS date, question.time_sent AS time
            FROM question, msdata, ticket
            WHERE question.ticketid = ticket.ticketid AND msdata.email = ticket.email";
  $result = $key->query($sql);
  
  $sqlbaru = "SELECT msdata.nama as namauser, mscategory.keterangan as kategori, ticket.subject as subjek,
  mspriority.keterangan as prioritas, referticket.keterangan as done, ticket.done as status
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
    <style>
        #chatbox img{  
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <strong>Tickets</strong>
        <small></small>
      </h1>
      <!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
      -->
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="padding-bottom: 0; margin-bottom: 0;">
        <div class="row" style="padding:10px; padding-bottom: 0;">
            <div class="col-sm-3" style="background-color:white;border-radius:10px; max-height: 100%;"> <!-- Untuk Ticket Info -->
                <h1 class="h3"><strong>Ticket Information</strong></h1>
                <hr/>
                <p>User: &ensp;<?= $row['namauser']; ?></p>
                <p>Ticket no: &ensp;<?= $_GET['ticketid']; ?></p>
                <p>Category : &ensp;<?= $row['kategori'];?></p>
                <p>Subject : &ensp;<?= $row['subjek'];?></p>
                <p>Priority : &ensp;<?= $row['prioritas'];?></p>
                <p>Status : &ensp;<?= $row['done'];?></p>
            </div>

            <div class="col-sm-9 mb-0">
                <div class="row" style="padding:10px; padding-bottom:0;"> <!-- Membagi area chat view dan text box -->               
                    <div class="col-sm-12" id="chatview" style="height: 350px; overflow-y:scroll;"> <!-- Untuk chat view -->
                        <?php while($data = $result->fetch()): 
                            $tgl = $data['date'];
                            $tgl = new DateTime($tgl);
                            $tgl = $tgl->format('d/m/Y');    
                        ?>                           
                            <?php if($data['ticketid'] == $_GET['ticketid']): ?>
                                <?php if($data['dari'] == 1): ?>
                                    <div class="row">
                                        <div class="col-sm-6 mt-3" id="chatbox" style="border-radius:20px; background: #67bec2; color: white; padding-top: 5px; margin-bottom: 10px;">            
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

                                        <div class="col-sm-6 mt-3" id="chatbox" style="border-radius:20px; background: #ffffff; padding-top: 5px; margin-bottom: 10px;">            
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
                    <div class="col-sm-12" id="textbox" style="background: white; height: 275px;"> <!-- Untuk text box -->
                        <form action="action/newchat.php?&ticketid=<?= $_GET['ticketid']; ?>" method="post">

                            <div class="form-group" style="margin-top: 10px;">
                                <textarea id="tinyMceArea" rows="6" name="messageinput" placeholder="Reply here..."></textarea>                
                            </div>
                            <?php if($row['status'] == 1): ?>
                                <button type="submit" class="btn btn-sm btn-primary">SEND</button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-sm btn-primary" disabled="true">SEND</button>
                            <?php endif; ?>                                
                            
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

<!-- TinyMCE -->
<script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=1p764owp8cnt1h9xt5zf1u7y1oowy0k4eumv95k37rrbpawy'></script>
<script>
    tinymce.init({
        selector: '#tinyMceArea',
        menubar:false,
        statusbar: false,
        plugins: 'code image',
        toolbar: [
            "styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image"
        ],

        
        <?php if($row['status'] == 2): ?>
        readonly:1,
        <?php else: ?>
        readonly:0,
        <?php endif; ?>

        images_upload_url: 'uploadTiny.php',
        
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
        
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'uploadTiny.php');
        
            xhr.onload = function() {
                var json;
            
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
            
                json = JSON.parse(xhr.responseText);
            
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
            
                success(json.location);
            };
        
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
        
            xhr.send(formData);
        },
    });
</script>

</body>
</html>