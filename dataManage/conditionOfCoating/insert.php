<?php
session_start();
if ($_SESSION['role_id']<3){
 $connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $sampleNo = mysqli_real_escape_string($connect, $_POST["sampleNo"]);
      $concept = mysqli_real_escape_string($connect, $_POST["concept"]);
      $dateMake = mysqli_real_escape_string($connect, $_POST["dateMake"]);
      $ncpwLot= mysqli_real_escape_string($connect, $_POST["ncpwLot"]);
      if ($_POST["amountPw"]!=""){
      $amountPw = mysqli_real_escape_string($connect, $_POST["amountPw"]);
    } else {$amountPw = 'NULL';}
      $conditionWash = mysqli_real_escape_string($connect, $_POST["conditionWash"]);
      $nameRed = mysqli_real_escape_string($connect, $_POST["nameRed"]);
      if ($_POST["ratioRed"]!=""){
      $ratioRed = mysqli_real_escape_string($connect, $_POST["ratioRed"]);
    } else {$ratioRed = 'NULL';}
      $lotRed = mysqli_real_escape_string($connect, $_POST["lotRed"]);
      $nameAmine = mysqli_real_escape_string($connect, $_POST["nameAmine"]);
      if ($_POST["amountAmine"]!=""){
      $amountAmine = mysqli_real_escape_string($connect, $_POST["amountAmine"]);
    } else {$amountAmine = 'NULL';}
      $nameLubricant1 = mysqli_real_escape_string($connect, $_POST["nameLubricant1"]);
      if ($_POST["ratioLubricant1"]!=""){
      $ratioLubricant1 = mysqli_real_escape_string($connect, $_POST["ratioLubricant1"]);
    } else {$ratioLubricant1 = 'NULL';}
      $nameLubricant2 = mysqli_real_escape_string($connect, $_POST["nameLubricant2"]);
      if ($_POST["ratioLubricant2"]!=""){
      $ratioLubricant2 = mysqli_real_escape_string($connect, $_POST["ratioLubricant2"]);
    } else {$ratioLubricant2 = 'NULL';}
      if ($_POST["ratioSA"]!=""){
      $ratioSA = mysqli_real_escape_string($connect, $_POST["ratioSA"]);
    } else {$ratioSA = 'NULL';}
      if ($_POST["ratioPA"]!=""){
      $ratioPA = mysqli_real_escape_string($connect, $_POST["ratioPA"]);
    } else {$ratioPA = 'NULL';}
      $nameSolLubri = mysqli_real_escape_string($connect, $_POST["nameSolLubri"]);
      if ($_POST["amountSolLubri"]!=""){
      $amountSolLubri = mysqli_real_escape_string($connect, $_POST["amountSolLubri"]);
    } else {$amountSolLubri = 'NULL';}
      if ($_POST["tempSolLubri"]!=""){
      $tempSolLubri = mysqli_real_escape_string($connect, $_POST["tempSolLubri"]);
    } else {$tempSolLubri = 'NULL';}
      $nameSolPw = mysqli_real_escape_string($connect, $_POST["nameSolPw"]);
      if ($_POST["amountSolPw"]!=""){
      $amountSolPw = mysqli_real_escape_string($connect, $_POST["amountSolPw"]);
    } else {$amountSolPw = 'NULL';}
      $orderAdd = mysqli_real_escape_string($connect, $_POST["orderAdd"]);
      if ($_POST["tempCoating"]!=""){
      $tempCoating = mysqli_real_escape_string($connect, $_POST["tempCoating"]);
    } else {$tempCoating = 'NULL';}
      if ($_POST["rpmPw"]!=""){
      $rpmPw = mysqli_real_escape_string($connect, $_POST["rpmPw"]);
    } else {$rpmPw = 'NULL';}
      if ($_POST["timePw"]!=""){
      $timePw = mysqli_real_escape_string($connect, $_POST["timePw"]);
    } else {$timePw = 'NULL';}
      if ($_POST["rpmRed"]!=""){
      $rpmRed = mysqli_real_escape_string($connect, $_POST["rpmRed"]);
    } else {$rpmRed = 'NULL';}
      if ($_POST["timeRed"]!=""){
      $timeRed = mysqli_real_escape_string($connect, $_POST["timeRed"]);
    } else {$timeRed = 'NULL';}
      if ($_POST["rpmAmine"]!=""){
      $rpmAmine = mysqli_real_escape_string($connect, $_POST["rpmAmine"]);
    } else {$rpmAmine = 'NULL';}
      if ($_POST["timeAmine"]!=""){
      $timeAmine = mysqli_real_escape_string($connect, $_POST["timeAmine"]);
    } else {$timeAmine = 'NULL';}
      if ($_POST["rpmCoating"]!=""){
      $rpmCoating = mysqli_real_escape_string($connect, $_POST["rpmCoating"]);
    } else {$rpmCoating = 'NULL';}
      if ($_POST["timeCoating1"]!=""){
      $timeCoating1 = mysqli_real_escape_string($connect, $_POST["timeCoating1"]);
    } else {$timeCoating1 = 'NULL';}
      if ($_POST["timeCoating2"]!=""){
      $timeCoating2 = mysqli_real_escape_string($connect, $_POST["timeCoating2"]);
    } else {$timeCoating2 = 'NULL';}
      if ($_POST["conductivityAfterPw"]!=""){
      $conductivityAfterPw = mysqli_real_escape_string($connect, $_POST["conductivityAfterPw"]);
    } else {$conductivityAfterPw = 'NULL';}
      if ($_POST["tempAfterPw"]!=""){
      $tempAfterPw = mysqli_real_escape_string($connect, $_POST["tempAfterPw"]);
    } else {$tempAfterPw = 'NULL';}
      if ($_POST["pHBeforeCoating"]!=""){
      $pHBeforeCoating = mysqli_real_escape_string($connect, $_POST["pHBeforeCoating"]);
    } else {$pHBeforeCoating = 'NULL';}
      $maker = mysqli_real_escape_string($connect, $_POST["maker"]);
      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);

      if($_POST["id"] != '')
      {
           $query = "
           UPDATE conditioncoatingtbl
           SET sampleNo='$sampleNo',
           concept='$concept',
           dateMake='$dateMake',
           ncpwLot = '$ncpwLot',
           amountPw = $amountPw,
           conditionWash = '$conditionWash',
           nameRed = '$nameRed',
           ratioRed = $ratioRed,
           lotRed = '$lotRed',
           nameAmine = '$nameAmine',
           amountAmine = $amountAmine,
           nameLubricant1 = '$nameLubricant1',
           ratioLubricant1 = $ratioLubricant1,
           nameLubricant2 = '$nameLubricant2',
           ratioLubricant2 = $ratioLubricant2,
           ratioSA = $ratioSA,
           ratioPA = $ratioPA,
           nameSolLubri = '$nameSolLubri',
           amountSolLubri = $amountSolLubri,
           tempSolLubri = $tempSolLubri,
           nameSolPw = '$nameSolPw',
           amountSolPw = $amountSolPw,
           orderAdd = '$orderAdd',
           tempCoating = $tempCoating,
           rpmPw = $rpmPw,
           timePw = $timePw,
           rpmRed = $rpmRed,
           timeRed = $timeRed,
           rpmAmine = $rpmAmine,
           timeAmine = $timeAmine,
           rpmCoating = $rpmCoating,
           timeCoating1 = $timeCoating1,
           timeCoating2 = $timeCoating2,
           conductivityAfterPw = $conductivityAfterPw,
           tempAfterPw = $tempAfterPw,
           pHBeforeCoating = $pHBeforeCoating,
           maker = '$maker',
           etc = '$etc'
           WHERE id='".$_POST["id"]."'";
           $message = 'Data Updated';
      }
      else
      {
           $query = "INSERT INTO conditioncoatingtbl (sampleNo, concept, dateMake,
             ncpwLot, amountPw, conditionWash, nameRed, ratioRed, lotRed, nameAmine,
             amountAmine, nameLubricant1, ratioLubricant1, nameLubricant2, ratioLubricant2,
             ratioSA, ratioPA, nameSolLubri, amountSolLubri, tempSolLubri, nameSolPw,
            amountSolPw, orderAdd, tempCoating, rpmPw, timePw, rpmRed, timeRed,
            rpmAmine, timeAmine, rpmCoating, timeCoating1, timeCoating2, conductivityAfterPw,
            tempAfterPw, pHBeforeCoating, maker, etc)
           VALUES('$sampleNo', '$concept', '$dateMake', '$ncpwLot', $amountPw,
             '$conditionWash', '$nameRed', $ratioRed, '$lotRed', '$nameAmine',
             $amountAmine, '$nameLubricant1', $ratioLubricant1, '$nameLubricant2',
             $ratioLubricant2, $ratioSA, $ratioPA, '$nameSolLubri', $amountSolLubri,
             $tempSolLubri, '$nameSolPw', $amountSolPw, '$orderAdd', $tempCoating,
             $rpmPw, $timePw, $rpmRed, $timeRed, $rpmAmine, $timeAmine, $rpmCoating,
             $timeCoating1, $timeCoating2, $conductivityAfterPw, $tempAfterPw,
             $pHBeforeCoating, '$maker', '$etc');
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
