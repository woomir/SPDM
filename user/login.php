<?php session_start();?>
 <html>
 <head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>SPDM - Login failed</title>

   <!-- Custom fonts for this template-->
   <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

   <!-- Custom styles for this template-->
   <link href="../css/sb-admin.css" rel="stylesheet">

 </head>
 <body class="bg-dark">

   <?php
   $conn = mysqli_connect("localhost", "root", "52telecast", "woomir");
    $_SESSION['id']=$_POST['id'];
    $_SESSION['password']=$_POST['password'];

   if (mysqli_connect_errno($conn)) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

   if (isset($_POST['id']) && isset($_POST['password'])) {
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['password'] = $_POST['password'];
       $id = $_POST['id'];
       $password = $_POST['password'];

       $sql = "SELECT * from users where id='".$id."' AND password='".$password."'";
       $result = mysqli_query($conn,$sql);
       $role_id=mysqli_fetch_assoc($result);
       $row = mysqli_num_rows($result);

       if ($row==1){
     header('location:../database/listofManu.php');
   } else { ?>

     <div class="card card-login mt-5 mx-auto">
         <div class="card text-center">
           <div class="card-header">Silver Powder Databases Management</div>
           <div class="card-body">
             <h5 class="card-title">Login Failed</h5>
             <p class="card-text">Please verify your ID and password</p>
             <a href="../login.html" class="btn btn-primary">Go login</a>
           </div>
         </div>
     </div>
     <?php
   }} ?>
   <?php $_SESSION['role_id']=$role_id['role_id']; ?>
<form method ="post">
<input type="hidden" id="role_id" name="role_id" value=" <?php echo $role_id['role_id'] ?> ">
</form>
 </body>
 </html>
