<?php
require "databasekey.php";
$key = connection();
date_default_timezone_set('Asia/Jakarta');
$date = date("d/m/Y");
$date = DateTime::createFromFormat('d/m/Y', $date);
$date = $date->format('Y-m-d');
$birth = DateTime::createFromFormat('d/m/Y', $_POST['inputbirthday']);
$birth = $birth->format('Y-m-d');
$query = "INSERT INTO msdata(email,birthdate,password,nama,gender,academic_year,faculty,major,authorize,image,date_created) values (?,?,?,?,?,?,?,?,1,?,?)";

$run = $key->prepare($query);
$gambar = "profilepicture/user.png";
$password = password_hash($_POST['inputpassword'], PASSWORD_BCRYPT);
$getdata = [
    $_POST['inputemail'],
    $birth,
    $password,
    $_POST['inputname'],
    $_POST['radio'],
    $_POST['inputyear'],
    $_POST['inputfaculty'],
    $_POST['inputmajor'],
    $gambar,
    $date
];

$run->execute($getdata);

header("refresh: 2; ../masteradmin.php?page=recentusers&authorize=1")
?>
<script src="../../user/dist/sweetalert2.all.min.js"></script>

<script>
  function sweetclick(){
    Swal.fire({
      type: 'success',
      title: 'Berhasil membuat akun student baru!',
      showConfirmButton: false,
      timer: 3000,
  })
  }
  window.onload = sweetclick;
</script>
