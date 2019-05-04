<?php
require "databasekey.php";
$key = connection();

$query = "INSERT INTO msdata (email, birthdate, password, nama, gender, authorize, image) values (?,?,?,?,?,2,?)";
$gambar = "action/profilepicture/admin.png";
$run = $key->prepare($query);
$password = password_hash($_POST['inputpassword'], PASSWORD_BCRYPT);
$getdata = [
    $_POST['inputemail'],
    $_POST['inputbirthday'],
    $password,
    $_POST['inputname'],
    $_POST['radio'],
    $gambar
];

$run->execute($getdata);

header("refresh: 2;../masteradmin.php?page=recentadmin&authorize=2");
?>

<script src="../../user/dist/sweetalert2.all.min.js"></script>

<script>
  function sweetclick(){
    Swal.fire({
      type: 'success',
      title: 'Update Berhasil!',
      showConfirmButton: false,
      timer: 3000,
  })
  }
  window.onload = sweetclick;
</script>
