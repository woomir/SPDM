<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Forgot Password</title>

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
if(isset($_POST)){
	$inputEmail = mysqli_real_escape_string($connect, $_POST['inputEmail']);
	$sql = "SELECT * FROM users WHERE email ='".$inputEmail."'";
	$res = mysqli_query($connect, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){ ?>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h5>Send email to you with password</h5>
          </div>
          <form action="../login.html">
            <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Go login">
          </form>
        </div>
      </div>
    </div>
	<?php }else{ ?>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h5>Email does not exist in database</h5>
          </div>
          <form action="../forgot-password.html">
            <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="Again">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="../register.html">Register an Account</a>
            <a class="d-block small" href="../login.html">Login Page</a>
          </div>
        </div>
      </div>
    </div>
<?php	}
}

$r = mysqli_fetch_assoc($res);

function sanitize_my_email($field) {
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }}

$password = $r['password'];
$to = $r['email'];
$subject = "Your Recovered Password";
$body = "Please use this password to login : " . $password;

$secure_check = sanitize_my_email($to);
if ($secure_check == false) {

} else { //send email
    mail($to, $subject, $body);
    } ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>
