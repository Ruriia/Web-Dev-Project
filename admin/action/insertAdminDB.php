<?php
require "databasekey.php";
$key = connection();
date_default_timezone_set('Asia/Jakarta');
$date = date("d/m/Y");
$date = DateTime::createFromFormat('d/m/Y', $date);
$date = $date->format('Y-m-d');
$birth = DateTime::createFromFormat('d/m/Y', $_POST['inputbirthday']);
$birth = $birth->format('Y-m-d');
$query = "INSERT INTO msdata (email, birthdate, password, nama, gender, authorize, image,date_created) values (?,?,?,?,?,2,?,?)";
$gambar = "profilepicture/admin.png";
$run = $key->prepare($query);
$password = password_hash($_POST['inputpassword'], PASSWORD_BCRYPT);
$getdata = [
    $_POST['inputemail'],
    $birth,
    $password,
    $_POST['inputname'],
    $_POST['radio'],
    $gambar,
    $date
];

$run->execute($getdata);

header("refresh: 2;../masteradmin.php?page=recentadmin&authorize=2");
?>

<script src="../../user/dist/sweetalert2.all.min.js"></script>

<script>
  function sweetclick(){
    Swal.fire({
      type: 'success',
      title: 'Berhasil membuat akun admin baru!',
      showConfirmButton: false,
      timer: 3000,
  })
  }
  window.onload = sweetclick;
</script>
