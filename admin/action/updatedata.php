<?php
    session_start();

    require 'databasekey.php';
    $key = connection();

    $sqlselect = "SELECT * FROM msdata WHERE email = ?";

    $hasilselect = $key->prepare($sqlselect);  
    $hasilselect->execute([$_SESSION['email']]);

    $data = $hasilselect->fetch();

    $password = $_SESSION['password'];
    $newpassverify = 1;
    $oldpassverify = 1;
    if ($_FILES['foto']['size'] != 0 && $_FILES['foto']['error'] == 0){
        $foto = $_FILES['foto'];
        $ext = explode(".", $foto['name']);
        $ext = end($ext);
        $ext = strtolower($ext);
        $ext_boleh = ['jpg', 'png', 'jpeg'];
        if(in_array($ext, $ext_boleh)){
            $sumber = $foto['tmp_name'];
            $tujuan = '../profilepicture/' . $_SESSION['nim'] . '.' . $ext;
            move_uploaded_file($sumber, $tujuan);
            $ambilgambar = 'profilepicture/' . $_SESSION['nim'] . '.' . $ext;
           
            $queryubahgambar = "UPDATE msdata set image=? where nim=?";
            $ubahdata = [
                $ambilgambar,
                $_SESSION['nim']
            ];
            $_SESSION['profile'] = $ambilgambar;
            $ubah = $key->prepare($queryubahgambar);
            $ubah->execute($ubahdata);
            
        }
    }
        
    
    if(!empty($_POST['oldpassword'])){   
        if(password_verify($_POST['oldpassword'], $_SESSION['password'])){
            $oldpassverify = 1;
        // Cek kesesuaian old password dengan password yang digunakan untuk login
            if($_POST['newpassword'] == ""){
                // Cek apakah form new password diisi
                $newpassverify = 0;  
                header("location:../masteradmin.php?page=accountsettings&iderror=2");    
            }else {
                if($_POST['newpassword'] == $_POST['confirmpassword']){
                    $password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
                    $newpassverify = 1;
                }else{
                  header("location:../masteradmin.php?page=accountsettings&iderror=3"); 
                }                
            }

        }else {
            $oldpassverify = 0;
            header("location:../masteradmin.php?page=accountsettings&iderror=1");          
        }
    }

   
?>



<?php       
    if($newpassverify == 1 && $oldpassverify == 1){
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
        $_SESSION['email'] = $_POST['inputemail'];
        $_SESSION['nama'] = $_POST['inputnama'];
        header("location:../success.php");
    }

?>
