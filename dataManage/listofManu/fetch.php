
<?php
session_start();
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('pasteNo', 'powderLot', 'powderType', 'dateMake', 'maker',
'object', 'amount', 'recipe', 'etc');
$query = "SELECT * FROM makelistpastetbl";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE pasteNo LIKE "%'.$_POST["search"]["value"].'%"
 OR powderLot LIKE "%'.$_POST["search"]["value"].'%"
 OR powderType LIKE "%'.$_POST["search"]["value"].'%"
 OR maker LIKE "%'.$_POST["search"]["value"].'%"
 OR object LIKE "%'.$_POST["search"]["value"].'%"
 OR amount LIKE "%'.$_POST["search"]["value"].'%"
 OR recipe LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pasteNo">' . $row["pasteNo"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="powderLot">' . $row["powderLot"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="powderType">' . $row["powderType"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="dateMake">' . $row["dateMake"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="maker">' . $row["maker"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="object">' . $row["object"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="amount">' . $row["amount"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="recipe">' . $row["recipe"] . '</div>';
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

$query = "SELECT * FROM makelistpastetbl";
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
