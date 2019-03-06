<?php
session_start();
if ($_SESSION['role_id']<3){

 $connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $nameRecipe = mysqli_real_escape_string($connect, $_POST["nameRecipe"]);
      $nameBinder1 = mysqli_real_escape_string($connect, $_POST["nameBinder1"]);
      if ($_POST["ratioBinder1"]!=""){
      $ratioBinder1 = mysqli_real_escape_string($connect, $_POST["ratioBinder1"]);
    } else {$ratioBinder1 = 'NULL';}

      $nameBinder2= mysqli_real_escape_string($connect, $_POST["nameBinder2"]);

      if ($_POST["ratioBinder2"]!=""){
      $ratioBinder2 = mysqli_real_escape_string($connect, $_POST["ratioBinder2"]);
    } else {$ratioBinder2 = 'NULL';}

      $nameBinder3 = mysqli_real_escape_string($connect, $_POST["nameBinder3"]);

      if ($_POST["ratioBinder3"]!=""){
      $ratioBinder3 = mysqli_real_escape_string($connect, $_POST["ratioBinder3"]);
    } else {$ratioBinder3 = 'NULL';}

      $nameSolvent1 = mysqli_real_escape_string($connect, $_POST["nameSolvent1"]);

      if ($_POST["ratioSolvent1"]!=""){
      $ratioSolvent1 = mysqli_real_escape_string($connect, $_POST["ratioSolvent1"]);
    } else {$ratioSolvent1 = 'NULL';}

      $nameSolvent2 = mysqli_real_escape_string($connect, $_POST["nameSolvent2"]);

      if ($_POST["ratioSolvent2"]!=""){
      $ratioSolvent2 = mysqli_real_escape_string($connect, $_POST["ratioSolvent2"]);
    } else {$ratioSolvent2 = 'NULL';}

      $nameSolvent3 = mysqli_real_escape_string($connect, $_POST["nameSolvent3"]);

      if ($_POST["ratioSolvent3"]!=""){
      $ratioSolvent3 = mysqli_real_escape_string($connect, $_POST["ratioSolvent3"]);
    } else {$ratioSolvent3 = 'NULL';}

      $nameSolvent4 = mysqli_real_escape_string($connect, $_POST["nameSolvent4"]);

      if ($_POST["ratioSolvent4"]!=""){
      $ratioSolvent4 = mysqli_real_escape_string($connect, $_POST["ratioSolvent4"]);
    } else {$ratioSolvent4 = 'NULL';}

      $nameAdd1 = mysqli_real_escape_string($connect, $_POST["nameAdd1"]);

      if ($_POST["ratioAdd1"]!=""){
      $ratioAdd1 = mysqli_real_escape_string($connect, $_POST["ratioAdd1"]);
    } else {$ratioAdd1 = 'NULL';}

      $nameAdd2 = mysqli_real_escape_string($connect, $_POST["nameAdd2"]);

      if ($_POST["ratioAdd2"]!=""){
      $ratioAdd2 = mysqli_real_escape_string($connect, $_POST["ratioAdd2"]);
    } else {$ratioAdd2 = 'NULL';}

      $nameAdd3 = mysqli_real_escape_string($connect, $_POST["nameAdd3"]);

      if ($_POST["ratioAdd3"]!=""){
      $ratioAdd3 = mysqli_real_escape_string($connect, $_POST["ratioAdd3"]);
    } else {$ratioAdd3 = 'NULL';}

      $nameAdd4 = mysqli_real_escape_string($connect, $_POST["nameAdd4"]);

      if ($_POST["ratioAdd4"]!=""){
      $ratioAdd4 = mysqli_real_escape_string($connect, $_POST["ratioAdd4"]);
    } else {$ratioAdd4 = 'NULL';}

      $nameAdd5 = mysqli_real_escape_string($connect, $_POST["nameAdd5"]);

      if ($_POST["ratioAdd5"]!=""){
      $ratioAdd5 = mysqli_real_escape_string($connect, $_POST["ratioAdd5"]);
    } else {$ratioAdd5 = 'NULL';}

      $nameAdd6 = mysqli_real_escape_string($connect, $_POST["nameAdd6"]);

      if ($_POST["ratioAdd6"]!=""){
      $ratioAdd6 = mysqli_real_escape_string($connect, $_POST["ratioAdd6"]);
    } else {$ratioAdd6 = 'NULL';}

      $nameGF1 = mysqli_real_escape_string($connect, $_POST["nameGF1"]);

      if ($_POST["ratioGF1"]!=""){
      $ratioGF1 = mysqli_real_escape_string($connect, $_POST["ratioGF1"]);
    } else {$ratioGF1 = 'NULL';}

      $nameGF2 = mysqli_real_escape_string($connect, $_POST["nameGF2"]);

      if ($_POST["ratioGF2"]!=""){
      $ratioGF2 = mysqli_real_escape_string($connect, $_POST["ratioGF2"]);
    } else {$ratioGF2 = 'NULL';}

    if ($_POST["ratioPw"]!=""){
    $ratioPw = mysqli_real_escape_string($connect, $_POST["ratioPw"]);
    } else {$ratioPw = 'NULL';}

      $etc = mysqli_real_escape_string($connect, $_POST["etc"]);

      if($_POST["id"] != '')
      {
           $query = "
           UPDATE recipetbl
           SET nameRecipe='$nameRecipe',
           nameBinder1='$nameBinder1',
           ratioBinder1=$ratioBinder1,
           nameBinder2 = '$nameBinder2',
           ratioBinder2 = $ratioBinder2,
           nameBinder3 = '$nameBinder3',
           ratioBinder3 = $ratioBinder3,
           nameSolvent1 = '$nameSolvent1',
           ratioSolvent1 = $ratioSolvent1,
           nameSolvent2 = '$nameSolvent2',
           ratioSolvent2 = $ratioSolvent2,
           nameSolvent3 = '$nameSolvent3',
           ratioSolvent3 = $ratioSolvent3,
           nameSolvent4 = '$nameSolvent4',
           ratioSolvent4 = $ratioSolvent4,
           nameAdd1 = '$nameAdd1',
           ratioAdd1 = $ratioAdd1,
           nameAdd2 = '$nameAdd2',
           ratioAdd2 = $ratioAdd2,
           nameAdd3 = '$nameAdd3',
           ratioAdd3 = $ratioAdd3,
           nameAdd4 = '$nameAdd4',
           ratioAdd4 = $ratioAdd4,
           nameAdd5 = '$nameAdd5',
           ratioAdd5 = $ratioAdd5,
           nameAdd6 = '$nameAdd6',
           ratioAdd6 = $ratioAdd6,
           nameGF1 = '$nameGF1',
           ratioGF1 = $ratioGF1,
           nameGF2 = '$nameGF2',
           ratioGF2 = $ratioGF2,
           ratioPw = $ratioPw,
           etc = '$etc'
           WHERE id='".$_POST["id"]."'";
           $message = 'Data Updated';
      }
      else
      {
           $query = "INSERT INTO recipetbl (nameRecipe, nameBinder1, ratioBinder1,
             nameBinder2, ratioBinder2, nameBinder3, ratioBinder3, nameSolvent1,
            ratioSolvent1, nameSolvent2, ratioSolvent2, nameSolvent3, ratioSolvent3,
            nameSolvent4, ratioSolvent4, nameAdd1, ratioAdd1, nameAdd2,
            ratioAdd2, nameAdd3, ratioAdd3, nameAdd4, ratioAdd4,
            nameAdd5, ratioAdd5, nameAdd6, ratioAdd6, nameGF1, ratioGF1, nameGF2,
            ratioGF2, ratioPw, etc)
           VALUES('$nameRecipe', '$nameBinder1', $ratioBinder1, '$nameBinder2',
             $ratioBinder2, '$nameBinder3', $ratioBinder3, '$nameSolvent1',
             $ratioSolvent1, '$nameSolvent2', $ratioSolvent2, '$nameSolvent3',
             $ratioSolvent3, '$nameSolvent4', $ratioSolvent4, '$nameAdd1',
             $ratioAdd1, '$nameAdd2', $ratioAdd2, '$nameAdd3',
             $ratioAdd3, '$nameAdd4', $ratioAdd4, '$nameAdd5', $ratioAdd5,
             '$nameAdd6', $ratioAdd6, '$nameGF1', $ratioGF1, '$nameGF2', $ratioGF2,
             $ratioPw, '$etc');
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
