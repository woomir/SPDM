<?php
session_start();
if ($_SESSION['role_id']<3){
 $connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $pasteNo = mysqli_real_escape_string($connect, $_POST["pasteNo"]);

      $check = "SELECT pasteNo from makelistpastetbl where pasteNo = '$pasteNo'";
      $check_result = mysqli_num_rows(mysqli_query($connect, $check));

      $powderLot = mysqli_real_escape_string($connect, $_POST["powderLot"]);
      $powderType = mysqli_real_escape_string($connect, $_POST["powderType"]);
      $dateMake= mysqli_real_escape_string($connect, $_POST["dateMake"]);
      $maker = mysqli_real_escape_string($connect, $_POST["maker"]);
      $object = mysqli_real_escape_string($connect, $_POST["object"]);
      $amount = mysqli_real_escape_string($connect, $_POST["amount"]);
      $recipe = mysqli_real_escape_string($connect, $_POST["recipe"]);
      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
      $username = $_POST["username"];

      if($_POST["id"] === "edit")
      {
          if ($check_result > 0){
           $query = "
           UPDATE makelistpastetbl
           SET 
           powderLot='$powderLot',
           powderType='$powderType',
           dateMake = '$dateMake',
           maker = '$maker',
           object = '$object',
           amount = '$amount',
           recipe = '$recipe',
           etc = '$etc',
           updateUser = '$username'
           WHERE pasteNo='$pasteNo'";
           $message = 'Data Updated';

           if(mysqli_query($connect, $query))
           {
               $output .= $message;
           }
      }else {
          $output = 'Paste No는 변경할 수 없습니다.<br> 데이터 삭제 후 재입력 바랍니다.';
        }
      }else
      {
          if($check_result == 0) {
           $query = "INSERT INTO makelistpastetbl (pasteNo, powderLot, powderType,
             dateMake, maker, object, amount, recipe, etc, updateUser)
           VALUES('$pasteNo', '$powderLot', '$powderType', '$dateMake', '$maker',
             '$object', '$amount', '$recipe', '$etc', '$username');
           ";
           $message = 'Data Inserted';
      
      if(mysqli_query($connect, $query))
      {
           $output .= $message;
      }
     }else {
          echo "동일한 Paste No가 존재합니다.";
        }
      }
      echo $output;
 }
} else {
  echo '데이터 입력 권한이 없습니다.';
}
 ?>
