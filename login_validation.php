<?php
require "admin/action/databasekey.php";
session_start();
$key = connection();

$sql = "SELECT * FROM msdata WHERE email=?";

$result = $key->prepare($sql);
$katasandi = $_POST['katasandi'];
echo $katasandi;
$data = [$_POST['email']];
$result->execute($data);
if($fetchdata = $result->fetch()){
    if(password_verify($katasandi, $fetchdata['password'])){
        $_SESSION['nama'] = $fetchdata['nama'];
        if($fetchdata['authorize'] == 1){
            $_SESSION['loginas'] = "mahasiswa";
            header("location:user/index.php");
            echo "1";
        }else if($fetchdata['authorize'] == 2){
            $_SESSION['loginas'] = "admin";
            header("location:admin/index.php");
            echo "2";
        }
    }
    else{
        header("location:form_login.php"); 
        echo "3";
    }
}else{
    echo "4";
    header("location:form_login.php");
}


?>