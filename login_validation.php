<?php
require "admin/action/databasekey.php";
session_start();
$key = connection();

$sql = "SELECT * FROM msdata WHERE email=?";

$result = $key->prepare($sql);
$data = [$_POST['email']];
$result->execute($data);
$fetchdata = $result->fetch();
    if(password_verify($password, $row['password'])){
        $_SESSION['nama'] = $fetchdata['nama'];
        if($fetchdata['authorize'] == 1){
            $_SESSION['loginas'] = "mahasiswa";
            header("location:user/index.php");
        }else if($fetchdata['authorize'] == 2){
            $_SESSION['loginas'] = "admin";
            header("location:admin/index.php");
        }
    }
    else{
        header("location:form_login.php"); 
    }







?>