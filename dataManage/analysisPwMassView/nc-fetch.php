
<?php
session_start();
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('lotNo', 'classPost', 'characteristic','sizeSem','tIgl','pcuNc','etc');


$query = 'SELECT * FROM analysispwmass_nc_view';

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE lotNo LIKE "%'.$_POST["search"]["value"].'%"
 OR characteristic LIKE "%'.$_POST["search"]["value"].'%"
 OR classPost LIKE "%'.$_POST["search"]["value"].'%"
 OR sizeSem LIKE "%'.$_POST["search"]["value"].'%"
 OR tIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR pcuNc LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-column="lotNo">' . $row["lotNo"] . '</div>';
 $sub_array[] = '<div data-column="classPost">' . $row["classPost"] . '</div>';
 $sub_array[] = '<div data-column="characteristic">' . $row["characteristic"] . '</div>';
 $sub_array[] = '<div data-column="sizeSem">' . $row["sizeSem"] . '</div>';
 $sub_array[] = '<div data-column="tIgl">' . $row["tIgl"] . '</div>';
 $sub_array[] = '<div data-column="pcuNc">' . $row["pcuNc"] . '</div>';
 $sub_array[] = '<div data-column="etc">' . $row["etc"] . '</div>';

 $data[] = $sub_array;
}

function get_all_data($connect)
{
$query = 'SELECT * FROM analysispwmass_nc_view';
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
