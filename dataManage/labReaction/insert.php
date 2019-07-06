<?php
session_start();
if ($_SESSION['role_id']<3){
  include '../db.php';

 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $sampleNo = mysqli_real_escape_string($connect, $_POST["sampleNo"]);

      $check = "SELECT sampleNo from reactionpw where sampleNo = '$sampleNo'";
      $check_result = mysqli_num_rows(mysqli_query($connect, $check));
      $check_sampleNo = mysqli_fetch_array(mysqli_query($connect, $check));

      $object = mysqli_real_escape_string($connect, $_POST["object"]);
      $date = mysqli_real_escape_string($connect, $_POST["date"]);
      $scale = mysqli_real_escape_string($connect, $_POST["scale"]);

      if ($_POST["agC"]!=""){
      $agC = mysqli_real_escape_string($connect, $_POST["agC"]);
    } else {$agC = 'NULL';}

      if ($_POST["agTvol"]!=""){
      $agTvol = mysqli_real_escape_string($connect, $_POST["agTvol"]);
    } else {$agTvol = 'NULL';}

      if ($_POST["amEq"]!=""){
      $amEq = mysqli_real_escape_string($connect, $_POST["amEq"]);
    } else {$amEq = 'NULL';}

      $kindAdd1 = mysqli_real_escape_string($connect, $_POST["kindAdd1"]);
      if ($_POST["ratioAdd1"]!=""){
      $ratioAdd1 = mysqli_real_escape_string($connect, $_POST["ratioAdd1"]);
    } else {$ratioAdd1 = 'NULL';}
      $kindAdd2 = mysqli_real_escape_string($connect, $_POST["kindAdd2"]);
      if ($_POST["ratioAdd2"]!=""){
      $ratioAdd2 = mysqli_real_escape_string($connect, $_POST["ratioAdd2"]);
    } else {$ratioAdd2 = 'NULL';}
      $kindAdd3 = mysqli_real_escape_string($connect, $_POST["kindAdd3"]);
      if ($_POST["ratioAdd3"]!=""){
      $ratioAdd3 = mysqli_real_escape_string($connect, $_POST["ratioAdd3"]);
    } else {$ratioAdd3 = 'NULL';}
      $kindAdd4 = mysqli_real_escape_string($connect, $_POST["kindAdd4"]);
      if ($_POST["ratioAdd4"]!=""){
      $ratioAdd4 = mysqli_real_escape_string($connect, $_POST["ratioAdd4"]);
    } else {$ratioAdd4 = 'NULL';}

      if ($_POST["agTemp"]!=""){
      $agTemp = mysqli_real_escape_string($connect, $_POST["agTemp"]);
    } else {$agTemp = 'NULL';}

      if ($_POST["agRpm"]!=""){
      $agRpm = mysqli_real_escape_string($connect, $_POST["agRpm"]);
    } else {$agRpm = 'NULL';}

      $agOrder = mysqli_real_escape_string($connect, $_POST["agOrder"]);
      $agEtc = mysqli_real_escape_string($connect, $_POST["agEtc"]);
      if ($_POST["redTvol"]!=""){
        $redTvol = mysqli_real_escape_string($connect, $_POST["redTvol"]);
      } else {$redTvol = 'NULL';}
      $kindRed = mysqli_real_escape_string($connect, $_POST["kindRed"]);

      if ($_POST["redC"]!=""){
        $redC = mysqli_real_escape_string($connect, $_POST["redC"]);
      } else {$redC = 'NULL';}

      $kindRedAdd1 = mysqli_real_escape_string($connect, $_POST["kindRedAdd1"]);
      if ($_POST["ratioRedAdd1"]!=""){
      $ratioRedAdd1 = mysqli_real_escape_string($connect, $_POST["ratioRedAdd1"]);
    } else {$ratioRedAdd1 = 'NULL';}
      $kindRedAdd2 = mysqli_real_escape_string($connect, $_POST["kindRedAdd2"]);
      if ($_POST["ratioRedAdd2"]!=""){
      $ratioRedAdd2 = mysqli_real_escape_string($connect, $_POST["ratioRedAdd2"]);
    } else {$ratioRedAdd2 = 'NULL';}

      if ($_POST["redTemp"]!=""){
      $redTemp = mysqli_real_escape_string($connect, $_POST["redTemp"]);
    } else {$redTemp = 'NULL';}

      if ($_POST["redRpm"]!=""){
      $redRpm = mysqli_real_escape_string($connect, $_POST["redRpm"]);
    } else {$redRpm = 'NULL';}

     if ($_POST["ratioReactionNaOH"]!=""){
      $ratioReactionNaOH = mysqli_real_escape_string($connect, $_POST["ratioReactionNaOH"]);
    } else {$ratioReactionNaOH = 'NULL';}

      $redEtc = mysqli_real_escape_string($connect, $_POST["redEtc"]);

      if ($_POST["reactionpH"]!=""){
        $reactionpH = mysqli_real_escape_string($connect, $_POST["reactionpH"]);
      } else {$reactionpH = 'NULL';}
      if ($_POST["reactionTemp"]!=""){
        $reactionTemp = mysqli_real_escape_string($connect, $_POST["reactionTemp"]);
      } else {$reactionTemp = 'NULL';}

      $infoAgno3_lotNo = mysqli_real_escape_string($connect, $_POST["infoAgno3_lotNo"]);

      
      $maker = mysqli_real_escape_string($connect, $_POST["maker"]);
      $username = $_POST["username"];

    
        if ($_POST["id"] == 'edit'){
           $query = "
           UPDATE reactionpw
           SET object='$object',
           date='$date',
           scale = '$scale',
           agC = $agC,
           agTvol = $agTvol,
           amEq = $amEq,
           kindAdd1 = '$kindAdd1',
           ratioAdd1 = $ratioAdd1,
           kindAdd2 = '$kindAdd2',
           ratioAdd2 = $ratioAdd2,
           kindAdd3 = '$kindAdd3',
           ratioAdd3 = $ratioAdd3,
           kindAdd4 = '$kindAdd4',
           ratioAdd4 = $ratioAdd4,
           agTemp = $agTemp,
           agRpm = $agRpm,
           agOrder = '$agOrder',
           agEtc = '$agEtc',
           redTvol = $redTvol,
           kindRed = '$kindRed',
           redC = $redC,
           kindRedAdd1 = '$kindRedAdd1',
           ratioRedAdd1 = $ratioRedAdd1,
           kindRedAdd2 = '$kindRedAdd2',
           ratioRedAdd2 = $ratioRedAdd2,
           redTemp = $redTemp,
           redRpm = $redRpm,
           ratioReactionNaOH = $ratioReactionNaOH,
           redEtc = '$redEtc',
           reactionpH = $reactionpH,
           reactionTemp = $reactionTemp,
           infoAgno3_lotNo = '$infoAgno3_lotNo',
           maker = '$maker',
           updateUser = '$username'
           WHERE sampleNo='".$_POST["sampleNo"]."'";
           $message = 'Data Updated';

           if($check_sampleNo["sampleNo"] == $sampleNo )
           {
              mysqli_query($connect, $query);
              $output .= $message;
           }
          else {
           $output = 'Sample No는 변경할 수 없습니다.<br> 데이터 삭제 후 재입력 바랍니다.';
         }
       }
       else
       {
         if($check_result == 0){
           $query = "INSERT INTO reactionpw (sampleNo, object, date, scale, agC,
           agTvol, amEq, kindAdd1, ratioAdd1, kindAdd2, ratioAdd2, kindAdd3,
           ratioAdd3, kindAdd4, ratioAdd4, agTemp, agRpm,
           agOrder, agEtc, redTvol, kindRed, redC, kindRedAdd1,
           ratioRedAdd1, kindRedAdd2, ratioRedAdd2, redTemp,redRpm,
           ratioReactionNaOH, redEtc, reactionpH, reactionTemp, infoAgno3_lotNo, maker, updateUser)
           VALUES('$sampleNo', '$object', '$date', '$scale', $agC,
             $agTvol, $amEq, '$kindAdd1', $ratioAdd1, '$kindAdd2',
             $ratioAdd2, '$kindAdd3', $ratioAdd3, '$kindAdd4',
             $ratioAdd4, $agTemp, $agRpm, '$agOrder', '$agEtc',
             $redTvol, '$kindRed', $redC, '$kindRedAdd1', $ratioRedAdd1, '$kindRedAdd2', $ratioRedAdd2,
             $redTemp, $redRpm, $ratioReactionNaOH, '$redEtc',
             $reactionpH, $reactionTemp, '$infoAgno3_lotNo', '$maker','$username');
           ";
           $message = 'Data Inserted';

            if(mysqli_query($connect, $query))
                {
                    $output .= $message;
                } 
        } else {
          $output = '동일한 Sample No가 존재합니다.<br>확인 후 재입력 바랍니다.';
        }
      }
      echo $output;
 }
} else {
  echo '데이터 입력 권한이 없습니다.';
}
 ?>
