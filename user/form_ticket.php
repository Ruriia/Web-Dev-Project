<?php
  session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "Mahasiswa"){
          header('location:../admin/index.php');
      }
  }
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
  padding-top: 15px;
  padding-bottom: 15px;
  border: 0;
  border-radius: 0;
  margin-bottom: 0;
  font-size: 12px;
  letter-spacing: 5px;
}
.navbar-nav  li a:hover {
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
</style>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="index.php">KRS Guides</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alamat.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" style="padding-right:50px;">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown dropleft">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <?= $_SESSION['nama'];?> <img src="https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1" style="width:35px;">
            </a>
            <div class="dropdown-menu" style="letter-spacing:0px;">
                <a class="dropdown-item" href="accountsettings.php">Account Settings</a>
                <a data-target="#modalLogout" data-toggle="modal" class="dropdown-item" id="navlogout" href="#modalLogout">Logout</a>
            </div>
        </li>
        </ul>
      </form>
    </div>
</nav>

    <div class="container-fluid">

        <div class="container" style="border:solid;border-width:thin;border-radius:5px;padding:10px;">
            <?php
              require "../admin/action/databasekey.php";
              $key = connection();              
              $sql = "SELECT * FROM msticket ORDER BY no_ticket DESC LIMIT 1";
              $result = $key->prepare($sql);
              $result->execute();
              $data = $result->fetch();
              $no = $data['no_ticket'] + 1;            
            ?>

            <h3>Create New Ticket</h3>
            <h5>Ticket no: <?= $no; ?></h5>
            <br/>
            <form action="action/insert_ticket.php" method="post">
                <div class="form-group">
                    <label for="nama">Email :</label>
                    <input type="text" class="form-control" name="emailticket" placeholder="" value="<?= $_SESSION['email'];?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap :</label>
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="" value="<?= $_SESSION['nama'];?>" readonly>
                </div>
                <div class="form-group">
                    <label for="student_id">NIM :</label>
                    <input type="text" class="form-control" name="student_id" placeholder="" value="<?= $_SESSION['nim'];?>" readonly>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="subject">Subject :</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="category">Category :</label>
                            <select class="form-control" name="category">
                            <option selected disabled>Choose...</option>
                            <option value="1">Problem Finding Class</option>
                            <option value="2">About the Professor</option>
                            <option value="3">About the Subject</option>
                            <option value="4">About the Schedule</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="priority">Choose Your Priority :</label>
                    <br/>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="low_priority" value="1">
                        <label class="form-check-label" for="low_priority">Low</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="medium_priority" value="2">
                        <label class="form-check-label" for="medium_priority">Medium</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="high_priority" value="3">
                        <label class="form-check-label" for="high_priority">High</label>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="Textarea1" rows="6" name="pertanyaan"></textarea>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Attach File</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php" id="cancel" name="cancel" class="btn btn-secondary">Cancel</a>
            </form>

        </div>

    </div>

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
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>&copy; Flexbox Gang.</p>
</footer>    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>