<?php
    session_start();
    $_SESSION['loginfail'] = (isset($_SESSION['loginfail'])) ? $_SESSION['loginfail'] : "";;
    $_SESSION['loginas'] = (isset($_SESSION['loginas'])) ? $_SESSION['loginas'] : "";
?>

<?php if ($_SESSION['loginfail'] == 2): ?>
<script>
  function sweetclick(){
    Swal.fire({
    title: 'Email yang kamu masukkan tidak terdaftar!',
    type: 'error',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Ok',
    animation: false,
    customClass: {
    popup: 'animated tada'
    }
  })
  }
  window.onload = sweetclick;
</script>
<?php endif;?>


<?php if($_SESSION['loginfail'] == 1): ?>
<script>
  function sweetclick(){
    Swal.fire({
    title: 'Password yang kamu masukkan salah!',
    type: 'error',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Ok',
    animation: false,
    customClass: {
    popup: 'animated tada'
    }
  })
  }
  window.onload = sweetclick;
</script>
<?php endif;?>

<?php if($_SESSION['loginfail'] == 3): ?>
<script>
  function sweetclick(){
    Swal.fire({
      type: 'success',
      title: 'Login Berhasil!',
      showConfirmButton: false,
      timer: 3000,
  })
  }
  window.onload = sweetclick;
</script>
<?php endif; ?>

<?php if($_SESSION['loginas'] == "Mahasiswa"){
  header("refresh:2; user/index.php");
}else if($_SESSION['loginas'] == "Admin"){
  header("refresh:2; admin/index.php");
}
$_SESSION['loginfail'] = 0;

?>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel ="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="user/dist/animate.css">
<style>
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }

    .login-block{
float:left;
width:100%;
padding : 50px 0;
}
.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 20px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#6A95CC;}
.login-sec .copy-text a{color:#6A95CC;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #6A95CC;}
.login-sec h2:after{content:" "; width:140px; height:5px; background:#6A95CC; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
</style>

</head>
<body style="background-color:#6A95CC;">
<!--<div class="login-form">
    <form action="login_validation.php" method="post">
        <h3 class="text-center">KRS Helpdesk Login</h3>
        <br/>
        <div class="form-group">
            <?php if($_SESSION['loginfail'] == 3): ?>
              <input type="text" class="form-control" name="email" placeholder="E-mail Student" required="required" value="< $_SESSION['email']; ?>">
            <?php else: ?>
              <input type="text" class="form-control" name="email" placeholder="E-mail Student" required="required">
            <?php endif;?>
        </div>
        <div class="form-group">
            <input type="password" id="pass" class="form-control" name="katasandi" placeholder="Password" required="required">
            <input type="checkbox" onclick="visiblePassword()" class="mt-3"> Show Password
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Login</button>
            <a href="index.php" id="home" name="home" class="btn btn-secondary btn-block">Cancel</a>
        </div>
        <div class="clear d-flex justify-content-between">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
</div>-->

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">KRS Helpdesk</h2>
		    <form class="login-form" action="login_validation.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="email" placeholder="E-mail Student" required="required">  
        </div>
        <div class="form-group">
            <input type="password" id="pass" class="form-control" name="katasandi" placeholder="Password" required="required">
            <input type="checkbox" onclick="visiblePassword()" class="mt-3"> Show Password
        </div>
  
  
    <div class="form-group">
    <button type="submit" class="btn btn-login btn-block btn-primary">Login</button>
    <a href="index.php" id="home" name="home" class="btn btn-outline-secondary btn-block">Cancel</a>
    </div>
  
</form>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Got Any Problems?</h2>
            <p>We can help you, just simply log in to proceed.</p>
        </div>	
  </div>
    </div>
            </div>	   
		    
		</div>
	</div>
</div>
</section>




<script>
function visiblePassword() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="user/dist/sweetalert2.all.min.js"></script>
</body>

</html>
<?php 
$_SESSION['loginfail'] = 0;
?>