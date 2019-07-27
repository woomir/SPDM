
<?php
session_start();
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('lotNo', 'classPost', 'characteristic','sizeSem','d10','d50',
'd90','dmax','cohesion','ncIgl','qcIgl','tIgl','pIgl','cIgl','bet','td','xrd');


$query = 'SELECT * FROM analysispwmass_jet_view';

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE lotNo LIKE "%'.$_POST["search"]["value"].'%"
 OR characteristic LIKE "%'.$_POST["search"]["value"].'%"
 OR classPost LIKE "%'.$_POST["search"]["value"].'%"
 OR sizeSem LIKE "%'.$_POST["search"]["value"].'%"
 OR d10 LIKE "%'.$_POST["search"]["value"].'%"
 OR d50 LIKE "%'.$_POST["search"]["value"].'%"
 OR d90 LIKE "%'.$_POST["search"]["value"].'%"
 OR dmax LIKE "%'.$_POST["search"]["value"].'%"
 OR cohesion LIKE "%'.$_POST["search"]["value"].'%"
 OR ncIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR qcIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR tIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR pIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR cIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR bet LIKE "%'.$_POST["search"]["value"].'%"
 OR td LIKE "%'.$_POST["search"]["value"].'%"
 OR xrd LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-column="d10">' . $row["d10"] . '</div>';
 $sub_array[] = '<div data-column="d50">' . $row["d50"] . '</div>';
 $sub_array[] = '<div data-column="d90">' . $row["d90"] . '</div>';
 $sub_array[] = '<div data-column="dmax">' . $row["dmax"] . '</div>';
 $sub_array[] = '<div data-column="cohesion">' . $row["cohesion"] . '</div>';
 $sub_array[] = '<div data-column="ncIgl">' . $row["ncIgl"] . '</div>';
 $sub_array[] = '<div data-column="qcIgl">' . $row["qcIgl"] . '</div>';
 $sub_array[] = '<div data-column="tIgl">' . $row["tIgl"] . '</div>';
 $sub_array[] = '<div data-column="pIgl">' . $row["pIgl"] . '</div>';
 $sub_array[] = '<div data-column="cIgl">' . $row["cIgl"] . '</div>';
 $sub_array[] = '<div data-column="bet">' . $row["bet"] . '</div>';
 $sub_array[] = '<div data-column="td">' . $row["td"] . '</div>';
 $sub_array[] = '<div data-column="xrd">' . $row["xrd"] . '</div>';

 $data[] = $sub_array;
}

function get_all_data($connect)
{
$query = 'SELECT * FROM analysispwmass_jet_view';
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
