<?php
    session_start();
    require 'databasekey.php';
    $key = connection();

    $sqlselect = "SELECT * FROM msdata WHERE email = ?";

    $hasilselect = $key->prepare($sqlselect);  
    $hasilselect->execute([$_SESSION['email']]);

    $data = $hasilselect->fetch();

<<<<<<< Updated upstream
    $password = "passwordbaru";
    
    /*
    if(password_verify($_POST['newpassword'], $data['password'])){
        $password = $_POST['newpassword'];
    }elseif($_POST['newpassword'] == ""){
        $password = $data['password'];
=======
    $password;

    if($_POST['newpassword'].empty() || $_POST['newpassword'] == $data['password']){
        $sql = "UPDATE msdata SET nama = ?, email = ?";
        $input = [
            $_POST['inputnama'],
            $_POST['inputemail']
        ];
    }else{
        $sql = "UPDATE msdata SET nama = ?, email = ?, "
>>>>>>> Stashed changes
    }
        

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