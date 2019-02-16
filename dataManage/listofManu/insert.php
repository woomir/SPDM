<?php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
if(isset($_POST["pasteNo"], $_POST["powderLot"]))
{
 $pasteNo = mysqli_real_escape_string($connect, $_POST["pasteNo"]);
 $powderLot = mysqli_real_escape_string($connect, $_POST["powderLot"]);
 $powderType = mysqli_real_escape_string($connect, $_POST["powderType"]);
 $dateMake= mysqli_real_escape_string($connect, $_POST["dateMake"]);
 $maker = mysqli_real_escape_string($connect, $_POST["maker"]);
 $object = mysqli_real_escape_string($connect, $_POST["object"]);
 $amount = mysqli_real_escape_string($connect, $_POST["amount"]);
 $recipe = mysqli_real_escape_string($connect, $_POST["recipe"]);
 $etc = mysqli_real_escape_string($connect, $_POST["etc"]);
 $query = "INSERT INTO makelistpastetbl(pasteNo,powderLot, powderType, dateMake, maker, object, amount, recipe, etc)
 VALUES('$pasteNo', '$powderLot', '$powderType', '$dateMake', '$maker', '$object', '$amount', '$recipe', '$etc')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
