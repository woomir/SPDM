<?php
session_start();
if ($_SESSION['role_id']<2){
 $connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
 $sql = "DELETE FROM analysispttbl WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $sql))
 {
      echo 'Data Deleted';
 }
} else {
  echo '데이터 삭제 권한이 없습니다.';
}
 ?>
