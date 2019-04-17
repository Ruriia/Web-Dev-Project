<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel ="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">KRS Guides</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alamat.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

<!-- First Container -->
<div class="container-fluid bg-1">

  <div class="container">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/programming.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/programming.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/programming.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <hr/>
    <div class="container bg-2">
      <div class="d-flex">
        <div class="mr-auto p-2"><h3>Make Your<br/>TICKETS!</h3>
          <p>There are 3 categories :</p>
            <p>- Problem Finding Class<br/>
            - About the Professor<br/>
            - About the Subject<br/>
            - About the Schedule
        </div>
        <div class="p-2"><img src="images/ticket.jpg" alt="code" style="width:250px;height:130px">
        <br/>
        <a href="form_ticket.php" id="formticket" name="formticket" class="btn btn-primary btn-block">Create New Ticket</a>
        <a href="#" id="recentticket" name="recentticket" class="btn btn-secondary btn-block">Show Recent Ticket</a>
        </div>
      </div>
      <div class="col col-md bg-2 text-center">
        <button class="btn btn-default buttondown" data-toggle="collapse" data-target="#demo"><i class="fa fa-chevron-down"></i>
      </div>
    </div>
  </div>

  <div id="demo" class="collapse">
  <!-- Second Container -->
  <div class="container">

    <div class="d-flex justify-content-around bg-2" style="padding-top:40px;padding-bottom:40px;">
      <div class="category text-center">
        <img src="images/code.jpg" alt="code" style="width:220px;height:130px">
        <p>Problem Finding Class</p>
      </div>
      <div class="category text-center">
        <img src="images/code.jpg" alt="code" style="width:220px;height:130px">
        <p>About the Professor</p>
      </div>
      <div class="category text-center">
        <img src="images/code.jpg" alt="code" style="width:220px;height:130px">
        <p>About the Subject</p>
      </div>
      <div class="category text-center">
        <img src="images/code.jpg" alt="code" style="width:220px;height:130px">
        <p>About the Schedule</p>
      </div>
    </div>

  </div>
  </div>

</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>&copy; Flexbox Gang.</p>
</footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
