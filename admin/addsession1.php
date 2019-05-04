<?php
session_start();
if($_POST['search'] != ""){
    $_SESSION['dicari'] = $_POST['search'];
}

header("location: masteradmin.php?page=recentadmin&authorize=2");

?>