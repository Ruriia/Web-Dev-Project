<?php
require "databasekey.php";
$key = connection();

$query = "INSERT INTO msdata(email,birthdate,password,nama,gender,academic_year,faculty,major,authorize,image) values (?,?,?,?,?,?,?,?,1,?)";

$run = $key->prepare($query);
$gambar = "profilepicture/user.png";
$password = password_hash($_POST['inputpassword'], PASSWORD_BCRYPT);
$getdata = [
    $_POST['inputemail'],
    $_POST['inputbirthday'],
    $password,
    $_POST['inputname'],
    $_POST['radio'],
    $_POST['inputyear'],
    $_POST['inputfaculty'],
    $_POST['inputmajor'],
    $gambar
];

$run->execute($getdata);
?>

<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">

<div class="container-fluid">
    <h1 class="title text-center">Your student's account creation has succeed!</h1>

    <div class="text-center">
        <a href="../masteradmin.php"><button class="btn btn-success"><strong>Back to Home<strong></button></a>
    </div>

</div>
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>