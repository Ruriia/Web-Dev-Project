<?php


//session_start();
  if(!isset($_SESSION['loginas'])){
      header('location:../form_login.php');
  }else{
      if($_SESSION['loginas'] != "Admin"){
          header('location:../user/index.php');
      }
  }
?>


    <section class="content-header">
      <h1>
        Create New Admin
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    <div class="content container-fluid">
    <div class="bootstrap-iso">
      <form action="action/insertAdminDB.php" method="post" autocomplete="off">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Full Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="inputname" placeholder="Enter full name">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Email Address</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" name="inputemail" placeholder="Enter email address">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">NIM</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="inputnim" placeholder="Enter NIM">    
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Birthday</label>
          <div class="col-sm-8">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
                <input class="form-control" id="inputbirthday" name="inputbirthday" placeholder="DD/MM/YYYY" type="text"/>
            </div>
          </div>
        </div>

        <div class="form-group row" id="div_radio">
          <label class="col-sm-2 col-form-label" for="radio">Gender</label>
          
          <div class="col-sm-8">
            <label class="radio-inline">
              <input name="radio" type="radio" value="M"/>
              Male
            </label>
       
            <label class="radio-inline">
              <input name="radio" type="radio" value="F"/>
              Female
            </label>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-12">
                <input type="password" class="form-control buttonInside" id="inputpassword" name="inputpassword" placeholder="Input password">
                <button type="button" id="showPassword">Show</button>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
              <small class="form-text text-muted"><em>Password is birthday by default ("dd/mm/yyyy").</em></small>
              </div>
            </div>
          </div>
        </div>

        <button class="btn btn-primary mt-5">Submit</button>
      </form>
    </div>
    </div>
    
