
<?php
session_start();
//fetch.php
include '../db.php';
$column = array('sampleNo', 'concept', 'powderType','dateMake', 'ncpwLot',
'nameRed', 'ratioRed', 'amountRed', 'nameAmine', 'amountAmine', 'nameLubricant1',
'ratioLubricant1', 'nameLubricant2', 'ratioLubricant2', 'ratioSA', 'ratioPA', 'nameAdd',
'ratioAdd','amountAdd','tempCoating','rpmPw','sizeSem','cohesion','d10','d50','d90','dmax','tIgl','pIgl',
'cIgl','bet','td','xrd', 'na', 'phos');
$query = "SELECT * FROM analysispw_view";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE sampleNo LIKE "%'.$_POST["search"]["value"].'%"
 OR concept LIKE "%'.$_POST["search"]["value"].'%"
 OR powderType LIKE "%'.$_POST["search"]["value"].'%"
 OR dateMake LIKE "%'.$_POST["search"]["value"].'%"
 OR ncpwLot LIKE "%'.$_POST["search"]["value"].'%"
 OR nameRed LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioRed LIKE "%'.$_POST["search"]["value"].'%"
 OR amountRed LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAmine LIKE "%'.$_POST["search"]["value"].'%"
 OR amountAmine LIKE "%'.$_POST["search"]["value"].'%"
 OR nameLubricant1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioLubricant1 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameLubricant2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioLubricant2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioSA LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioPA LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAdd LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd LIKE "%'.$_POST["search"]["value"].'%"
 OR amountAdd LIKE "%'.$_POST["search"]["value"].'%"
 OR tempCoating LIKE "%'.$_POST["search"]["value"].'%"
 OR rpmPw LIKE "%'.$_POST["search"]["value"].'%"
 OR sizeSem LIKE "%'.$_POST["search"]["value"].'%"
 OR cohesion LIKE "%'.$_POST["search"]["value"].'%"
 OR d10 LIKE "%'.$_POST["search"]["value"].'%"
 OR d50 LIKE "%'.$_POST["search"]["value"].'%"
 OR d90 LIKE "%'.$_POST["search"]["value"].'%"
 OR dmax LIKE "%'.$_POST["search"]["value"].'%"
 OR tIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR pIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR cIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR bet LIKE "%'.$_POST["search"]["value"].'%"
 OR td LIKE "%'.$_POST["search"]["value"].'%"
 OR xrd LIKE "%'.$_POST["search"]["value"].'%"
 OR na LIKE "%'.$_POST["search"]["value"].'%"
 OR phos LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-column="powderType">' . $row["powderType"] . '</div>';
 $sub_array[] = '<div data-column="dateMake">' . $row["dateMake"] . '</div>';
 $sub_array[] = '<div data-column="ncpwLot">' . $row["ncpwLot"] . '</div>';
 $sub_array[] = '<div data-column="nameRed">' . $row["nameRed"] . '</div>';
 $sub_array[] = '<div data-column="ratioRed">' . $row["ratioRed"] . '</div>';
 $sub_array[] = '<div data-column="amountRed">' . $row["amountRed"] . '</div>';
 $sub_array[] = '<div data-column="nameAmine">' . $row["nameAmine"] . '</div>';
 $sub_array[] = '<div data-column="amountAmine">' . $row["amountAmine"] . '</div>';
 $sub_array[] = '<div data-column="nameLubricant1">' . $row["nameLubricant1"] . '</div>';
 $sub_array[] = '<div data-column="ratioLubricant1">' . $row["ratioLubricant1"] . '</div>';
 $sub_array[] = '<div data-column="nameLubricant2">' . $row["nameLubricant2"] . '</div>';
 $sub_array[] = '<div data-column="ratioLubricant2">' . $row["ratioLubricant2"] . '</div>';
 $sub_array[] = '<div data-column="ratioSA">' . $row["ratioSA"] . '</div>';
 $sub_array[] = '<div data-column="ratioPA">' . $row["ratioPA"] . '</div>';
 $sub_array[] = '<div data-column="nameAdd">' . $row["nameAdd"] . '</div>';
 $sub_array[] = '<div data-column="ratioAdd">' . $row["ratioAdd"] . '</div>';
 $sub_array[] = '<div data-column="amountAdd">' . $row["amountAdd"] . '</div>';
 $sub_array[] = '<div data-column="tempCoating">' . $row["tempCoating"] . '</div>';
 $sub_array[] = '<div data-column="rpmPw">' . $row["rpmPw"] . '</div>';
 $sub_array[] = '<div data-column="sizeSem">' . $row["sizeSem"] . '</div>';
 $sub_array[] = '<div data-column="cohesion">' . $row["cohesion"] . '</div>';
 $sub_array[] = '<div data-column="d10">' . $row["d10"] . '</div>';
 $sub_array[] = '<div data-column="d50">' . $row["d50"] . '</div>';
 $sub_array[] = '<div data-column="d90">' . $row["d90"] . '</div>';
 $sub_array[] = '<div data-column="dmax">' . $row["dmax"] . '</div>';
 $sub_array[] = '<div data-column="tIgl">' . $row["tIgl"] . '</div>';
 $sub_array[] = '<div data-column="pIgl">' . $row["pIgl"] . '</div>';
 $sub_array[] = '<div data-column="cIgl">' . $row["cIgl"] . '</div>';
 $sub_array[] = '<div data-column="bet">' . $row["bet"] . '</div>';
 $sub_array[] = '<div data-column="td">' . $row["td"] . '</div>';
 $sub_array[] = '<div data-column="xrd">' . $row["xrd"] . '</div>';
 $sub_array[] = '<div data-column="na">' . $row["na"] . '</div>';
 $sub_array[] = '<div data-column="phos">' . $row["phos"] . '</div>';
 
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
