<?php
session_start();
include '../db.php';

 if(!empty($_FILES))
 {
      $output = '';
      $message = array();
      $username = $_POST["username"];
      $sampleNo = $_POST["file-sampleNo"];
      $powderType = $_POST["file-powderType"];

//file upload 설정
$target_dir = "./uploads/";
$uploadOk = 1;
$total = count($_FILES['files']['name']);

for ($i=0; $i < $total; $i++){
  $file_name - iconv('UTF-8', 'cp949', $_FILES["files"]["name"][$i]);
  $file_name = str_replace(array("#","%"),"", $file_name);
  $file_raw_name = $_FILES["files"]["name"][$i];
  $file_raw_name = str_replace(array("#","%"), "", $file_raw_name);
  $file_type = $_FILES["files"]["type"][$i];
  $file_size = $_FILES["files"]["size"][$i];
  $target_file = $target_dir . $file_name;
  $file_order = $i + 1;
  // $message[$i] = $file_name."<br>";

    // Check if file already exists
  if (file_exists($target_file) && ($target_file != $target_dir)) {
    echo "Sorry, ".$file_raw_name." already exists.<br>";
    $uploadOk = 0;
  } else{
    // Check file size (30MB이상)
    if ($_FILES["files"]["size"][$i] > 30000000) {
      echo "Sorry, ".$file_raw_name." is too large.<br>";
      $uploadOk = 0;
    } else {
      //샘플명과 타입, 파일이름과 동일한 데이터가 있는지 확인
      $check_query = "SELECT * FROM filepwlabtbl WHERE sampleNo = '".$sampleNo."' 
      AND powderType = '".$powderType."' AND fileName = '".$file_raw_name."'";
      $result = mysqli_query($connect, $check_query);
      $check_query_row_number = mysqli_num_rows($result);
      //파일 정보를 데이터베이스에 저장
      if($check_query_row_number == 0){
          $query = "INSERT INTO filepwlabtbl (
            sampleNo, powderType, fileName, fileType, fileSize) VALUES (
              '".$sampleNo."', '".$powderType."', '".$file_raw_name."', '".$file_type."', ".$file_size.")";

          echo 'File Uploaded ('.$file_raw_name.')<br>';

          mysqli_query($connect, $query);
        }
      } 
    }

  if ($uploadOk == 0) {
    // $message[$i] .= "Sorry, ".$file_name." was not uploaded.<br>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file)) {
    } else {
      // $message[$i] .= "Error uploading ".$file_name."<br>";
    }
  }
}
 } else{
  $fileName = iconv('UTF-8', 'cp949', $_POST["filename"]);
  $fileName = str_replace(array("#","%"), "", $fileName);
  $sqlFileName = $_POST["filename"];
  $sqlFileName = str_replace(array("#","%"),"",$sqlFileName);
  $filePath = "./uploads/".$fileName;
  $sql = "DELETE FROM filepwlabtbl WHERE fileName = '".$sqlFileName."'";
    if(mysqli_query($connect, $sql))
    {
      unlink($filePath);
      echo 'File Deleted ('.$sqlFileName.')<br>';
    } else {
      echo 'error';
    }

 }
 ?>