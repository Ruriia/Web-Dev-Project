<?php
session_start();
if($_POST['search'] != ""){
    $_SESSION['dicari'] = $_POST['search'];
}

header("location: masteradmin.php?page=recentusers&authorize=1");

?>