
<?php
session_start();
//fetch.php
include '../db.php';

$column = array('pasteNo', 'timeAging', 'fileName', 'created');
$query = "SELECT * FROM filepttbl";
$filepath = "../dataManage/analysisPt/uploads/";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE pasteNo LIKE "%'.$_POST["search"]["value"].'%"
 OR timeAging LIKE "%'.$_POST["search"]["value"].'%"
 OR fileName LIKE "%'.$_POST["search"]["value"].'%"
 OR created LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-column="pasteNo">' . $row["pasteNo"] . '</div>';
 $sub_array[] = '<div data-column="timeAging">' . $row["timeAging"] . '</div>';
 $sub_array[] = '<div data-column="fileName"><a href="'.$filepath.$row["fileName"].'" download>'.$row["fileName"].'</a></div>';
 $sub_array[] = '<div data-column="created">' . $row["created"] . '</div>';
 
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM filepttbl";
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
