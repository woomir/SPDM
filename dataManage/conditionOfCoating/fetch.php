
<?php
session_start();
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('sampleNo', 'concept', 'dateMake', 'ncpwLot', 'amountPw',
'conditionWash', 'nameRed', 'ratioRed', 'amountRed', 'lotRed', 'nameAmine', 'amountAmine',
'nameLubricant1', 'ratioLubricant1', 'amountLubricant1', 'nameLubricant2', 'ratioLubricant2',
'amountLubricant2', 'ratioSA', 'ratioPA', 'amountSA', 'amountPA', 'nameSolLubri', 'amountSolLubri', 'tempSolLubri',
'nameSolPw', 'amountSolPw', 'orderAdd', 'tempCoating', 'rpmPw', 'timePw',
'rpmRed', 'timeRed', 'rpmAmine', 'timeAmine', 'rpmCoating', 'timeCoating1',
'timeCoating2', 'conductivityAfterPw', 'tempAfterPw', 'pHBeforeCoating',
'maker', 'etc');
$query = "SELECT * FROM conditioncoatingtbl";



if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE sampleNo LIKE "%'.$_POST["search"]["value"].'%"
 OR concept LIKE "%'.$_POST["search"]["value"].'%"
 OR dateMake LIKE "%'.$_POST["search"]["value"].'%"
 OR ncpwLot LIKE "%'.$_POST["search"]["value"].'%"
 OR amountPw LIKE "%'.$_POST["search"]["value"].'%"
 OR conditionWash LIKE "%'.$_POST["search"]["value"].'%"
 OR nameRed LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioRed LIKE "%'.$_POST["search"]["value"].'%"
 OR lotRed LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAmine LIKE "%'.$_POST["search"]["value"].'%"
 OR amountAmine LIKE "%'.$_POST["search"]["value"].'%"
 OR nameLubricant1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioLubricant1 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameLubricant2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioLubricant2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioSA LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioPA LIKE "%'.$_POST["search"]["value"].'%"
 OR nameSolLubri LIKE "%'.$_POST["search"]["value"].'%"
 OR amountSolLubri LIKE "%'.$_POST["search"]["value"].'%"
 OR tempSolLubri LIKE "%'.$_POST["search"]["value"].'%"
 OR nameSolPw LIKE "%'.$_POST["search"]["value"].'%"
 OR amountSolPw LIKE "%'.$_POST["search"]["value"].'%"
 OR orderAdd LIKE "%'.$_POST["search"]["value"].'%"
 OR tempCoating LIKE "%'.$_POST["search"]["value"].'%"
 OR rpmPw LIKE "%'.$_POST["search"]["value"].'%"
 OR timePw LIKE "%'.$_POST["search"]["value"].'%"
 OR rpmRed LIKE "%'.$_POST["search"]["value"].'%"
 OR timeRed LIKE "%'.$_POST["search"]["value"].'%"
 OR rpmAmine LIKE "%'.$_POST["search"]["value"].'%"
 OR timeAmine LIKE "%'.$_POST["search"]["value"].'%"
 OR rpmCoating LIKE "%'.$_POST["search"]["value"].'%"
 OR timeCoating1 LIKE "%'.$_POST["search"]["value"].'%"
 OR timeCoating2 LIKE "%'.$_POST["search"]["value"].'%"
 OR conductivityAfterPw LIKE "%'.$_POST["search"]["value"].'%"
 OR tempAfterPw LIKE "%'.$_POST["search"]["value"].'%"
 OR pHBeforeCoating LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="sampleNo">' . $row["sampleNo"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="concept">' . $row["concept"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="dateMake">' . $row["dateMake"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ncpwLot">' . $row["ncpwLot"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="amountPw">' . $row["amountPw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="conditionWash">' . $row["conditionWash"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameRed">' . $row["nameRed"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioRed">' . $row["ratioRed"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="amountRed">' . $row["amountRed"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="lotRed">' . $row["lotRed"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameAmine">' . $row["nameAmine"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="amountAmine">' . $row["amountAmine"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameLubricant1">' . $row["nameLubricant1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioLubricant1">' . $row["ratioLubricant1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioLubricant1">' . $row["amountLubricant1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameLubricant2">' . $row["nameLubricant2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioLubricant2">' . $row["ratioLubricant2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioLubricant1">' . $row["amountLubricant2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioSA">' . $row["ratioSA"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioPA">' . $row["ratioPA"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="amountSA">' . $row["amountSA"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="amountPA">' . $row["amountPA"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameSolLubri">' . $row["nameSolLubri"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="amountSolLubri">' . $row["amountSolLubri"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="tempSolLubri">' . $row["tempSolLubri"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameSolPw">' . $row["nameSolPw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="amountSolPw">' . $row["amountSolPw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="orderAdd">' . $row["orderAdd"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="tempCoating">' . $row["tempCoating"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpmPw">' . $row["rpmPw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="timePw">' . $row["timePw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpmRed">' . $row["rpmRed"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="timeRed">' . $row["timeRed"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpmAmine">' . $row["rpmAmine"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="timeAmine">' . $row["timeAmine"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpmCoating">' . $row["rpmCoating"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="timeCoating1">' . $row["timeCoating1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="timeCoating2">' . $row["timeCoating2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="conductivityAfterPw">' . $row["conductivityAfterPw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="tempAfterPw">' . $row["tempAfterPw"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pHBeforeCoating">' . $row["pHBeforeCoating"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="maker">' . $row["maker"] . '</div>';
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

$query = "SELECT * FROM conditioncoatingtbl";
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
