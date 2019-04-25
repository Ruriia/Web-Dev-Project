<?php
    session_start();
    require 'databasekey.php';
    $key = connection();

    $sqlselect = "SELECT * FROM msdata WHERE email = ?";

    $hasilselect = $key->prepare($sqlselect);  
    $hasilselect->execute([$_SESSION['email']]);

    $data = $hasilselect->fetch();

    //$password = "passwordbaru";
    
    /*
    if(password_verify($_POST['newpassword'], $data['password'])){
        $password = $_POST['newpassword'];
    }elseif($_POST['newpassword'] == ""){
        $password = $data['password'];
    }
    */
    

    $sqlupdate = "UPDATE msdata SET nama=?, email=?, password=?
                WHERE email=?";
    $file = [
        $_POST['inputnama'],
        $_POST['inputemail'],
        $password,
        $_SESSION['email']
    ];

    $hasilupdate= $key->prepare($sqlupdate);
    $hasilupdate->execute($file);
    
?>