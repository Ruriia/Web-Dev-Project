<?php
require "../../admin/action/databasekey.php";
session_start();
$key = connection();

$sql = "INSERT INTO ticket(email, nim, subject, category, priority, date_created, time_created, done) 
values (?,?,?,?,?,?,?,1)";

$result = $key->prepare($sql);

date_default_timezone_set('Asia/Jakarta');
$date = date("d/m/Y");
$time = date("H:i:s");
$date = date('Y-m-d', strtotime($date));


$data = [
    $_POST['emailticket'],
    $_POST['student_id'],
    $_POST['subject'],
    $_POST['category'],
    $_POST['inlineRadioOptions'],
    $date,
    $time
];

$result->execute($data);

$sql1 = "SELECT * FROM ticket WHERE email = ? ORDER BY questionid DESC";
$result = $key->prepare($sql1);
$data = $_SESSION['email'];
$result->execute([$data]);
$row = $result->fetch();
$noticket = $row['questionid'];

if ($_FILES['gambar']['size'] != 0 && $_FILES['gambar']['error'] == 0){
    $sql2 = "INSERT INTO question(questionid,sender,message,gambar,dari,date_sent,time_sent) values(?,?,?,?,1,?,?)";
    $foto = $_FILES['gambar'];
    $ext = explode(".", $foto['name']);
    $ext = end($ext);
    $ext = strtolower($ext);
    $ext_boleh = ['jpg', 'png', 'jpeg'];
    if(in_array($ext, $ext_boleh)){
        $sql = "SELECT * FROM question ORDER BY answerid DESC";
        $result = $key->prepare($sql);
        $result->execute();
        $data = $result->fetch();
        $no = $data['answerid'] + 1;        
        $sumber = $foto['tmp_name'];
        $tujuan = '../ticketuser/' . $no . '.' . $ext;
        move_uploaded_file($sumber, $tujuan);
        $ambilgambar = 'ticketuser/' . $no . '.' . $ext;
        $updatequestion = [
            $noticket,
            $_POST['pertanyaan'],
            $ambilgambar
        ];
        $masuk = $key->prepare($sql2);
        $masuk->execute($updatequestion);
        header("location:../index.php");
    }
}else{
    $sql2 = "INSERT INTO question(questionid,sender,message,dari,date_sent,time_sent) values (?,?,?,1,?,?)";
    $jalan = $key->prepare($sql2);
    $masuk = [
        $noticket,
        $_SESSION['nama'],
        $_POST['pertanyaan'],
        $date,
        $time
    ];
    $jalan->execute($masuk);
    header("location:../index.php");
}


?>