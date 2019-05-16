<?php
//fetch.php
session_start();
include '../db.php';
if ($_SESSION['role_id']<3){
  if(isset($_POST["id"]))
  {
       $query = "SELECT * FROM analysispwtbl WHERE id = '".$_POST["id"]."'";
       $result = mysqli_query($connect, $query);
       $row = mysqli_fetch_array($result);
       echo json_encode($row);
  }
} else {
  echo '데이터 수정 권한이 없습니다.';
}
?>
