<?php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");


if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE makelistpastetbl SET ".$_POST["column_name"]."='".$value."' WHERE pasteNo = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}

?>
