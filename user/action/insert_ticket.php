<?php
require "../../admin/action/databasekey.php";

$key = connection();

$sql = "INSERT INTO msticket(subjek, kategori, prioritas, user_email, message, date_created, time_created, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$result = $key->prepare($sql);

date_default_timezone_set('Asia/Jakarta');
$date = date("d/m/Y");
$time = date("H:i");
$status = "Opened";

$data = [
    $_POST['subject'],
    $_POST['category'],
    $_POST['inlineRadioOptions'],
    $_POST['emailticket'],
    $_POST['pertanyaan'],
    $date,
    $time,
    $status
];

$result->execute($data);

?>