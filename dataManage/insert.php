<?php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
if(isset($_POST["id"], $_POST["lotPw"]))
{
 $id = mysqli_real_escape_string($connect, $_POST["id"]);
 $lotPw = mysqli_real_escape_string($connect, $_POST["lotPw"]);
 $makerPaste = mysqli_real_escape_string($connect, $_POST["makerPaste"]);
 $dateMake= mysqli_real_escape_string($connect, $_POST["dateMake"]);
 $recipePaste = mysqli_real_escape_string($connect, $_POST["recipePaste"]);
 $amountPaste = mysqli_real_escape_string($connect, $_POST["amountPaste"]);
 $objectMakePaste = mysqli_real_escape_string($connect, $_POST["objectMakePaste"]);
 $etcPaste = mysqli_real_escape_string($connect, $_POST["etcPaste"]);
 $query = "INSERT INTO makelistpastetbl(id, lotPw, makerPaste, dateMake, recipePaste, amountPaste, objectMakePaste, etcPaste) VALUES('$id', '$lotPw', '$makerPaste', '$dateMake', '$recipePaste', '$amountPaste', '$objectMakePaste', '$etcPaste')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
