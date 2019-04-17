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

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Faculty</label>
          <div class="col-sm-8">
            <select class="custom-select" name="inputfaculty">
              <option selected>Choose...</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Bisnis">Bisnis</option>
              <option value="Seni & Desain">Seni & Desain</option>
              <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
            </select>
          </div>          
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Major</label>
          <div class="col-sm-8">
            <select class="custom-select" name="inputmajor">
              <option selected>Choose...</option>
              <option value="Informatika">Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Komputer">Teknik Komputer</option>
              <option value="Teknik Fisika">Teknik Fisika</option>
              <option value="Teknik Elektro">Teknik Elektro</option>
              <option value="Akuntansi">Akuntansi</option>
              <option value="Manajemen">Manajemen</option>
              <option value="DKV">Design Komunikasi Visual</option>
              <option value="Film">Film</option>
              <option value="Arsitektur">Arsitektur</option>
              <option value="SC">Komunikasi Strategis</option>
              <option value="Jurnalistik">Jurnalistik</option>
              <option value="Double">Double Degree</option>
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
              <input name="radio" type="radio" value="First Choice"/>
              Male
            </label>
       
            <label class="radio-inline">
              <input name="radio" type="radio" value="Second Choice"/>
              Female
            </label>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-12">
                <input type="password" class="form-control" id="inputpassword" name="inputpassword" placeholder="Input password">
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
    
