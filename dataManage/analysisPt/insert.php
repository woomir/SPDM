<?php
session_start();
if ($_SESSION['role_id']<3){

 $connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $sampleNo = mysqli_real_escape_string($connect, $_POST["sampleNo"]);
      $d10 = mysqli_real_escape_string($connect, $_POST["dt"]);
      $d50 = mysqli_real_escape_string($connect, $_POST["df"]);
      $d90= mysqli_real_escape_string($connect, $_POST["dn"]);
      $dmax = mysqli_real_escape_string($connect, $_POST["dmax"]);
      $tIgl = mysqli_real_escape_string($connect, $_POST["tIgl"]);
      $pIgl = mysqli_real_escape_string($connect, $_POST["pIgl"]);
      $cIgl = mysqli_real_escape_string($connect, $_POST["cIgl"]);
      $dtaPeak = mysqli_real_escape_string($connect, $_POST["dtaPeak"]);
      $enthalphy = mysqli_real_escape_string($connect, $_POST["enthalphy"]);
      $bet = mysqli_real_escape_string($connect, $_POST["bet"]);
      $td = mysqli_real_escape_string($connect, $_POST["td"]);
      $xrd = mysqli_real_escape_string($connect, $_POST["xrd"]);

      if($_POST["id"] != '')
      {
           $query = "
           UPDATE analysispwtbl
           SET sampleNo='$sampleNo',
           d10='$d10',
           d50='$d50',
           d90 = '$d90',
           dmax = '$dmax',
           tIgl = '$tIgl',
           pIgl = '$pIgl',
           cIgl = '$cIgl',
           dtaPeak = '$dtaPeak',
           enthalphy = '$enthalphy',
           bet = '$bet',
           td = '$td',
           xrd = '$xrd'
           WHERE id='".$_POST["id"]."'";
           $message = 'Data Updated';
      }
      else
      {
           $query = "INSERT INTO analysispwtbl (sampleNo, d10, d50, d90, dmax, tIgl, pIgl, cIgl, dtaPeak, enthalphy, bet, td, xrd)
           VALUES('$sampleNo', '$d10', '$d50', '$d90', '$dmax', '$tIgl', '$pIgl', '$cIgl', '$dtaPeak', '$enthalphy', '$bet', '$td', '$xrd');
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
