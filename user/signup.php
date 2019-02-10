<?php

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "52telecast", "woomir");
if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "insert into users (id,username,email,password) VALUES ('".$id."','".$username."','".$email."','".$password."')";

$result = mysqli_query($conn,$sql);
if($result === false){
    echo mysqli_error($conn);
}

?>

<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPDM - Welcome</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>
<body class="bg-dark">

    <div class="card w-50 mt-5 mx-auto">

        <div class="card text-center">
          <div class="card-header">
            Silver Powder Databases Management
          </div>
          <div class="card-body">
            <h5 class="card-title">Welcome</h5>
            <p class="card-text"></p>
            <a href="../login.html" class="btn btn-primary">Go login</a>
          </div>
        </div>

    </div>

</body>
</html>
