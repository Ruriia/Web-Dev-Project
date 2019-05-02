<?php
require "../../admin/action/databasekey.php";
session_start();
$key = connection();

$sql = "INSERT INTO question(questionid, message, dari) VALUES(?, ?, ?)";

$dari;
if($_SESSION['loginas'] == "Mahasiswa"){
    $dari = 1;
}elseif($_SESSION['loginas'] == "Admin"){
    $dari = 2;
}

$data = [
    $_GET['ticketid'],
    $_POST['messageinput'],
    $dari
];

$result = $key->prepare($sql);
$result->execute($data);

header("location: ../masteradmin.php?page=detail_tickets&ticketid=" . $_GET['ticketid']);
?>