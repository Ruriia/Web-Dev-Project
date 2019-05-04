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

header("refresh: 2; ../masteradmin.php?page=recentusers&authorize=1")
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
