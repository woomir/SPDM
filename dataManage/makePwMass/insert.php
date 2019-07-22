<?php
session_start();
if ($_SESSION['role_id']<3){
 $connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $lotNo = mysqli_real_escape_string($connect, $_POST["lotNo"]);

      $check = "SELECT lotNo from makepwmasstbl where lotNo = '$lotNo'";
      $check_result = mysqli_num_rows(mysqli_query($connect, $check));

      $nameProduct = mysqli_real_escape_string($connect, $_POST["nameProduct"]);
      $characteristic = mysqli_real_escape_string($connect, $_POST["characteristic"]);
      $makeDate = mysqli_real_escape_string($connect, $_POST["makeDate"]);
      $nameLubricant1 = mysqli_real_escape_string($connect, $_POST["nameLubricant1"]);
      if ($_POST["ratioLubricant1"]!=""){
      $ratioLubricant1 = mysqli_real_escape_string($connect, $_POST["ratioLubricant1"]);
    } else {$ratioLubricant1 = 'NULL';}
      $nameLubricant2 = mysqli_real_escape_string($connect, $_POST["nameLubricant2"]);
      if ($_POST["ratioLubricant2"]!=""){
      $ratioLubricant2 = mysqli_real_escape_string($connect, $_POST["ratioLubricant2"]);
    } else {$ratioLubricant2 = 'NULL';}

      $ratioSAPA = mysqli_real_escape_string($connect, $_POST["ratioSAPA"]);

      if ($_POST["tempCoating"]!=""){
      $tempCoating = mysqli_real_escape_string($connect, $_POST["tempCoating"]);
    } else {$tempCoating = 'NULL';}
      if ($_POST["rateAddJet"]!=""){
      $rateAddJet = mysqli_real_escape_string($connect, $_POST["rateAddJet"]);
    } else {$rateAddJet = 'NULL';}
      if ($_POST["pressureJet"]!=""){
      $pressureJet = mysqli_real_escape_string($connect, $_POST["pressureJet"]);
    } else {$pressureJet = 'NULL';}
      if ($_POST["yieldJet"]!=""){
      $yieldJet = mysqli_real_escape_string($connect, $_POST["yieldJet"]);
    } else {$yieldJet = 'NULL';}
      if ($_POST["yieldSmall"]!=""){
      $yieldSmall = mysqli_real_escape_string($connect, $_POST["yieldSmall"]);
    } else {$yieldSmall = 'NULL';}
      if ($_POST["yieldBig"]!=""){
      $yieldBig = mysqli_real_escape_string($connect, $_POST["yieldBig"]);
    } else {$yieldBig = 'NULL';}
        $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
        $username = $_POST["username"];

      if($_POST["id"] === 'edit')
      {
        if ($check_result > 0){
           $query = "
           UPDATE makepwmasstbl
           SET 
           nameProduct='$nameProduct',
           characteristic='$characteristic',
           makeDate='$makeDate',
           nameLubricant1 = '$nameLubricant1',
           ratioLubricant1 = $ratioLubricant1,
           nameLubricant2 = '$nameLubricant2',
           ratioLubricant2 = $ratioLubricant2,
           ratioSAPA = '$ratioSAPA',
           tempCoating = $tempCoating,
           rateAddJet = $rateAddJet,
           pressureJet = $pressureJet,
           yieldJet = $yieldJet,
           yieldSmall = $yieldSmall,
           yieldBig = $yieldBig,
           etc = '$etc',
           updateUser = '$username'
           WHERE lotNo='$lotNo'";
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
           $query = "INSERT INTO makepwmasstbl (lotNo, nameProduct, characteristic,makeDate,
             nameLubricant1, ratioLubricant1, nameLubricant2, ratioLubricant2,
             ratioSAPA, tempCoating, rateAddJet, pressureJet, yieldJet, yieldSmall,
             yieldBig, etc, updateUser)
           VALUES('$lotNo', '$nameProduct', '$characteristic', '$makeDate', '$nameLubricant1', $ratioLubricant1,
            '$nameLubricant2', $ratioLubricant2, '$ratioSAPA', $tempCoating, $rateAddJet, $pressureJet,
            $yieldJet, $yieldSmall, $yieldBig, '$etc','$username');
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
