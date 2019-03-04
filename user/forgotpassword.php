<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<?php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
if (!$connect){
    die("Database Connection Failed" . mysqli_error($connect));
}

if(isset($_POST['id']) && isset($_POST['inputEmail'])){
  $id = mysqli_real_escape_string($connect, $_POST['id']);
  $inputEmail = mysqli_real_escape_string($connect, $_POST['inputEmail']);
  $_SESSION['id']=$_POST['id'];
  $_SESSION['inputEmail']=$_POST['inputEmail'];


	$sql = "SELECT * FROM users WHERE email ='".$inputEmail."' AND id ='".$id."'";
	$res = mysqli_query($connect, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){ ?>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Change Password</div>
          <div class="card-body">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-group">
                        <div class="form-label-group">
                          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                          <label for="password">Password</label>
                        </div>
                  </div>
                  <div class="form-group">
                      <div class="form-label-group">
                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm password" required="required">
                        <label for="confirmpassword">Confirm password</label>
                      </div>
                  </div>
                  <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Chanege Password">
              </form>
                  <div class="text-center">
                    <a class="d-block small mt-3" href="../index.html">Login Page</a>
                    <a class="d-block small" href="../forgot-password.html">Forgot Password?</a>
                  </div>
         </div>
        </div>
      </div>

	<?php }else{ ?>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Change Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h5>ID or Email does not exist in database</h5>
          </div>
          <form action="../forgot-password.html">
            <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Again">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="../register.html">Register an Account</a>
            <a class="d-block small" href="../index.html">Login Page</a>
          </div>
        </div>
      </div>
    </div>
<?php	}
}

if(isset($_POST['password'])){

  $pass = mysqli_real_escape_string($connect, $_POST['password']);
  $password = password_hash($pass, PASSWORD_DEFAULT);
  $inputEmail2=$_SESSION['inputEmail'];
  $id2=$_SESSION['id'];

  $sql = "UPDATE users SET password ='".$password."' WHERE email ='".$inputEmail2."' AND id ='".$id2."'";
  $resu = mysqli_query($connect, $sql);
  if($resu === false){
      echo mysqli_error($connect);
  }else{ ?>

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Change Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h5>Success</h5>
          </div>
          <form action="../index.html">
            <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Go login">
          </form>
        </div>
      </div>
    </div>

<?php  }} ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

<script>
var password = document.getElementById("password")
, confirm_password = document.getElementById("confirmpassword");

function validatePassword(){
if(password.value != confirm_password.value) {
  confirm_password.setCustomValidity("Passwords Don't Match");
} else {
  confirm_password.setCustomValidity('');
}
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

</html>
