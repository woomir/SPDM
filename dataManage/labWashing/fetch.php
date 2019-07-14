
<?php
session_start();
//fetch.php
include '../db.php';

$column = array('sampleNo', 'concept', 'dateWashing', 'pwLot', 'amountDMW', 'amountPw',
'kindsWash', 'ratioWash', 'amountWash', 'temp', 'orderAdd', 'rpm', 'timeDissol', 'timePw',
'maker', 'etc');
$query = "SELECT * FROM washtbl";



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
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="sampleNo">' . $row["sampleNo"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="concept">' . $row["concept"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="dateWashing">' . $row["dateWashing"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="pwLot">' . $row["pwLot"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountDMW">' . $row["amountDMW"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountPw">' . $row["amountPw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="kindsWash">' . $row["kindsWash"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="ratioWash">' . $row["ratioWash"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="amountWash">' . $row["amountWash"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="temp">' . $row["temp"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="orderAdd">' . $row["orderAdd"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="rpm">' . $row["rpm"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="timeDissol">' . $row["timeDissol"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="timePw">' . $row["timePw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="maker">' . $row["maker"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["sampleNo"].'" data-column="etc">' . $row["etc"] . '</div>';
 
 if ($_SESSION['role_id']==1){
  $sub_array[] = '<div align="center">
                  <input type="button" name="edit" value="Edit" id="'.$row["sampleNo"] .'" class="btn btn-info btn-sm edit_data" />
                  <input type="button" name="delete" value="Delete" id="'.$row["sampleNo"] .'" class="btn btn-sm btn-danger btn_delete" /></div>';
              } else if ($_SESSION['role_id']==2) {
                $sub_array[] = '<div align="center">
                <input type="button" name="edit" value="Edit" id="'.$row["sampleNo"] .'" class="btn btn-info btn-sm edit_data" /></div>';
              } else {
                $sub_array[]='';
              }

 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM washtbl";
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
