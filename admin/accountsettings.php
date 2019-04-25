<?php
//session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "admin"){
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
        <div class="bootstrap-iso" id="disini">
            <div class="ml-3">
                <form action="action/updatedata.php" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputnama" placeholder="<?= $data['nama']; ?>"> 
                        </div>          
                    </div>               

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="inputemail" placeholder="<?= $data['email']; ?>"> 
                        </div>          
                    </div>               
                    
                    <br />
                    <div class="row">
                        <div class="col-sm-2">
                            <strong>Password</strong>                 
                        </div>
                        <div class="col-sm-6">
                        <a href="#formChangePassword" data-toggle="collapse">Change Password</a>
                                <div id="formChangePassword" class="collapse">
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
                    <button type="submit" class="btn btn-success" id="insertBeforePlace">Save</button>
                </form>
                
            </div>
        </div>
    </div>
    
