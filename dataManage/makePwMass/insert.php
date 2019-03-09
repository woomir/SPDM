<?php
session_start();
if ($_SESSION['role_id']<3){
 $connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $lotNo = mysqli_real_escape_string($connect, $_POST["lotNo"]);
      $nameProduct = mysqli_real_escape_string($connect, $_POST["nameProduct"]);
      $characteristic = mysqli_real_escape_string($connect, $_POST["characteristic"]);
      $nameLubricant1 = mysqli_real_escape_string($connect, $_POST["nameLubricant1"]);
      if ($_POST["ratioLubricant1"]!=""){
      $ratioLubricant1 = mysqli_real_escape_string($connect, $_POST["ratioLubricant1"]);
    } else {$ratioLubricant1 = 'NULL';}
      $nameLubricant2 = mysqli_real_escape_string($connect, $_POST["nameLubricant2"]);
      if ($_POST["ratioLubricant2"]!=""){
      $ratioLubricant2 = mysqli_real_escape_string($connect, $_POST["ratioLubricant2"]);
    } else {$ratioLubricant2 = 'NULL';}
      if ($_POST["ratioSAPA"]!=""){
      $ratioSAPA = mysqli_real_escape_string($connect, $_POST["ratioSAPA"]);
    } else {$ratioSAPA = 'NULL';}
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

      if($_POST["id"] != '')
      {
           $query = "
           UPDATE makepwmasstbl
           SET lotNo='$lotNo',
           nameProduct='$nameProduct',
           characteristic='$characteristic',
           nameLubricant1 = '$nameLubricant1',
           ratioLubricant1 = $ratioLubricant1,
           nameLubricant2 = '$nameLubricant2',
           ratioLubricant2 = $ratioLubricant2,
           ratioSAPA = $ratioSAPA,
           tempCoating = $tempCoating,
           rateAddJet = $rateAddJet,
           pressureJet = $pressureJet,
           yieldJet = $yieldJet,
           yieldSmall = $yieldSmall,
           yieldBig = $yieldBig,
           etc = '$etc',
           updateUser = '$username'
           WHERE id='".$_POST["id"]."'";
           $message = 'Data Updated';
      }
      else
      {
           $query = "INSERT INTO makepwmasstbl (lotNo, nameProduct, characteristic,
             nameLubricant1, ratioLubricant1, nameLubricant2, ratioLubricant2,
             ratioSAPA, tempCoating, rateAddJet, pressureJet, yieldJet, yieldSmall,
             yieldBig, etc, updateUser)
           VALUES('$lotNo', '$nameProduct', '$characteristic', '$nameLubricant1', $ratioLubricant1,
            '$nameLubricant2', $ratioLubricant2, $ratioSAPA, $tempCoating, $rateAddJet, $pressureJet,
            $yieldJet, $yieldSmall, $yieldBig, '$etc','$username');
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
  echo '데이터 입력 권한이 없습니다.';
}
 ?>
