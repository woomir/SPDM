
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
'reactionpH', 'reactionTemp', 'infoAgno3_lotNo', 'maker');

$query = "SELECT * FROM reactionpw";



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
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="sampleNo">' . $row["sampleNo"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="object">' . $row["object"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="date">' . $row["date"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="scale">' . $row["scale"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="infoAgno3_lotNo">' . $row["infoAgno3_lotNo"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="agC">' . $row["agC"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="agTvol">' . $row["agTvol"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amEq">' . $row["amEq"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountAm">' . sprintf("%.0f",$row["amountAm"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="kindAdd1">' . $row["kindAdd1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="ratioAdd1">' . $row["ratioAdd1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountAdd1">' . $row["amountAdd1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="kindAdd2">' . $row["kindAdd2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="ratioAdd2">' . $row["ratioAdd2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountAdd2">' . $row["amountAdd2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="kindAdd3">' . $row["kindAdd3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="ratioAdd3">' . $row["ratioAdd3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountAdd3">' . $row["amountAdd3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="kindAdd4">' . $row["kindAdd4"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="ratioAdd4">' . $row["ratioAdd4"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountAdd4">' . $row["amountAdd4"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="agTemp">' . $row["agTemp"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="agRpm">' . $row["agRpm"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="agOrder">' . $row["agOrder"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="agEtc">' . $row["agEtc"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="redTvol">' . $row["redTvol"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="kindRed">' . $row["kindRed"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="redC">' . $row["redC"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountRed">' . $row["amountRed"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="kindRedAdd1">' . $row["kindRedAdd1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="ratioRedAdd1">' . $row["ratioRedAdd1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountRedAdd1">' . $row["amountRedAdd1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="kindRedAdd2">' . $row["kindRedAdd2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="ratioRedAdd2">' . $row["ratioRedAdd2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountRedAdd2">' . $row["amountRedAdd2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="redTemp">' . $row["redTemp"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="redRpm">' . $row["redRpm"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="ratioReactionNaOH">' . $row["ratioReactionNaOH"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="redEtc">' . $row["redEtc"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="reactionTemp">' . $row["reactionTemp"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="reactionpH">' . $row["reactionpH"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="maker">' . $row["maker"] . '</div>';

 if ($_SESSION['role_id']==1){
 $sub_array[] = '<div align="center"><input type="button" name="edit" value="Edit" id="'.$row["sampleNo"] .'" class="btn btn-info btn-sm edit_data" />
                <input type="button" name="delete" value="Delete" id="'.$row["sampleNo"] .'" class="btn btn-sm btn-danger btn_delete" /></div>';
              } else if ($_SESSION['role_id']==2) {
                $sub_array[] = '<div align="center"><input type="button" name="edit" value="Edit" id="'.$row["sampleNo"] .'" class="btn btn-info btn-sm edit_data" />';
              } else {
                $sub_array[]='';
              }
 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM reactionpw";
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
