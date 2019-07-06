
<?php
session_start();
//fetch.php
include '../db.php';

$column = array('sampleNo', 'object', 'date', 'scale', 'agC',
'agTvol', 'amEq', 'amountAm', 'kindAdd1', 'ratioAdd1', 'amountAdd1', 'kindAdd2', 
'ratioAdd2', 'amountAdd2', 'kindAdd3', 'ratioAdd3', 'amountAdd3', 'kindAdd4', 
'ratioAdd4', 'amountAdd4', 'agTemp', 'agRpm', 'agOrder', 'agEtc', 'redTvol', 'kindRed', 
'redC', 'amountRed', 'kindRedAdd1', 'ratioRedAdd1', 'amountRedAdd1', 'kindRedAdd2', 
'ratioRedAdd2', 'amountRedAdd2', 'redTemp','redRpm', 'ratioReactionNaOH', 'redEtc', 
'reactionpH', 'reactionTemp', 'infoAgno3_lotNo', 'maker','d10', 'd50', 'd90', 'dmax',
'tIgl', 'pIgl', 'cIgl', 'dtaPeak', 'enthalphy', 'bet', 'td', 'xrd', 'pcu', 'na', 'etc');

$query = "SELECT * FROM analysispwreaction_view";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE sampleNo LIKE "%'.$_POST["search"]["value"].'%"
 OR object LIKE "%'.$_POST["search"]["value"].'%"
 OR date LIKE "%'.$_POST["search"]["value"].'%"
 OR scale LIKE "%'.$_POST["search"]["value"].'%"
 OR agC LIKE "%'.$_POST["search"]["value"].'%"
 OR agTvol LIKE "%'.$_POST["search"]["value"].'%"
 OR amEq LIKE "%'.$_POST["search"]["value"].'%"
 OR amountAm LIKE "%'.$_POST["search"]["value"].'%"
 OR kindAdd1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd1 LIKE "%'.$_POST["search"]["value"].'%"
 OR amountAdd1 LIKE "%'.$_POST["search"]["value"].'%"
 OR kindAdd2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd2 LIKE "%'.$_POST["search"]["value"].'%"
 OR amountAdd2 LIKE "%'.$_POST["search"]["value"].'%"
 OR kindAdd3 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd3 LIKE "%'.$_POST["search"]["value"].'%"
 OR amountAdd3 LIKE "%'.$_POST["search"]["value"].'%"
 OR kindAdd4 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd4 LIKE "%'.$_POST["search"]["value"].'%"
 OR amountAdd4 LIKE "%'.$_POST["search"]["value"].'%"
 OR agTemp LIKE "%'.$_POST["search"]["value"].'%"
 OR agRpm LIKE "%'.$_POST["search"]["value"].'%"
 OR agOrder LIKE "%'.$_POST["search"]["value"].'%"
 OR agEtc LIKE "%'.$_POST["search"]["value"].'%"
 OR redTvol LIKE "%'.$_POST["search"]["value"].'%"
 OR kindRed LIKE "%'.$_POST["search"]["value"].'%"
 OR redC LIKE "%'.$_POST["search"]["value"].'%"
 OR amountRed LIKE "%'.$_POST["search"]["value"].'%"
 OR kindRedAdd1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioRedAdd1 LIKE "%'.$_POST["search"]["value"].'%"
 OR amountRedAdd1 LIKE "%'.$_POST["search"]["value"].'%"
 OR kindRedAdd2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioRedAdd2 LIKE "%'.$_POST["search"]["value"].'%"
 OR amountRedAdd2 LIKE "%'.$_POST["search"]["value"].'%"
 OR redTemp LIKE "%'.$_POST["search"]["value"].'%"
 OR redRpm LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioReactionNaOH LIKE "%'.$_POST["search"]["value"].'%"
 OR redEtc LIKE "%'.$_POST["search"]["value"].'%"
 OR reactionpH LIKE "%'.$_POST["search"]["value"].'%"
 OR reactionTemp LIKE "%'.$_POST["search"]["value"].'%"
 OR infoAgno3_lotNo LIKE "%'.$_POST["search"]["value"].'%"
 OR maker LIKE "%'.$_POST["search"]["value"].'%"
 OR d10 LIKE "%'.$_POST["search"]["value"].'%"
 OR d50 LIKE "%'.$_POST["search"]["value"].'%"
 OR d90 LIKE "%'.$_POST["search"]["value"].'%"
 OR dmax LIKE "%'.$_POST["search"]["value"].'%"
 OR tIgl LIKE   "%'.$_POST["search"]["value"].'%"
 OR pIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR cIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR dtaPeak LIKE "%'.$_POST["search"]["value"].'%"
 OR enthalphy LIKE "%'.$_POST["search"]["value"].'%"
 OR bet LIKE "%'.$_POST["search"]["value"].'%"
 OR td LIKE "%'.$_POST["search"]["value"].'%"
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

