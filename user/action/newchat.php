<?php
require "../../admin/action/databasekey.php";
session_start();
$key = connection();

$sql = "INSERT INTO question(ticketid, sender, message, dari, date_sent, time_sent) VALUES(?, ?, ?, ?, ?, ?)";

date_default_timezone_set('Asia/Jakarta');
$time = date("H:i:s");
//$date = date("d/m/Y");
//$date = date('Y-d-m', strtotime($date));

$date = date("d/m/Y");
$date = DateTime::createFromFormat('d/m/Y', $date);
$date = $date->format('Y-m-d');

$dari;
if($_SESSION['loginas'] == "Mahasiswa"){
    $dari = 1;
}elseif($_SESSION['loginas'] == "Admin"){
    $dari = 2;
}

$data = [
    $_GET['ticketid'],
    $_SESSION['nama'],
    $_POST['messageinput'],
    $dari,
    $date, 
    $time
];

$result = $key->prepare($sql);
$result->execute($data);

header("location: ../chatroom.php?number=" . $_GET['ticketid']);
?>