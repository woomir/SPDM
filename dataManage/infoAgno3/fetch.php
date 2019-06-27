
<?php
session_start();
//fetch.php
include '../db.php';

$column = array('lotNo', 'agC','etc');
$query = "SELECT * FROM infoagno3";



if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE lotNo LIKE "%'.$_POST["search"]["value"].'%"
 OR agC LIKE "%'.$_POST["search"]["value"].'%"
 OR etc LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div data-id="'.$row["lotNo"].'" data-column="lotNo">' . $row["lotNo"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["lotNo"].'" data-column="agC">' . $row["agC"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["lotNo"].'" data-column="etc">' . $row["etc"] . '</div>';
 
 if ($_SESSION['role_id']==1){
  $sub_array[] = '<div align="center">
                  <input type="button" name="edit" value="Edit" id="'.$row["lotNo"] .'" class="btn btn-info btn-sm edit_data" />
                  <input type="button" name="delete" value="Delete" id="'.$row["lotNo"] .'" class="btn btn-sm btn-danger btn_delete" /></div>';
              } else if ($_SESSION['role_id']==2) {
                $sub_array[] = '<div align="center">
                <input type="button" name="edit" value="Edit" id="'.$row["lotNo"] .'" class="btn btn-info btn-sm edit_data" /></div>';
              } else {
                $sub_array[]='';
              }

 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM infoagno3";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data

);

echo json_encode($output);


?>
