
<?php
session_start();
//fetch.php
include '../db.php';

$column = array('lotNo', 'nameProduct', 'characteristic', 'makeDate', 'nameLubricant1',
'ratioLubricant1', 'nameLubricant2', 'ratioLubricant2', 'ratioSAPA', 'tempCoating',
'rateAddJet', 'pressureJet', 'yieldJet', 'yieldSmall', 'yieldBig', 'etc');
$query = "SELECT * FROM makepwmasstbl";

$query .= " WHERE ";

if(isset($_POST["is_massPwType"]))
{
 $query .= "nameProduct = '".$_POST["is_massPwType"]."' AND ";
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
 (lotNo LIKE "%'.$_POST["search"]["value"].'%"
 OR nameProduct LIKE "%'.$_POST["search"]["value"].'%"
 OR characteristic LIKE "%'.$_POST["search"]["value"].'%"
 OR makeDate LIKE "%'.$_POST["search"]["value"].'%"
 OR nameLubricant1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioLubricant1 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameLubricant2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioLubricant2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioSAPA LIKE "%'.$_POST["search"]["value"].'%"
 OR tempCoating LIKE "%'.$_POST["search"]["value"].'%"
 OR rateAddJet LIKE "%'.$_POST["search"]["value"].'%"
 OR pressureJet LIKE "%'.$_POST["search"]["value"].'%"
 OR yieldJet LIKE "%'.$_POST["search"]["value"].'%"
 OR yieldSmall LIKE "%'.$_POST["search"]["value"].'%"
 OR yieldBig LIKE "%'.$_POST["search"]["value"].'%"
 OR etc LIKE "%'.$_POST["search"]["value"].'%")
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
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="lotNo">' . $row["lotNo"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameProduct">' . $row["nameProduct"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="characteristic">' . $row["characteristic"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="makeDate">' . $row["makeDate"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameLubricant1">' . $row["nameLubricant1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioLubricant1">' . $row["ratioLubricant1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameLubricant2">' . $row["nameLubricant2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioLubricant2">' . $row["ratioLubricant2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioSAPA">' . $row["ratioSAPA"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="tempCoating">' . $row["tempCoating"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rateAddJet">' . $row["rateAddJet"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pressureJet">' . $row["pressureJet"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="yieldJet">' . $row["yieldJet"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="yieldSmall">' . $row["yieldSmall"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="yieldBig">' . $row["yieldBig"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="etc">' . $row["etc"] . '</div>';
 if ($_SESSION['role_id']==1){
 $sub_array[] = '<div align="center"><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-sm edit_data" />
                <input type="button" name="delete" value="Delete" id="'.$row["id"] .'" class="btn btn-sm btn-danger btn_delete" /></div>';
              } else if ($_SESSION['role_id']==2) {
                $sub_array[] = '<div align="center"><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-sm edit_data" />';
              } else {
                $sub_array[]='';
              }
 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM makepwmasstbl";
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
