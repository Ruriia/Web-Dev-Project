    <section class="content-header">
      <h1>
        Create New Student
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    <div class="content container-fluid">
    <div class="bootstrap-iso">
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
            <input type="email" class="form-control" name="inputnim" placeholder="Enter NIM">    
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Birthday</label>
          <div class="col-sm-8">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
            </div>
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
              <option value="7">Menajemen</option>
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
    </div>
    </div>

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form');
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>