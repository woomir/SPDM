<?php
session_start();
if ($_SESSION['role_id']<3){

 $connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $sampleNo = mysqli_real_escape_string($connect, $_POST["sampleNo"]);
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
      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);

      if($_POST["id"] != '')
      {
           $query = "
           UPDATE analysispwtbl
           SET sampleNo='$sampleNo',
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
           etc = '$etc'
           WHERE id='".$_POST["id"]."'";
           $message = 'Data Updated';
      }
      else
      {
           $query = "INSERT INTO analysispwtbl (sampleNo, d10, d50, d90, dmax, tIgl, pIgl, cIgl, dtaPeak, enthalphy, bet, td, xrd, etc)
           VALUES('$sampleNo', $d10, $d50, $d90, $dmax, $tIgl, $pIgl, $cIgl, $dtaPeak, $enthalphy, $bet, $td, $xrd, '$etc');
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
