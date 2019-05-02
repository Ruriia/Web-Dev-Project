<?php

session_start();
if(!isset($_SESSION['loginas'])){
    header('location:../form_login.php');
}else{
    if($_SESSION['loginas'] != "Mahasiswa"){
        header('location:../admin/index.php');
    }
}



/*if ($_FILES['foto']['size'] != 0 && $_FILES['foto']['error'] == 0){
    $foto = $_FILES['foto'];
    $ext = explode(".", $foto['name']);
    $ext = end($ext);
    $ext = strtolower($ext);

    $ext_boleh = ['jpg', 'png', 'jpeg'];
    if(in_array($ext, $ext_boleh)){
        $sumber = $foto['tmp_name'];
        $tujuan = 'profilepicture/' . $_SESSION['nim'] . '.' . $ext;
        move_uploaded_file($sumber, $tujuan);
        $ambilgambar = 'action/profilepicture/' . $_SESSION['nim'] . '.' . $ext;
        $_SESSION['profile'] = $ambilgambar;
        $queryubahgambar = "UPDATE msdata set image=? where nim=?";
        $ubahdata = [
            $ambilgambar,
            $_SESSION['nim']
        ];
        $ubah = $key->prepare($queryubahgambar);
        $ubah->execute($ubahdata);
        
    }
}*/

?>