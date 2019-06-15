<?php
session_start();
if ($_SESSION['role_id']<3){
  include '../db.php';

 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $sampleNo = mysqli_real_escape_string($connect, $_POST["sampleNo"]);

      $check = "SELECT sampleNo from washtbl where sampleNo = '$sampleNo'";
      $check_result = mysqli_num_rows(mysqli_query($connect, $check));

      $concept = mysqli_real_escape_string($connect, $_POST["concept"]);
      $dateWashing = mysqli_real_escape_string($connect, $_POST["dateWashing"]);
      $pwLot= mysqli_real_escape_string($connect, $_POST["pwLot"]);

      if ($_POST["amountDMW"]!=""){
        $amountDMW = mysqli_real_escape_string($connect, $_POST["amountDMW"]);
      } else {$amountDMW = 'NULL';}

      if ($_POST["amountPw"]!=""){
      $amountPw = mysqli_real_escape_string($connect, $_POST["amountPw"]);
    } else {$amountPw = 'NULL';}

      $kindsWash = mysqli_real_escape_string($connect, $_POST["kindsWash"]);

      if ($_POST["ratioWash"]!=""){
      $ratioWash = mysqli_real_escape_string($connect, $_POST["ratioWash"]);
    } else {$ratioWash = 'NULL';}

      if ($_POST["temp"]!=""){
      $temp = mysqli_real_escape_string($connect, $_POST["temp"]);
    } else {$temp = 'NULL';}

      $orderAdd = mysqli_real_escape_string($connect, $_POST["orderAdd"]);

      if ($_POST["rpm"]!=""){
        $rpm = mysqli_real_escape_string($connect, $_POST["rpm"]);
      } else {$rpm = 'NULL';}

      if ($_POST["timeDissol"]!=""){
        $timeDissol = mysqli_real_escape_string($connect, $_POST["timeDissol"]);
      } else {$timeDissol = 'NULL';}

      if ($_POST["timePw"]!=""){
        $timePw = mysqli_real_escape_string($connect, $_POST["timePw"]);
      } else {$timePw = 'NULL';}

      $maker = mysqli_real_escape_string($connect, $_POST["maker"]);
      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
      $username = $_POST["username"];

      if($_POST["id"] === "edit")
      {
        if ($check_result == 1){
           $query = "
           UPDATE washtbl
           SET 
           concept='$concept',
           dateWashing='$dateWashing',
           pwLot = '$pwLot',
           amountDMW = $amountDMW,
           amountPw = $amountPw,
           kindsWash = '$kindsWash',
           ratioWash = $ratioWash,
           temp = $temp,
           orderAdd = '$orderAdd',
           rpm = $rpm,
           timeDissol = $timeDissol,
           timePw = $timePw,
           maker = '$maker',
           etc = '$etc',
           updateUser = '$username'
           WHERE sampleNo='$sampleNo'";
           $message = 'Data Updated';

           if(mysqli_query($connect, $query))
          {
              $output .= $message;
          }
        } else {
          $output = 'Sample No는 변경할 수 없습니다.<br> 데이터 삭제 후 재입력 바랍니다.';
        }
      }
      else
      {
        if($check_result == 0) {
          $query = "INSERT INTO washtbl (sampleNo, concept, dateWashing,
            pwLot, amountDMW, amountPw, kindsWash, ratioWash, temp, orderAdd, rpm, timeDissol, 
            timePw, maker, etc, updateUser)
            VALUES('$sampleNo', '$concept', '$dateWashing', '$pwLot', $amountDMW, $amountPw,
            '$kindsWash', $ratioWash, $temp, '$orderAdd', $rpm, $timeDissol, $timePw, 
            '$maker', '$etc','$username');
            ";
          $message = 'Data Inserted';

          if(mysqli_query($connect, $query))
          {
              $output .= $message;
          }

        } else {
          echo "동일한 Sample No가 존재합니다.";
        }

      }
      
      echo $output;
 }
} else {
  echo '데이터 입력 권한이 없습니다.';
}
 ?>
