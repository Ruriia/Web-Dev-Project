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
$pw = password_hash($_POST['confirmNewPassword'], PASSWORD_BCRYPT);

if ($_POST['confirmNewPassword']!=""){
    if ($_FILES['foto']['size'] != 0 && $_FILES['foto']['error'] == 0){
        $foto = $_FILES['foto'];
        $ext = explode(".", $foto['name']);
        $ext = end($ext);
        $ext = strtolower($ext);
    
        $ext_boleh = ['jpg', 'png', 'jpeg'];
        if(in_array($ext, $ext_boleh)){
            $sumber = $foto['tmp_name'];
            $tujuan = 'profilepicture/' . $_SESSION['nim'] . '.' . $ext;
            move_uploaded_file($sumber, $tujuan);
            $_SESSION['profile'] = $tujuan;
            $queryubahgambar = "UPDATE msdata set image=?, password = ? where nim=?";
            $ubahdata = [
                $tujuan,
                $pw,
                $_SESSION['nim']
            ];
            $ubah = $key->prepare($queryubahgambar);
            $ubah->execute($ubahdata);
            
        }
}else{
    if ($_FILES['foto']['size'] != 0 && $_FILES['foto']['error'] == 0){
        $foto = $_FILES['foto'];
        $ext = explode(".", $foto['name']);
        $ext = end($ext);
        $ext = strtolower($ext);
    
        $ext_boleh = ['jpg', 'png', 'jpeg'];
        if(in_array($ext, $ext_boleh)){
            $sumber = $foto['tmp_name'];
            $tujuan = 'profilepicture/' . $_SESSION['nim'] . '.' . $ext;
            move_uploaded_file($sumber, $tujuan);
            $_SESSION['profile'] = $tujuan;
            $queryubahgambar = "UPDATE msdata set image=? where nim=?";
            $ubahdata = [
                $tujuan,
                $_SESSION['nim']
            ];
            $ubah = $key->prepare($queryubahgambar);
            $ubah->execute($ubahdata);
            
        }
        header("location: index.php");
    }
}


?>