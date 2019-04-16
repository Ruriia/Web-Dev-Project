<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create New Student
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="content container-fluid">
      <form action="action/insertStudentDB.php" method="post">
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
            Nanti yaa dicari dlu date-pickernya...
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Faculty</label>
          <div class="col-sm-8">
            <select class="custom-select" name="inputfaculty">
              <option selected>Choose...</option>
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
              <option selected>Choose...</option>
              <option value="1">Informatika</option>
              <option value="2">Sistem Informasi</option>
              <option value="3">Teknik Komputer</option>
              <option value="4">Teknik Fisika</option>
              <option value="5">Teknik Elektro</option>
              <option value="6">Akuntansi</option>
              <option value="7">Menejemen</option>
              <option value="8">Design Komunikasi Visual</option>
              <option value="9">Film</option>
              <option value="10">Arsitektur</option>
              <option value="11">Komunikasi Strategis</option>
              <option value="12">Jurnalistik</option>
              <option value="13">Double Degree</option>
            </select>
          </div>          
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Academic Year</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="inputyear" placeholder="Enter academic year">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Gender</label>
          <div class="col-sm-8">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="inputgender" value="M">
              <label class="form-check-label">Male</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="inputgender" value="F">
              <label class="form-check-label">Female</label>
            </div>
          </div>          
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="inputpassword" placeholder="Valuenya nanti diambil dari form birthday" value="">
          </div>
        </div>

        <div class="row mt-0">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <small id="emailHelp" class="form-text text-muted"><em>Password is birthday by default.</em></small>
            </div>
        </div>

        <button class="btn btn-primary mt-5">Submit</button>
      </form>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>