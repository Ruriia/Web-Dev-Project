<?php
    require "../admin/action/databasekey.php";

    $key = connection();
    
    $check = "SELECT nim FROM msdata where nim = ?";
    $check1 = [$_POST['student_id']];

    $result = $key->prepare($check);

    $datanim = $result->fetch($check1);

    if($datanim == $check1){
    

    $sql = "INSERT INTO ticket(email,nim,subject_ticket,question,category,priority) VALUES (?,?,?,?,?,?)";
    $data = [
        $_POST['nama'],
        $_POST['student_id'],
        $_POST['subject']
    ];

    }else{
        echo "NIM anda tidak terdaftar";
    }


?>