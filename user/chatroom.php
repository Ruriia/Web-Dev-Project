<?php
  session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "Mahasiswa"){
          header('location:../admin/index.php');
      }
  }


  require "../admin/action/databasekey.php";
  $key = connection();

  $sql1 = "SELECT question.ticketid, question.message, question.gambar, question.dari, question.sender,
  msdata.nama AS namauser,
  question.date_sent AS date, question.time_sent AS time
  FROM question, msdata, ticket
  WHERE question.ticketid = ticket.ticketid AND msdata.email = ticket.email";
  $result = $key->query($sql1);

  $sql2 = "SELECT msdata.nama as namauser, mscategory.keterangan as kategori, ticket.subject as subjek,
  mspriority.keterangan as prioritas, referticket.keterangan as done
  from msdata, ticket, question, mscategory, mspriority, referticket where
  ticket.ticketid = ? and ticket.email = msdata.email and ticket.category = mscategory.category
  and mspriority.priority = ticket.priority and referticket.done = ticket.done";
  $hasil = $key->prepare($sql2);
  $hasil->execute([$_GET['number']]);
  $row = $hasil->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chatroom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style>
  body {
    background-color: #F7F7F7;
    font: Montserrat, sans-serif;
    line-height: 1.8;
    color: black;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 {
    background-color: #ffffff;
    color: black;
  }
  .bg-2 {
    background-color: lightgrey; 
    color: black;
  }
  .bg-3 {
    background-color: #ffffff;
    color: #555555;
  }
  .bg-4 {
    background-color: #2f2f2f; 
    color: #fff;
  }
  .container-fluid {
    padding-top: 50px;
    padding-bottom: 50px;
  }
  .navbar {
    background-color: #6A95CC;
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 2px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }

  .navbar-nav button:hover {
    color: #1abc9c !important;
  }

  .buttondown:hover {
    color: white;
  }
  a {
    color: white;
  }
  a:hover {
    text-decoration: none;
  }

  li.dropdown {
    list-style-type: none;
  }


  #button-create {
    display: inline-block;
    width: auto;
    height: auto;
    text-align: center;
    border-radius: 50px;
    position: fixed;
    bottom: 30px;
    right: 30px;
    padding: 10px;
    color:white;
    z-index: 5;
  }
  </style>


</head>


<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand" href="index.php">KRS Guides</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="chatroom.php">Chatroom</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="halaman_ticket.php">Recent Ticket</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" style="padding-right:50px;">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown dropleft">
            <a class="nav-link dropdown-toggle" href="index.php" id="navbardrop" data-toggle="dropdown">
            <?= $_SESSION['nama'];?> <img src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1" style="width:35px;">
            </a>
            <div class="dropdown-menu" style="letter-spacing:0px;">
                <a class="dropdown-item" href="accountsettings.php">Account Settings</a>
                <a class="dropdown-item" href="about.html">About Us</a>
                <button type="button" id="tombol" class="dropdown-item" onclick="sweetclick()">Logout</button>
            </div>
        </li>
        </ul>
      </form>
    </div>
  </nav>

<!-- The sidebar
<div class="sidebar">
  <img src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1" style="width:70px;">
  <small><p>Welcome, <b><?= $_SESSION['nama'];?></b>
  <br/>
  Your ID: <?= $_SESSION['nim'];?></small></p>
  <hr/>
  <small>
  <a href="form_ticket.php"><i class="fa fa-envelope"></i> Create New Ticket</a>
  <a class="active" href="chatroom.php"><i class="fa fa-comments"></i> Chatroom</a>
  <a href="accountsettings.php"><i class="fa fa-cogs"></i> Account Settings</a>
  </small>
</div>-->

<div class="container-fluid">

<a href="form_ticket.php" id="button-create" class="btn btn-warning"><i class="fa fa-plus"></i> Create New Ticket</a>

<div class="container bg-1" style="border:solid;border-width:thin;border-radius:5px;padding:10px;">

    <h3><i class="fa fa-comments"></i> Chatroom</h3>
    <hr/>
    <div class="row" style="padding:20px;">
        <div class="col-sm-3"> <!-- Untuk Ticket Info -->
            <h1 class="h3">Ticket Information</h1>
            <p>User: &ensp;<?= $row['namauser']; ?></p>
            <p>Ticket no: &ensp;<?= $_GET['number']; ?></p>
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
                            <?php if($data['ticketid'] == $_GET['number']): ?>
                                <?php if($data['dari'] == 2): ?>
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

                                <?php if($data['dari'] == 1): ?>
                                    <div class="row">
                                        <div class="col-sm-6 mt-3"></div>

                                        <div class="col-sm-6 mt-3" style="border-radius:20px; background: #f4f4f4; padding-top: 5px; margin-bottom: 10px;">            
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
                        <form action="action/newchat.php?&ticketid=<?= $_GET['number']; ?>" method="post">
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

</div>

</div>

<!--<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="modalLogoutLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLogoutLabel">Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">
          <a href="../logout.php">Yes, Logout</a>
         </button>
      </div>
    </div>
  </div>
</div>-->

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>&copy; Flexbox Gang.</p>
</footer>

<script>
  function sweetclick(){
    Swal.fire({
    title: 'Are you sure you want to logout?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes!'
  }).then((result) => {
    if (result.value) {
      window.location.href = "../logout.php";
    }
  })
  }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="dist/sweetalert2.all.min.js"></script>
</body>
</html>