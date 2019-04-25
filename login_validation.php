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
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['nim'] = $fetchdata['nim'];
        $_SESSION['nama'] = $fetchdata['nama'];
        $_SESSION['loginfail'] = 0;
        if($fetchdata['authorize'] == 1){
            
            $_SESSION['loginas'] = "mahasiswa";
            header("location:user/index.php");
        }else if($fetchdata['authorize'] == 2){
            $_SESSION['loginas'] = "admin";
            header("location:admin/index.php");
        }
    }
    else{
        $_SESSION['loginfail'] = 1;
        header("location:form_login.php"); 
        
    }
}else{
    $_SESSION['loginfail'] = 2;
    header("location:form_login.php");
}


?>