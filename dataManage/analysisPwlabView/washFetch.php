
<?php
session_start();
//fetch.php
include '../db.php';

$column = array('sampleNo', 'concept', 'dateWashing', 'pwLot', 'amountDMW', 'amountPw',
'kindsWash', 'ratioWash', 'amountWash', 'temp', 'orderAdd', 'rpm', 'timeDissol', 'timePw', 
'maker', 'washEtc', 'd10','d50','d90','dmax','tIgl','dtaPeak', 'enthalphy', 'bet','xrd',
'pcu', 'na', 'etc');
$query = "SELECT * FROM analysispwwash_view";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE sampleNo LIKE "%'.$_POST["search"]["value"].'%"
 OR concept LIKE "%'.$_POST["search"]["value"].'%"
 OR dateWashing LIKE "%'.$_POST["search"]["value"].'%"
 OR pwLot LIKE "%'.$_POST["search"]["value"].'%"
 OR amountDMW LIKE "%'.$_POST["search"]["value"].'%"
 OR amountPw LIKE "%'.$_POST["search"]["value"].'%"
 OR kindsWash LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioWash LIKE "%'.$_POST["search"]["value"].'%"
 OR amountWash LIKE "%'.$_POST["search"]["value"].'%"
 OR temp LIKE "%'.$_POST["search"]["value"].'%"
 OR orderAdd LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm LIKE "%'.$_POST["search"]["value"].'%"
 OR timeDissol LIKE "%'.$_POST["search"]["value"].'%"
 OR timePw LIKE "%'.$_POST["search"]["value"].'%"
 OR maker LIKE "%'.$_POST["search"]["value"].'%"
 OR washEtc LIKE "%'.$_POST["search"]["value"].'%"
 OR d10 LIKE "%'.$_POST["search"]["value"].'%"
 OR d50 LIKE "%'.$_POST["search"]["value"].'%"
 OR d90 LIKE "%'.$_POST["search"]["value"].'%"
 OR dmax LIKE "%'.$_POST["search"]["value"].'%"
 OR tIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR dtaPeak LIKE "%'.$_POST["search"]["value"].'%"
 OR enthalphy LIKE "%'.$_POST["search"]["value"].'%"
 OR bet LIKE "%'.$_POST["search"]["value"].'%"
 OR xrd LIKE "%'.$_POST["search"]["value"].'%"
 OR pcu LIKE "%'.$_POST["search"]["value"].'%"
 OR na LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-column="sampleNo">' . $row["sampleNo"] . '</div>';
 $sub_array[] = '<div data-column="concept">' . $row["concept"] . '</div>';
 $sub_array[] = '<div data-column="dateWashing">' . $row["dateWashing"] . '</div>';
 $sub_array[] = '<div data-column="pwLot">' . $row["pwLot"] . '</div>';
 $sub_array[] = '<div data-column="amountDMW">' . $row["amountDMW"] . '</div>';
 $sub_array[] = '<div data-column="amountPw">' . $row["amountPw"] . '</div>';
 $sub_array[] = '<div data-column="kindsWash">' . $row["kindsWash"] . '</div>';
 $sub_array[] = '<div data-column="ratioWash">' . $row["ratioWash"] . '</div>';
 $sub_array[] = '<div data-column="amountWash">' . $row["amountWash"] . '</div>';
 $sub_array[] = '<div data-column="temp">' . $row["temp"] . '</div>';
 $sub_array[] = '<div data-column="orderAdd">' . $row["orderAdd"] . '</div>';
 $sub_array[] = '<div data-column="rpm">' . $row["rpm"] . '</div>';
 $sub_array[] = '<div data-column="timeDissol">' . $row["timeDissol"] . '</div>';
 $sub_array[] = '<div data-column="timePw">' . $row["timePw"] . '</div>';
 $sub_array[] = '<div data-column="maker">' . $row["maker"] . '</div>';
 $sub_array[] = '<div data-column="washEtc">' . $row["washEtc"] . '</div>';
 $sub_array[] = '<div data-column="d10">' . $row["d10"] . '</div>';
 $sub_array[] = '<div data-column="d50">' . $row["d50"] . '</div>';
 $sub_array[] = '<div data-column="d90">' . $row["d90"] . '</div>';
 $sub_array[] = '<div data-column="dmax">' . $row["dmax"] . '</div>';
 $sub_array[] = '<div data-column="tIgl">' . $row["tIgl"] . '</div>';
 $sub_array[] = '<div data-column="dtaPeak">' . $row["dtaPeak"] . '</div>';
 $sub_array[] = '<div data-column="enthalphy">' . $row["enthalphy"] . '</div>';
 $sub_array[] = '<div data-column="bet">' . $row["bet"] . '</div>';
 $sub_array[] = '<div data-column="xrd">' . $row["xrd"] . '</div>';
 $sub_array[] = '<div data-column="pcu">' . $row["pcu"] . '</div>';
 $sub_array[] = '<div data-column="na">' . $row["na"] . '</div>';
 $sub_array[] = '<div data-column="etc">' . $row["etc"] . '</div>';
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM analysispw_view";
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
