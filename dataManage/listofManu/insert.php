<?php
session_start();
if ($_SESSION['role_id']<3){
 $connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $pasteNo = mysqli_real_escape_string($connect, $_POST["pasteNo"]);
      $powderLot = mysqli_real_escape_string($connect, $_POST["powderLot"]);
      $powderType = mysqli_real_escape_string($connect, $_POST["powderType"]);
      $dateMake= mysqli_real_escape_string($connect, $_POST["dateMake"]);
      $maker = mysqli_real_escape_string($connect, $_POST["maker"]);
      $object = mysqli_real_escape_string($connect, $_POST["object"]);
      $amount = mysqli_real_escape_string($connect, $_POST["amount"]);
      $recipe = mysqli_real_escape_string($connect, $_POST["recipe"]);
      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
      $username = $_POST["username"];

      if($_POST["id"] != '')
      {
           $query = "
           UPDATE makelistpastetbl
           SET pasteNo='$pasteNo',
           powderLot='$powderLot',
           powderType='$powderType',
           dateMake = '$dateMake',
           maker = '$maker',
           object = '$object',
           amount = '$amount',
           recipe = '$recipe',
           etc = '$etc',
           updateUser = '$username'
           WHERE id='".$_POST["id"]."'";
           $message = 'Data Updated';
      }
      else
      {
           $query = "INSERT INTO makelistpastetbl (pasteNo, powderLot, powderType,
             dateMake, maker, object, amount, recipe, etc, updateUser)
           VALUES('$pasteNo', '$powderLot', '$powderType', '$dateMake', '$maker',
             '$object', '$amount', '$recipe', '$etc', '$username');
           ";
           $message = 'Data Inserted';
      }
      if(mysqli_query($connect, $query))
      {
           $output .= $message;

      }
      echo $output;
 }
} else {
  echo '데이터 입력 권한이 없습니다.';
}
 ?>
