<?php
session_start();
if ($_SESSION['role_id']<3){

 $connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $lotNo = mysqli_real_escape_string($connect, $_POST["lotNo"]);
      $classPost = mysqli_real_escape_string($connect, $_POST["classPost"]);

      $check = "SELECT * from analysispwmasstbl where lotNo = '$lotNo' AND classPost = '$classPost'";
      $check_result = mysqli_num_rows(mysqli_query($connect, $check));

      if ($_POST["sizeSem"]!=""){
      $sizeSem = mysqli_real_escape_string($connect, $_POST["sizeSem"]);
    } else {$sizeSem = 'NULL';}
      if ($_POST["stdSem"]!=""){
      $stdSem = mysqli_real_escape_string($connect, $_POST["stdSem"]);
    } else {$stdSem = 'NULL';}
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
      if ($_POST["ncIgl"]!=""){
      $ncIgl = mysqli_real_escape_string($connect, $_POST["ncIgl"]);
    } else {$ncIgl = 'NULL';}
      if ($_POST["qcIgl"]!=""){
      $qcIgl = mysqli_real_escape_string($connect, $_POST["qcIgl"]);
    } else {$qcIgl = 'NULL';}
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
      if ($_POST["pcuR"]!=""){
      $pcuR = mysqli_real_escape_string($connect, $_POST["pcuR"]);
    } else {$pcuR = 'NULL';}
      if ($_POST["pcuNc"]!=""){
      $pcuNc = mysqli_real_escape_string($connect, $_POST["pcuNc"]);
    } else {$pcuNc = 'NULL';}
      if ($_POST["na"]!=""){
      $na = mysqli_real_escape_string($connect, $_POST["na"]);
    } else {$na = 'NULL';}
      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
      $username = $_POST["username"];

      if($_POST["id"] === 'edit')
      {
        if ($check_result > 0){
           $query = "
           UPDATE analysispwmasstbl
           SET 
           sizeSem=$sizeSem,
           stdSem=$stdSem,
           d10=$d10,
           d50=$d50,
           d90 = $d90,
           dmax = $dmax,
           ncIgl = $ncIgl,
           qcIgl = $qcIgl,
           tIgl = $tIgl,
           pIgl = $pIgl,
           cIgl = $cIgl,
           dtaPeak = $dtaPeak,
           enthalphy = $enthalphy,
           bet = $bet,
           td = $td,
           xrd = $xrd,
           pcuR = $pcuR,
           pcuNc = $pcuNc,
           na = $na,
           etc = '$etc',
           updateUser = '$username'
           WHERE lotNo = '$lotNo' and classPost = '$classPost'";
           $message = 'Data Updated';
           if(mysqli_query($connect, $query))
          {
              $output .= $message;
          }
        } else {
          $output = 'Lot No 또는 Powder Type을 변경할 수 없습니다.<br> 데이터 삭제 후 재입력 바랍니다.';
        }
      }
      else
      {
        if($check_result == 0) {
           $query = "INSERT INTO analysispwmasstbl (lotNo, classPost, sizeSem,
             stdSem, d10, d50, d90, dmax, ncIgl, qcIgl, tIgl, pIgl, cIgl, dtaPeak,
             enthalphy, bet, td, xrd, pcuR, pcuNc, na, etc, updateUser)
           VALUES('$lotNo', '$classPost', $sizeSem, $stdSem, $d10, $d50, $d90,
             $dmax, $ncIgl, $qcIgl, $tIgl, $pIgl, $cIgl, $dtaPeak, $enthalphy,
             $bet, $td, $xrd, $pcuR, $pcuNc, $na, '$etc','$username');
           ";
           $message = 'Data Inserted';

      if(mysqli_query($connect, $query))
      {
           $output .= $message;
      }
    } else {
      echo "동일한 Lot No와 Powder Type이 존재합니다.";
    }

  }
      echo $output;
 }
} else {
  echo '데이터 입력 권한이 없습니다.';
}
 ?>
