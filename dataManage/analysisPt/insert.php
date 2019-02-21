pasteNo<?php
session_start();
if ($_SESSION['role_id']<3){

 $connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $pasteNo = mysqli_real_escape_string($connect, $_POST["pasteNo"]);
      $timeAging = mysqli_real_escape_string($connect, $_POST["timeAging"]);
      $tempAging = mysqli_real_escape_string($connect, $_POST["tempAging"]);
      $preCon= mysqli_real_escape_string($connect, $_POST["preCon"]);
      $dateAnalysis = mysqli_real_escape_string($connect, $_POST["dateAnalysis"]);
      $analyzer = mysqli_real_escape_string($connect, $_POST["analyzer"]);
      $rpm1 = mysqli_real_escape_string($connect, $_POST["rpm1"]);
      $rpm10 = mysqli_real_escape_string($connect, $_POST["rpm10"]);
      $rpm30 = mysqli_real_escape_string($connect, $_POST["rpm30"]);
      $rpm100 = mysqli_real_escape_string($connect, $_POST["rpm100"]);
      $rpm1_2 = mysqli_real_escape_string($connect, $_POST["rpm1_2"]);
      $rpm10_2 = mysqli_real_escape_string($connect, $_POST["rpm10_2"]);
      $rpm30_2 = mysqli_real_escape_string($connect, $_POST["rpm30_2"]);
      $rpm100_2 = mysqli_real_escape_string($connect, $_POST["rpm100_2"]);
      $lowG = mysqli_real_escape_string($connect, $_POST["lowG"]);
      $highG = mysqli_real_escape_string($connect, $_POST["highG"]);
      $ysp = mysqli_real_escape_string($connect, $_POST["ysp"]);
      $lowG2 = mysqli_real_escape_string($connect, $_POST["lowG2"]);
      $highG2 = mysqli_real_escape_string($connect, $_POST["highG2"]);
      $ysp2 = mysqli_real_escape_string($connect, $_POST["ysp2"]);
      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
      if($_POST["id"] != '')
      {
           $query = "
           UPDATE analysispttbl
           SET pasteNo='$pasteNo',
           timeAging='$timeAging',
           tempAging='$tempAging',
           preCon = '$preCon',
           dateAnalysis = '$dateAnalysis',
           analyzer = '$analyzer',
           rpm1 = '$rpm1',
           rpm10 = '$rpm10',
           rpm30 = '$rpm30',
           rpm100 = '$rpm100',
           rpm1_2 = '$rpm1_2',
           rpm10_2 = '$rpm10_2',
           rpm30_2 = '$rpm30_2',
           rpm100_2 = '$rpm100_2',
           lowG = '$lowG',
           highG = '$highG',
           ysp = '$ysp',
           lowG2 = '$lowG2',
           highG2 = '$highG2',
           ysp2 = '$ysp2',
           etc = '$etc'
           WHERE id='".$_POST["id"]."'";
           $message = 'Data Updated';
      }
      else
      {
           $query = "INSERT INTO analysispttbl (pasteNo, timeAging, tempAging, preCon,
             dateAnalysis, analyzer,rpm1, rpm10 , rpm30, rpm100, rpm1_2, rpm10_2, rpm30_2,
             rpm100_2, lowG, highG, ysp, lowG2, highG2, ysp2, etc)
           VALUES('$pasteNo', '$timeAging', '$tempAging', '$preCon', '$dateAnalysis',
             '$analyzer', '$rpm1', '$rpm10', '$rpm30', '$rpm100', '$rpm1_2', '$rpm10_2',
             '$rpm30_2', '$rpm100_2', '$lowG', '$highG', '$ysp', '$lowG2', '$highG2', '$ysp2',
             '$etc'
            );
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
  echo '데이터 추가 권한이 없습니다.';
}
 ?>
