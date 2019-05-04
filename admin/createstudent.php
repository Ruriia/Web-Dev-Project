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
        Create New Student
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    <div class="content container-fluid">
    <div class="bootstrap-iso">
      <form action="action/insertStudentDB.php" method="post" autocomplete="off">
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

        <!--<div class="form-group row">
          <label class="col-sm-2 col-form-label">NIM</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="inputnim" placeholder="Enter NIM">    
          </div>
        </div>-->

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

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Faculty</label>
          <div class="col-sm-8">
            <select class="custom-select" id="fakultas" name="inputfaculty" onchange="myFunction()">
              <option selected disabled>Choose...</option>
              <option value="1">Teknik Informatika</option>
              <option value="2">Bisnis</option>
              <option value="3">Seni & Desain</option>
              <option value="4">Ilmu Komunikasi</option>
            </select>
          </div>          
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Major</label>
          <div class="col-sm-8">
            <select class="custom-select" name="inputmajor">
              <option selected disabled>Choose...</option>
              <option class="fti" style="display: none" value="1">Informatika</option>
              <option class="fti" style="display: none" value="2">Sistem Informasi</option>
              <option class="fti" style="display: none" value="3">Teknik Komputer</option>
              <option class="fti" style="display: none" value="4">Teknik Fisika</option>
              <option class="fti" style="display: none" value="5">Teknik Elektro</option>
              <option class="eko" style="display: none" value="6">Akuntansi</option>
              <option class="eko" style="display: none" value="7">Manajemen</option>
              <option class="fsd" style="display: none" value="8">Design Komunikasi Visual</option>
              <option class="fsd" style="display: none" value="9">Film</option>
              <option class="fsd" style="display: none" value="10">Arsitektur</option>
              <option class="ilkom" style="display: none" value="11">Komunikasi Strategis</option>
              <option class="ilkom" style="display: none" value="12">Jurnalistik</option>
              <option class="fti" style="display: none" value="13">Double Degree</option>
            </select>
          </div>          
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Academic Year</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="inputyear" placeholder="Enter academic year">
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
                <input type="password" class="form-control buttonInside" id="inputpassword" name="inputpassword" placeholder="Input password"/>
                <button type="button" id="showPassword">Show</button>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
              <small class="form-text text-muted"><em>Password is birthday by default ("ddmmyyyy").</em></small>
              </div>
            </div>
          </div>
        </div>

        <button class="btn btn-primary mt-5">Submit</button>
      </form>
    </div>
    </div>
    <script>
      function myFunction() {
        var x = document.getElementById("fakultas").value;
        var panjangfti = document.getElementsByClassName("fti").length;
        var panjangfsd = document.getElementsByClassName("fsd").length;
        var panjangilkom = document.getElementsByClassName("ilkom").length;
        var panjangeko = document.getElementsByClassName("eko").length;
        if(x == 1){
          for (let index = 0; index < panjangfti; index++) {
            document.getElementsByClassName("fti")[index].style.display = "block";
          }
          for (let index = 0; index < panjangfsd; index++) {
            document.getElementsByClassName("fsd")[index].style.display = "none";
          }
          for (let index = 0; index < panjangilkom; index++) {
            document.getElementsByClassName("ilkom")[index].style.display = "none";
          }
          for (let index = 0; index < panjangeko; index++) {
            document.getElementsByClassName("eko")[index].style.display = "none";
          }
        }else if(x == 2){
          for (let index = 0; index < panjangfti; index++) {
            document.getElementsByClassName("fti")[index].style.display = "none";
          }
          for (let index = 0; index < panjangfsd; index++) {
            document.getElementsByClassName("fsd")[index].style.display = "none";
          }
          for (let index = 0; index < panjangilkom; index++) {
            document.getElementsByClassName("ilkom")[index].style.display = "none";
          }
          for (let index = 0; index < panjangeko; index++) {
            document.getElementsByClassName("eko")[index].style.display = "block";
          }
        }else if(x == 3){
          for (let index = 0; index < panjangfti; index++) {
            document.getElementsByClassName("fti")[index].style.display = "none";
          }
          for (let index = 0; index < panjangfsd; index++) {
            document.getElementsByClassName("fsd")[index].style.display = "block";
          }
          for (let index = 0; index < panjangilkom; index++) {
            document.getElementsByClassName("ilkom")[index].style.display = "none";
          }
          for (let index = 0; index < panjangeko; index++) {
            document.getElementsByClassName("eko")[index].style.display = "none";
          }
        }else if(x == 4){
          for (let index = 0; index < panjangfti; index++) {
            document.getElementsByClassName("fti")[index].style.display = "none";
          }
          for (let index = 0; index < panjangfsd; index++) {
            document.getElementsByClassName("fsd")[index].style.display = "none";
          }
          for (let index = 0; index < panjangilkom; index++) {
            document.getElementsByClassName("ilkom")[index].style.display = "block";
          }
          for (let index = 0; index < panjangeko; index++) {
            document.getElementsByClassName("eko")[index].style.display = "none";
          }
        }
         
        
      }
      
    </script>