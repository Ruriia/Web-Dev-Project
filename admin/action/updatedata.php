<?php
    session_start();

    require 'databasekey.php';
    $key = connection();

    $sqlselect = "SELECT * FROM msdata WHERE email = ?";

    $hasilselect = $key->prepare($sqlselect);  
    $hasilselect->execute([$_SESSION['email']]);

    $data = $hasilselect->fetch();

    $password = $_SESSION['password'];

    
    if(isset($_POST['oldpassword'])){   
        if(password_verify($_POST['oldpassword'], $_SESSION['password'])){
            $_SESSION['oldpassverify'] = 1;
        // Cek kesesuaian old password dengan password yang digunakan untuk login
            if($_POST['newpassword'] == ""){
                // Cek apakah form new password diisi
                // $password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
                $_SESSION['newpassverify'] = 0;     
            }else {                
                $password = $_POST['newpassword'];
                $_SESSION['newpassverify'] = 1;
            }

        }else {
            $_SESSION['oldpassverify'] = 0;
            
        }
    }

    echo "Session Old Password: " . $_SESSION['oldpassverify'];
    echo "<br />";
    echo "Session New Password: " . $_SESSION['newpassverify'];
    echo "<br />";
    echo $password;
    echo "<br />";
    echo "Isinya passbaru emang apaan?" . $_POST['newpassword'];
?>



<?php    
    /*
    if(password_verify($_POST['newpassword'], $data['password'])){
        $password = $_POST['newpassword'];
    }elseif($_POST['newpassword'] == ""){
        $password = $data['password'];
    $password;

    if($_POST['newpassword'].empty() || $_POST['newpassword'] == $data['password']){
        $sql = "UPDATE msdata SET nama = ?, email = ?";
        $input = [
            $_POST['inputnama'],
            $_POST['inputemail']
        ];
    }else{
        $sql = "UPDATE msdata SET nama = ?, email = ?, "
    }   
        

    $sqlupdate = "UPDATE msdata SET nama=?, email=?, password=?
                WHERE email=?";
    $file = [
        $_POST['inputnama'],
        $_POST['inputemail'],
        $password,
        $_SESSION['email']
    ];

    $hasilupdate= $key->prepare($sqlupdate);
    $hasilupdate->execute($file);
    */
?>
