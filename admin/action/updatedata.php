<?php
    session_start();
    $_SESSION['oldpassverify']=1;
    $_SESSION['newpassverify']=1;
    require 'databasekey.php';
    $key = connection();

    $sqlselect = "SELECT * FROM msdata WHERE email = ?";

    $hasilselect = $key->prepare($sqlselect);  
    $hasilselect->execute([$_SESSION['email']]);

    $data = $hasilselect->fetch();

    $password = $_SESSION['password'];

    
    if(isset($_POST['oldpassword'])){   
        if(password_verify($_POST['oldpassword'], $_SESSION['password'])){
        // Cek kesesuaian old password dengan password yang digunakan untuk login
            if($_POST['newpassword'] == ""){
                // Cek apakah form new password diisi
                // $password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
                $_SESSION['newpassverify'] = 0;
               
            }else {                
                $password = $_POST['newpassword'];
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
    
?>

<?php 

if($_SESSION['oldpassverify'] == 0): ?>
<!-- Modal -->
    <div id="modalOldPassword" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Change password failed</h4>
        </div>
        <div class="modal-body">
            <p>Old password doesn't match with the current password</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
    </div>
    <!-- Modal -->
<?php endif;?>

<?php 

if($_SESSION['newpassverify'] == 0): ?>
<!-- Modal -->
<div id="modalNewPassword" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change password failed</h4>
      </div>
      <div class="modal-body">
        <p>New password doesn't set</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<?php endif;?>

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

<script type="text/javascript">
    $(document).ready(function(){
        $("#modalOldPassword").modal('show');
        $("#modalNewPassword").modal('show');
    });
</script>