// var_dump(mysqli_fetch_array(mysqli_query($connect, $query)));

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div data-column="sampleNo">' . $row["sampleNo"] . '</div>';
 $sub_array[] = '<div data-column="object">' . $row["object"] . '</div>';
 $sub_array[] = '<div data-column="date">' . $row["date"] . '</div>';
 $sub_array[] = '<div data-column="scale">' . $row["scale"] . '</div>';
 $sub_array[] = '<div data-column="infoAgno3_lotNo">' . $row["infoAgno3_lotNo"] . '</div>';
 $sub_array[] = '<div data-column="agC">' . $row["agC"] . '</div>';
 $sub_array[] = '<div data-column="agTvol">' . $row["agTvol"] . '</div>';
 $sub_array[] = '<div data-column="amEq">' . $row["amEq"] . '</div>';
 $sub_array[] = '<div data-column="amountAm">' . sprintf("%.0f",$row["amountAm"]) . '</div>';
 $sub_array[] = '<div data-column="kindAdd1">' . $row["kindAdd1"] . '</div>';
 $sub_array[] = '<div data-column="ratioAdd1">' . $row["ratioAdd1"] . '</div>';
 $sub_array[] = '<div data-column="amountAdd1">' . $row["amountAdd1"] . '</div>';
 $sub_array[] = '<div data-column="kindAdd2">' . $row["kindAdd2"] . '</div>';
 $sub_array[] = '<div data-column="ratioAdd2">' . $row["ratioAdd2"] . '</div>';
 $sub_array[] = '<div data-column="amountAdd2">' . $row["amountAdd2"] . '</div>';
 $sub_array[] = '<div data-column="kindAdd3">' . $row["kindAdd3"] . '</div>';
 $sub_array[] = '<div data-column="ratioAdd3">' . $row["ratioAdd3"] . '</div>';
 $sub_array[] = '<div data-column="amountAdd3">' . $row["amountAdd3"] . '</div>';
 $sub_array[] = '<div data-column="kindAdd4">' . $row["kindAdd4"] . '</div>';
 $sub_array[] = '<div data-column="ratioAdd4">' . $row["ratioAdd4"] . '</div>';
 $sub_array[] = '<div data-column="amountAdd4">' . $row["amountAdd4"] . '</div>';
 $sub_array[] = '<div data-column="agTemp">' . $row["agTemp"] . '</div>';
 $sub_array[] = '<div data-column="agRpm">' . $row["agRpm"] . '</div>';
 $sub_array[] = '<div data-column="agOrder">' . $row["agOrder"] . '</div>';
 $sub_array[] = '<div data-column="agEtc">' . $row["agEtc"] . '</div>';
 $sub_array[] = '<div data-column="redTvol">' . $row["redTvol"] . '</div>';
 $sub_array[] = '<div data-column="kindRed">' . $row["kindRed"] . '</div>';
 $sub_array[] = '<div data-column="redC">' . $row["redC"] . '</div>';
 $sub_array[] = '<div data-column="amountRed">' . $row["amountRed"] . '</div>';
 $sub_array[] = '<div data-column="kindRedAdd1">' . $row["kindRedAdd1"] . '</div>';
 $sub_array[] = '<div data-column="ratioRedAdd1">' . $row["ratioRedAdd1"] . '</div>';
 $sub_array[] = '<div data-column="amountRedAdd1">' . $row["amountRedAdd1"] . '</div>';
 $sub_array[] = '<div data-column="kindRedAdd2">' . $row["kindRedAdd2"] . '</div>';
 $sub_array[] = '<div data-column="ratioRedAdd2">' . $row["ratioRedAdd2"] . '</div>';
 $sub_array[] = '<div data-column="amountRedAdd2">' . $row["amountRedAdd2"] . '</div>';
 $sub_array[] = '<div data-column="redTemp">' . $row["redTemp"] . '</div>';
 $sub_array[] = '<div data-column="redRpm">' . $row["redRpm"] . '</div>';
 $sub_array[] = '<div data-column="ratioReactionNaOH">' . $row["ratioReactionNaOH"] . '</div>';
 $sub_array[] = '<div data-column="redEtc">' . $row["redEtc"] . '</div>';
 $sub_array[] = '<div data-column="reactionTemp">' . $row["reactionTemp"] . '</div>';
 $sub_array[] = '<div data-column="reactionpH">' . $row["reactionpH"] . '</div>';
 $sub_array[] = '<div data-column="maker">' . $row["maker"] . '</div>';
 $sub_array[] = '<div data-column="d10">' . sprintf("%.2f",$row["d10"]) . '</div>';
 $sub_array[] = '<div data-column="d50">' . sprintf("%.2f",$row["d50"]) . '</div>';
 $sub_array[] = '<div data-column="d90">' . sprintf("%.2f",$row["d90"]) . '</div>';
 $sub_array[] = '<div data-column="dmax">' . sprintf("%.2f",$row["dmax"]) . '</div>';
 $sub_array[] = '<div data-column="tIgl">' . sprintf("%.3f",$row["tIgl"]) . '</div>';
 $sub_array[] = '<div data-column="pIgl">' . sprintf("%.3f",$row["pIgl"]) . '</div>';
 $sub_array[] = '<div data-column="cIgl">' . sprintf("%.3f",$row["cIgl"]) . '</div>';
 $sub_array[] = '<div data-column="dtaPeak">' . sprintf("%.2f",$row["dtaPeak"]) . '</div>';
 $sub_array[] = '<div data-column="enthalphy">' . sprintf("%.2f",$row["enthalphy"]) . '</div>';
 $sub_array[] = '<div data-column="bet">' . sprintf("%.2f",$row["bet"]) . '</div>';
 $sub_array[] = '<div data-column="td">' . sprintf("%.1f",$row["td"]) . '</div>';
 $sub_array[] = '<div data-column="xrd">' . $row["xrd"] . '</div>';
 $sub_array[] = '<div data-column="pcu">' . $row["pcu"] . '</div>';
 $sub_array[] = '<div data-column="na">' . $row["na"] . '</div>';
 $sub_array[] = '<div data-column="etc">' . $row["etc"] . '</div>';

 
 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM analysispwreaction_view";
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
