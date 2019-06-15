<?php
//fetch.php
session_start();
include '../db.php';
if(isset($_POST["id"]))
{
  $query = "SELECT * FROM washtbl WHERE sampleNo = '".$_POST["id"]."'";
  $result = mysqli_query($connect, $query);
  $file_info = array();
  $row = mysqli_fetch_array($result);
  $sub_array = array();
  
  $sampleNo = $row["sampleNo"];
  $query1 = "SELECT * FROM filewashtbl WHERE sampleNo = '".$sampleNo."'";
  
  $result1 = mysqli_query($connect, $query1);
  $num = mysqli_num_rows($result1);
  
  if($num > 0){
    $sub_array["check"] = 0;
    while($row1 = mysqli_fetch_array($result1)){
      $subject = $row1["fileType"];
      $pattern = '/^image/';
      $sub_array["fileName"] = $row1["fileName"];
      $sub_array["fileSize"] = $row1["fileSize"];
      $sub_array["sampleNo"] = $row["sampleNo"];
      if(preg_match($pattern, $subject)>0){
        $sub_array["fileType"] = 'image';
        // $sub_array["fileTypeOther"] = '';
      } else {
        $sub_array["fileType"] = 'other';
        // $sub_array["fileTypeOther"] = $row1["fileType"];
      }
      
      $file_info[] = $sub_array;
    }
    echo json_encode($file_info);
  } else {
    $sub_array["check"] = 1;
    $sub_array["fileName"] = '첨부파일 없음';
    $sub_array["fileSize"] = '';
    $sub_array["sampleNo"] = $row["sampleNo"];
    $file_info[] = $sub_array;
    echo json_encode($file_info);
  }
}
?>
