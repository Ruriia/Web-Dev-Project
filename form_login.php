<?php
    session_start();
    $_SESSION['loginfail'];
?><!DOCTYPE html>
<html lang="en">
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
</style>

</head>
<body style="background-color:#3366ff;">
<div class="login-form">
    <form action="login_validation.php" method="post">
        <h3 class="text-center">KRS Helpdesk Login</h3>
        <br/>
        <div class="form-group">
            <?php if($_SESSION['loginfail'] == 3): ?>
              <input type="text" class="form-control" name="email" placeholder="E-mail Student" required="required" value="<?= $_SESSION['email']; ?>">
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
</div>

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
<?php if($_SESSION['loginas'] == "Mahasiswa"){
  header("refresh:2; user/index.php");
}else if($_SESSION['loginas'] == "Admin"){
  header("refresh:2; admin/index.php");
}
$_SESSION['loginfail'] = 0;
?>
<?php endif;?>

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