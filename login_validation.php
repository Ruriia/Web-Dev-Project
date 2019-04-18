<?php
require "admin/action/databasekey.php";

$key = connection();
//$a = "mysql:host=localhost; dbname=unimedia_kamis_helpdesk";

//$key = new PDO($a, "root","");

$sql = "SELECT * FROM msdata WHERE email=?";

$result = $key->prepare($sql);
$data = [$_POST['email']];
$result->execute($data);
$fetchdata = $result->fetch();
    if($fetchdata['email'] == $_POST['email'] && $fetchdata['password'] == $_POST['katasandi']){
        if($fetchdata['authorize'] == 1){
            header("location:user/index.php");
        }else if($fetchdata['authorize'] == 2){
            header("location:admin/index.php");
        }
    }
    else{
        $error = "Your email or password is invalid!!!";
        header("location:form_login.php"); 
        
    }







?>