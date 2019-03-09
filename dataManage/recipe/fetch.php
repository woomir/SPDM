
<?php
session_start();
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('nameRecipe', 'nameBinder1', 'ratioBinder1', 'nameBinder2', 'ratioBinder2',
'nameBinder3', 'ratioBinder3', 'nameSolvent1', 'ratioSolvent1', 'nameSolvent2',
'ratioSolvent2', 'nameSolvent3', 'ratioSolvent3', 'nameSolvent4', 'ratioSolvent4',
'nameAdd1', 'ratioAdd1', 'nameAdd2', 'ratioAdd2', 'nameAdd3', 'ratioAdd3',
'nameAdd4', 'ratioAdd4', 'nameAdd5', 'ratioAdd5', 'nameAdd6', 'ratioAdd6',
'nameGF1', 'ratioGF1', 'nameGF2', 'ratioGF2', 'ratioPw', 'etc');
$query = "SELECT * FROM recipetbl";



if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE nameRecipe LIKE "%'.$_POST["search"]["value"].'%"
 OR nameBinder1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioBinder1 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameBinder2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioBinder2 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameBinder3 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioBinder3 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameSolvent1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioSolvent1 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameSolvent2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioSolvent2 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameSolvent3 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioSolvent3 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameSolvent4 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioSolvent4 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAdd1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd1 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAdd2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd2 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAdd3 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd3 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAdd4 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd4 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAdd5 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd5 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameAdd6 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioAdd6 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameGF1 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioGF1 LIKE "%'.$_POST["search"]["value"].'%"
 OR nameGF2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioGF2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ratioPw LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameRecipe">' . $row["nameRecipe"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameBinder1">' . $row["nameBinder1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioBinder1">' . $row["ratioBinder1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameBinder2">' . $row["nameBinder2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioBinder2">' . $row["ratioBinder2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameBinder3">' . $row["nameBinder3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioBinder3">' . $row["ratioBinder3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameSolvent1">' . $row["nameSolvent1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioSolvent1">' . $row["ratioSolvent1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameSolvent2">' . $row["nameSolvent2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioSolvent2">' . $row["ratioSolvent2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameSolvent3">' . $row["nameSolvent3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioSolvent3">' . $row["ratioSolvent3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameSolvent4">' . $row["nameSolvent4"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioSolvent4">' . $row["ratioSolvent4"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameAdd1">' . $row["nameAdd1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioAdd1">' . $row["ratioAdd1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameAdd2">' . $row["nameAdd2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioAdd2">' . $row["ratioAdd2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameAdd3">' . $row["nameAdd3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioAdd3">' . $row["ratioAdd3"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameAdd4">' . $row["nameAdd4"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioAdd4">' . $row["ratioAdd4"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameAdd5">' . $row["nameAdd5"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioAdd5">' . $row["ratioAdd5"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameAdd6">' . $row["nameAdd6"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioAdd6">' . $row["ratioAdd6"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameGF1">' . $row["nameGF1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioGF1">' . $row["ratioGF1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="nameGF2">' . $row["nameGF2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioGF2">' . $row["ratioGF2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ratioPw">' . $row["ratioPw"] . '</div>';
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

$query = "SELECT * FROM recipetbl";
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
