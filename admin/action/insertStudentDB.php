<?php
require "databasekey.php";
$key = connection();

$query = "INSERT INTO msdata values (?,?,?,?,?,?,?,?,1)";

$run = $key->prepare($query);

$getdata = [
    $_POST['inputnim'],
    $_POST['inputemail'],
    $_POST['inputpassword'],
    $_POST['inputname'],
    $_POST['inputgender'],
    $_POST['inputyear'],
    $_POST['inputfaculty'],
    $_POST['inputmajor'],
];

$run->execute($getdata);


?>