<?php
session_start();
include '../db.php';
if ($_SESSION['role_id']<3){

 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $sampleNo = mysqli_real_escape_string($connect, $_POST["sampleNo"]);
      $powderType = mysqli_real_escape_string($connect, $_POST["powderType"]);

      $check = "SELECT sampleNo from analysispwtbl where sampleNo = '$sampleNo' and powderType = '$powderType'";
      $check_result = mysqli_num_rows(mysqli_query($connect, $check));

      if ($_POST["sizeSem"]!=""){
        $sizeSem = mysqli_real_escape_string($connect, $_POST["sizeSem"]);
        } else {$sizeSem = 'NULL';}
      if ($_POST["dt"]!=""){
      $d10 = mysqli_real_escape_string($connect, $_POST["dt"]);
      } else {$d10 = 'NULL';}
      if ($_POST["df"]!=""){
      $d50 = mysqli_real_escape_string($connect, $_POST["df"]);
    } else {$d50 = 'NULL';}
      if ($_POST["dn"]!=""){
      $d90= mysqli_real_escape_string($connect, $_POST["dn"]);
    } else {$d90 = 'NULL';}
      if ($_POST["dmax"]!=""){
      $dmax = mysqli_real_escape_string($connect, $_POST["dmax"]);
    } else {$dmax = 'NULL';}
      if ($_POST["tIgl"]!=""){
      $tIgl = mysqli_real_escape_string($connect, $_POST["tIgl"]);
    } else {$tIgl = 'NULL';}
      if ($_POST["pIgl"]!=""){
      $pIgl = mysqli_real_escape_string($connect, $_POST["pIgl"]);
    } else {$pIgl = 'NULL';}
      if ($_POST["cIgl"]!=""){
      $cIgl = mysqli_real_escape_string($connect, $_POST["cIgl"]);
    } else {$cIgl = 'NULL';}
      if ($_POST["dtaPeak"]!=""){
      $dtaPeak = mysqli_real_escape_string($connect, $_POST["dtaPeak"]);
    } else {$dtaPeak = 'NULL';}
      if ($_POST["enthalphy"]!=""){
      $enthalphy = mysqli_real_escape_string($connect, $_POST["enthalphy"]);
      } else {$enthalphy = 'NULL';}
      if ($_POST["bet"]!=""){
      $bet = mysqli_real_escape_string($connect, $_POST["bet"]);
    } else {$bet = 'NULL';}
      if ($_POST["td"]!=""){
      $td = mysqli_real_escape_string($connect, $_POST["td"]);
    } else {$td = 'NULL';}
      if ($_POST["xrd"]!=""){
      $xrd = mysqli_real_escape_string($connect, $_POST["xrd"]);
    } else {$xrd = 'NULL';}
      if ($_POST["pcu"]!=""){
        $pcu = mysqli_real_escape_string($connect, $_POST["pcu"]);
      } else {$pcu = 'NULL';}
      if ($_POST["na"]!=""){
        $na = mysqli_real_escape_string($connect, $_POST["na"]);
      } else {$na = 'NULL';}
      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
      $username = $_POST["username"];

      if($_POST["id"] === 'edit')
      {
        if ($check_result > 0){
           $query = "
           UPDATE analysispwtbl
           SET 
           sizeSem='$sizeSem',
           d10=$d10,
           d50=$d50,
           d90 = $d90,
           dmax = $dmax,
           tIgl = $tIgl,
           pIgl = $pIgl,
           cIgl = $cIgl,
           dtaPeak = $dtaPeak,
           enthalphy = $enthalphy,
           bet = $bet,
           td = $td,
           xrd = $xrd,
           pcu = $pcu,
           na = $na,
           etc = '$etc',
           updateUser = '$username'
           WHERE sampleNo='$sampleNo' and powderType = '$powderType'";
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
           $query = "INSERT INTO analysispwtbl (sampleNo, powderType, sizeSem, d10, d50,
             d90, dmax, tIgl, pIgl, cIgl, dtaPeak, enthalphy, bet, td, xrd, pcu, na, etc, updateUser)
           VALUES('$sampleNo', '$powderType', $sizeSem, $d10, $d50, $d90, $dmax, $tIgl,
             $pIgl, $cIgl, $dtaPeak, $enthalphy, $bet, $td, $xrd, $pcu, $na, '$etc','$username');
           ";
           $message = 'Data Inserted';
      
      if(mysqli_query($connect, $query))
      {
           $output .= $message;
      }
    } else {
      echo "동일한 Sample No와 Powder Type이 존재합니다.";
    }
  }
      echo $output;
 }
} else {
  echo '데이터 입력 권한이 없습니다.';
}
 ?>
