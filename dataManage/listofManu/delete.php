<?php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM user WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}


if (isset($_POST['delete']) && isset($_POST['check']))
	{
		foreach($_POST['check'] as $del_id)
		{
			$sql = "DELETE FROM makelistpastetbl WHERE id ='".$del_id."'";
      mysqli_query($connect,$sql);
      }
      header("location:/Project/SPDM/database/listofManu.php");
	} else {
    header("location:/Project/SPDM/database/listofManu.php");
  }
?>
