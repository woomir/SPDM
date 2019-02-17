<?php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
if(isset($_POST["sampleNo"]))
{
 $query = "DELETE FROM analysispwtbl WHERE sampleNo = '".$_POST["sampleNo"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}


if (isset($_POST['delete']) && isset($_POST['check']))
	{
		foreach($_POST['check'] as $del_id)
		{
			$sql = "DELETE FROM analysispwtbl WHERE sampleNo ='".$del_id."'";
      mysqli_query($connect,$sql);
      }
      header("location:/Project/SPDM/database/analysisPw.php");
	} else {
    header("location:/Project/SPDM/database/analysisPw.php");
  }
?>
