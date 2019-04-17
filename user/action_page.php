<?php
    require "../admin/action/databasekey.php";

    $key = connection();
    

    $sql = "INSERT INTO ticket(email,nim,subject_ticket,question,category,priority) VALUES (?,?,?,?,?,?)";
    $data = [
        $_POST['nama'],
        $_POST['student_id'],
        $_POST['subject']

    ]


?>