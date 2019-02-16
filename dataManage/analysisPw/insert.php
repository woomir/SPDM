<?php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");

if(isset($_POST["sampleNo"]))
{
 $sampleNo = mysqli_real_escape_string($connect, $_POST["sampleNo"]);
 $d10 = mysqli_real_escape_string($connect, $_POST["d10"]);
 $d50 = mysqli_real_escape_string($connect, $_POST["d50"]);
 $d90= mysqli_real_escape_string($connect, $_POST["d90"]);
 $dmax = mysqli_real_escape_string($connect, $_POST["dmax"]);
 $totalIgl = mysqli_real_escape_string($connect, $_POST["totalIgl"]);
 $excessIgl = mysqli_real_escape_string($connect, $_POST["excessIgl"]);
 $coatingIgl = mysqli_real_escape_string($connect, $_POST["coatingIgl"]);
 $dtaPeak = mysqli_real_escape_string($connect, $_POST["dtaPeak"]);
 $enthalphy = mysqli_real_escape_string($connect, $_POST["enthalphy"]);
 $bet = mysqli_real_escape_string($connect, $_POST["bet"]);
 $td = mysqli_real_escape_string($connect, $_POST["td"]);
 $xrd = mysqli_real_escape_string($connect, $_POST["xrd"]);

 $query = "INSERT INTO analysispwtbl(sampleNo, d10, d50, d90, dmax, totalIgl, excessIgl, coatingIgl, dtaPeak, enthalphy, bet, td, xrd)
 VALUES('$sampleNo', $d10, $d50, $d90, $dmax, $totalIgl, $excessIgl, $coatingIgl, $dtaPeak, $enthalphy, $bet, $td, $xrd)";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
}else{

  echo 'Error';
}

}
?>
