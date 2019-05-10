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
  $i = 0;
  $key = connection();

  $sql = "SELECT ticket.ticketid as nomortiket, ticket.subject as subjek, mscategory.keterangan as kategori, msdata.nama as nama, ticket.date_created as tanggal, ticket.time_created as jam, mspriority.keterangan as prioritas, referticket.keterangan as status from ticket, referticket, mspriority, mscategory, msdata where ticket.nim = ? and msdata.nim = ? and  mscategory.category = ticket.category and mspriority.priority = ticket.priority and referticket.done = ticket.done";

  $run = $key->prepare($sql);
  $run->execute([$_SESSION['nim'], $_SESSION['nim']]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

<style>
body {
  font: Montserrat, sans-serif;
  line-height: 1.8;
  color: black;
  overflow-x: hidden;
  background-color: #F7F7F7;
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
.bg-container {
  padding-top: 15px;
  background-color: #ffffff;
  color: black;
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
  color: black !important;
}

.navbar-nav button:hover {
  color: black !important;
}

/*
#navbar1 {
  position: fixed;
  top: -70px;
  width: 100%;
  display: block;
  transition: top 0.3s;
}

#navbar1 a {
  float: left;
  display: block;
}
*/

#navbar a:hover {
  background-color: #ddd;
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

#button-create-1 {
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
  opacity: 0;
}
</style>
</head>
<body>

<!-- Navbar -->
<!--<div id="navbar1">-->
<nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand" href="#">KRS Guides</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="halaman_ticket.php">Recent Ticket</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" style="padding-right:50px;">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown dropleft">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              <?= $_SESSION['nama'];?> <img src="<?= $_SESSION['profile']?>" style="width:35px;">
              </a>
              <div class="dropdown-menu" style="letter-spacing:0px;">
                <a class="dropdown-item" href="accountsettings.php">Account Settings</a>
                <a class="dropdown-item" href="about.html">About Us</a>
                <!--<a data-target="#modalLogout" data-toggle="modal" class="dropdown-item" id="navlogout" href="#modalLogout">Logout</a>-->
                <button type="button" id="tombol" class="dropdown-item" onclick="sweetclick()">Logout</button>
              </div>
          </li>
        </ul>
      </form>
    </div>
  </nav>
  <!--</div>-->

<!-- The sidebar
<div class="sidebar">
  <img src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1" style="width:70px;">
  <small><p>Welcome, <b><?= $_SESSION['nama'];?></b>
  <br/>
  Your ID: <?= $_SESSION['nim'];?></small></p>
  <hr/>
  <small>
  <a href="form_ticket.php"><i class="fa fa-envelope"></i> Create New Ticket</a>
  <a href="chatroom.php"><i class="fa fa-comments"></i> Chatroom</a>
  <a href="accountsettings.php"><i class="fa fa-cogs"></i> Account Settings</a>
  </small>
</div>-->

<!-- First Container -->
<div class="container-fluid">
<h1>Your Ticket</h1>
  <div class="card mb-4">
                <div class="card-body">
                    <!--Table-->
                    <table class="table">
                        <!--Table head-->
                         <thead class="mdb-color darken-3">
                            <tr class="judul" style="color: black;">
                                <th>No Ticket</th>
                                <th>Subject</th>
                                <th>Category</th>
                                <th>Username</th>
                                <th>Date Created</th>
                                <th>Time Created</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                          <?php while($row = $run->fetch()): 
                            $i++?>
                            <tr>
                                <td><?= $row['nomortiket'] ?></td>
                                <td><?= $row['subjek'] ?></td>
                                <td><?= $row['kategori'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= $row['jam'] ?></td>
                                <td><?= $row['prioritas'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><a href="chatroom.php?number=<?= $row['nomortiket']; ?>"><font color="#6A95CC">See Details</font></a></t>
                            </tr>
                          <?php endwhile; ?>
                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
            </div>
 
</div>

    <!--
      <div class="d-flex">
        <div class="mr-auto p-3"><h3>Make Your<br/>TICKETS!</h3>
          <p>There are 3 categories :</p>
            <p>- Problem Finding Class<br/>
            - About the Professor<br/>
            - About the Subject<br/>
            - About the Schedule
        </div>
        <div class="p-3"><img src="images/ticket.jpg" alt="code" style="width:250px;height:130px">
        <br/>
        <a href="form_ticket.php" id="formticket" name="formticket" class="btn btn-primary btn-block">Create New Ticket</a>
        <a href="#" id="recentticket" name="recentticket" class="btn btn-secondary btn-block">Show Recent Ticket</a>
        </div>
      </div>
      <div class="col col-md bg-container text-center">
        <button class="btn btn-default buttondown" data-toggle="collapse" data-target="#demo"><i class="fa fa-chevron-down"></i>
      </div>
    </div>
  </div>

    <div id="demo" class="collapse">
    <div class="container">

    <div class="d-flex justify-content-around bg-container" style="padding-top:40px;padding-bottom:40px;">
      <div class="category text-center">
        <img src="images/code.jpg" alt="code" style="width:220px;height:130px">
        <p>Problem Finding Class</p>
      </div>
      <div class="category text-center">
        <img src="images/code.jpg" alt="code" style="width:220px;height:130px">
        <p>About the Professor</p>
      </div>
      <div class="category text-center">
        <img src="images/code.jpg" alt="code" style="width:220px;height:130px">
        <p>About the Subject</p>
      </div>
      <div class="category text-center">
        <img src="images/code.jpg" alt="code" style="width:220px;height:130px">
        <p>About the Schedule</p>
      </div>
    </div> -->

    </div>
  </div>

</div>
<!--
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="modalLogoutLabel" aria-hidden="true">
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
</div> -->

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
  
// When the user scrolls down 20px from the top of the document, slide down the navbar
/*
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar1").style.top = "0";
  } else {
    document.getElementById("navbar1").style.top = "-70px";
  }
}
*/

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="dist/sweetalert2.all.min.js"></script>
<script src="components/js/adminlte.min.js"></script>
</body>
</html>
