<?php
    require "../admin/action/databasekey.php";

    $key = connection();
    

    $sql = "INSERT INTO ticket(email,nim,subject,question,category,priority) VALUES (?,?,?,?,?,?)";


?>