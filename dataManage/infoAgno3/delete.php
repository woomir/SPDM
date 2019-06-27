<?php
session_start();
include '../db.php';

if ($_SESSION['role_id']<2){
    
          $sql = "DELETE FROM infoagno3 WHERE lotNo = '".$_POST["id"]."'";

          if(mysqli_query($connect, $sql))
          {
               echo 'Data Deleted';
          }

} else {
  echo '데이터 삭제 권한이 없습니다.';
}
 ?>
