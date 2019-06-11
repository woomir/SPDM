<?php
session_start();
include '../db.php';

if ($_SESSION['role_id']<2){

     $select = "SELECT * FROM analysispttbl WHERE id = '".$_POST["id"]."'";
     $select_result = mysqli_query($connect, $select);
     $select_row = mysqli_fetch_array($select_result);
     $pasteNo = $select_row["pasteNo"];
     $timeAging = $select_row["timeAging"];
     $file_sql = "SELECT * FROM filepttbl WHERE pasteNo = '".$pasteNo."' and timeAging = '".$timeAging."'";
     $file_result = mysqli_query($connect, $file_sql);
     $num = mysqli_num_rows($file_result);

     if($num == 0) {

          $sql = "DELETE FROM analysispttbl WHERE id = '".$_POST["id"]."'";

          if(mysqli_query($connect, $sql))
          {
               echo 'Data Deleted';
          }
     } else {
          echo '데이터 삭제 불가 <br>데이터에 첨부 파일이 존재합니다.';
     }

} else {
  echo '데이터 삭제 권한이 없습니다.';
}
 ?>
