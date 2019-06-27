<?php
session_start();
if ($_SESSION['role_id']<3){
  include '../db.php';

 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $lotNo = mysqli_real_escape_string($connect, $_POST["lotNo"]);

      $check = "SELECT lotNo from infoagno3 where lotNo = '$lotNo'";
      $check_result = mysqli_num_rows(mysqli_query($connect, $check));

      if ($_POST["agC"]!=""){
        $agC = mysqli_real_escape_string($connect, $_POST["agC"]);
      } else {$agC = 'NULL';}

      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
      $username = $_POST["username"];

      if($_POST["id"] === "edit")
      {
        if ($check_result == 1){
           $query = "
           UPDATE infoagno3
           SET 
           agC = $agC,
           etc = '$etc',
           updateUser = '$username'
           WHERE lotNo='$lotNo'";
           $message = 'Data Updated';

           if(mysqli_query($connect, $query))
          {
              $output .= $message;
          }
        } else {
          $output = 'Lot No는 변경할 수 없습니다.<br> 데이터 삭제 후 재입력 바랍니다.';
        }
      }
      else
      {
        if($check_result == 0) {
          $query = "INSERT INTO infoagno3 (lotNo, agC, etc, updateUser)
            VALUES('$lotNo', $agC, '$etc','$username');
            ";
          $message = 'Data Inserted';

          if(mysqli_query($connect, $query))
          {
              $output .= $message;
          }

        } else {
          echo "동일한 Lot No가 존재합니다.";
        }

      }
      
      echo $output;
 }
} else {
  echo '데이터 입력 권한이 없습니다.';
}
 ?>
