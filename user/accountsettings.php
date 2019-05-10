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
  
  $sql = "SELECT * FROM msdata WHERE nim=?";

  $data = [$_SESSION['nim']];

  $result = $key->prepare($sql);
  $result->execute($data);

  $row = $result->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

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

.container-profile {
  position: relative;
  width: 50%;
}

.container-profile img {
  width: 100%;
  height: auto;
}

.upload {
    width: 0px;
    height: 0px;
    opacity: 0;
}
.upload + label {
  position: absolute;
  top: 50%;
  left: 49%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  width:140px;
  height:140px;
  border-radius:50%;
  opacity:0;
  transition: .5s ease;
}

.upload:focus + label,
.upload + label:hover {
  opacity: 0.5;
  transition: .5s ease;
  cursor:pointer;
}

/*
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
  padding-top: 25px;
  padding-bottom :25px;
}

.sidebar a {
  display: block;
  color: black;
  padding: 10px;
  padding-left: 18px;
  text-decoration: none;
  transition: .5s ease;
}

.sidebar p {
  padding-left: 18px;
}

.sidebar img {
  padding-left: 18px;
}

.sidebar a.active {
  background-color: #4CAF50;
  color: white;
  transition: .5s ease;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
  transition: .5s ease;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
*/

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
        <li class="nav-item">
          <a class="nav-link" href="halaman_ticket.php">Recent Ticket</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" style="padding-right:50px;">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown dropleft">
            <a class="nav-link dropdown-toggle" href="index.php" id="navbardrop" data-toggle="dropdown">
            <?= $_SESSION['nama'];?> <img src="<?= $_SESSION['profile']; ?>" style="width:35px;">
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
  <a href="chatroom.php"><i class="fa fa-comments"></i> Chatroom</a>
  <a class="active" href="accountsettings.php"><i class="fa fa-cogs"></i> Account Settings</a>
  </small>
</div>-->

<div class="container-fluid">

<a href="form_ticket.php" id="button-create" class="btn btn-warning"><i class="fa fa-plus"></i> Create New Ticket</a>

<div class="container bg-1" style="border:solid;border-width:thin;border-radius:5px;padding:10px;">
<form action="edit_user.php" method="post" enctype="multipart/form-data">
    <h3><i class="fa fa-cogs"></i> Account Settings</h3>
    <hr/>
    <div class="row" style="padding:20px;">
        <div class="col col-md-6 text-center" style="background-color:lightgrey;padding:20px;border:solid;border-width:thin;border-radius:5px;">
          <div class="container container-profile">
          <img src="<?= $_SESSION['profile']; ?>" style="width:140px;">
          <input type="file" id="file" class="upload" name="foto">
          <label for="file"><br/>Change Profile Photo</label>
        </div>      
            <hr/>
            <?= $_SESSION['nama'];?>
            <br/>
            <?= $_SESSION['nim'];?>
            <br/>
            <?= $_SESSION['email'];?>
    </div>
        <div class="col col-md-6">
            
                <div class="form-group">
                    <label for="recentPassword">Recent Password :</label>
                    <input type="password" class="form-control" name="recentPassword" placeholder=""">
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password :</label>
                    <input type="password" class="form-control" name="newPassword" placeholder="" onchange="myFunction()">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm New Password :</label>
                    <input type="password" class="form-control" name="confirmNewPassword" placeholder="" onchange="myFunction()">
                    <label id="notequal" style="color: red; font-weight: bold;"></label>
                </div>
                <!--<div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Attach File</label>
                    </div>
                </div>-->
                <button type="submit" class="btn btn-primary" id="simpan">Submit</button>
                <a href="index.php" id="cancel" name="cancel" class="btn btn-secondary">Cancel</a>
            
        </div>
    </div>
    </form>
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
<script>
  function myFunction(){
    var newpassword = document.getElementsByClassName("form-control")[1].value;
    var confirm = document.getElementsByClassName("form-control")[2].value;
    if(newpassword === "" && confirm === ""){
      document.getElementById("simpan").disabled = false;
      document.getElementById("notequal").innerText = "";
    }else if(newpassword != confirm){ 
      document.getElementById("notequal").innerText = "Password tidak sama";
      document.getElementById("simpan").disabled = true;
    }else if(newpassword === confirm){ 
      document.getElementById("simpan").disabled = false;
      document.getElementById("notequal").innerText = "";
    }
  }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="dist/sweetalert2.all.min.js"></script>
</body>
</html>