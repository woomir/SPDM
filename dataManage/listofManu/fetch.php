
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
$column = array('', 'id', 'lotPw', 'makerPaste', 'dateMake', 'recipePaste', 'amountPaste',	'objectMakePaste',	'etcPaste');
//$table = $_SESSION['database'];
//$a = inplode(" ",$table);
$query = "SELECT * FROM makelistpastetbl";


//$get = $_POST["datdabase"];
//$query = 'SELECT * FROM '.$get;

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE id LIKE "%'.$_POST["search"]["value"].'%"
 OR lotPw LIKE "%'.$_POST["search"]["value"].'%"
 OR makerPaste LIKE "%'.$_POST["search"]["value"].'%"
 OR dateMake LIKE "%'.$_POST["search"]["value"].'%"
 OR recipePaste LIKE "%'.$_POST["search"]["value"].'%"
 OR amountPaste LIKE "%'.$_POST["search"]["value"].'%"
 OR objectMakePaste LIKE "%'.$_POST["search"]["value"].'%"
 OR etcPaste LIKE "%'.$_POST["search"]["value"].'%"
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
//var_dump($_POST['columns']);
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
 $sub_array[] = '<input type="checkbox" value="'.$row["id"].'"name="check[]" id="delete" data-column="check" class="check">';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="lotPw">' . $row["lotPw"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="makerPaste">' . $row["makerPaste"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="dateMake">' . $row["dateMake"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="recipePaste">' . $row["recipePaste"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="amountPaste">' . $row["amountPaste"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="objectMakePaste">' . $row["objectMakePaste"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="etcPaste">' . $row["etcPaste"] . '</div>';
 $data[] = $sub_array;
}
//$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-sm delete" id="'.$row["id"].'">Delete</button>';
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
