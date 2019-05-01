<?php
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "Admin"){
          header('location:../user/index.php');
      }
  }

  require 'action/databasekey.php';
  $key = connection();

  $sql = "SELECT * FROM msdata WHERE msdata.email = ?";

  $hasil = $key->prepare($sql);
  $hasil->execute([$_SESSION['email']]);

  $data = $hasil->fetch();
?>  


    <section class="content-header">
      <h1>
        Account Settings
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    
    <div class="content container-fluid">
        <div class="bootstrap-iso">
       
            <div>
                <form action="action/updatedata.php" method="post" enctype="multipart/form-data">
                    <div class="form-group-row" style="margin-bottom:20px; text-align:center; margin-auto;">
                        <img src="<?= $_SESSION['profile']?>" width="160" height="160" class="img-circle" alt="User Image">
                        <br /><br />
                        
                        <input type="file" name="foto" style="text-align:center; margin:auto;">                       
                    </div>

                    <div class="form-group row" id="formgroupnama">
                        <label class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-8">
                            <input type="text" id="inputnama" class="form-control" name="inputnama" value="<?= $data['nama']; ?>"> 
                        </div>          
                    </div>               

                    <div class="form-group row" id="formgroupemail">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" id="inputemail" class="form-control" name="inputemail" value="<?= $data['email']; ?>"> 
                        </div>          
                    </div>               
                    
                    <br />
                    <div class="row">
                        <div class="col-sm-2">
                            <strong>Password</strong>                 
                        </div>
                        <div class="col-sm-6">
                        <a href="#formChangePassword" data-toggle="collapse">Change Password</a>
                                <div id="formChangePassword" class="collapse" style="margin-top:15px;">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="currentPassword" placeholder="Current Password" name="oldpassword">
                                        <br/>
                                        <input type="password" class="form-control" id="newPassword" placeholder="New Password" name="newpassword">
                                        <br/>
                                        <input type="password" class="form-control" id="confirmNewPassword" placeholder="Confirm New Password" name="confirmpassword">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <button type="submit" id="btnupdate" class="btn btn-success" style="width:100px;" id="savebtn">Save</button>                    
                    </div>
                </form>
                
            </div>
        </div>
    </div>



<?php if($_GET['iderror'] == 1): ?>
<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
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

<?php if($_GET['iderror'] == 2): ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
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

<?php if($_GET['iderror'] == 3): ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change password failed</h4>
      </div>
      <div class="modal-body">
        <p>Your confirm password doesn't valid.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<?php endif;?>
