
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
$column = array('', 'pasteNo', 'powderLot', 'powderType', 'dateMake', 'maker',
'object', 'amount', 'recipe', 'etc');
$query = "SELECT * FROM makelistpastetbl";



if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE pasteNo LIKE "%'.$_POST["search"]["value"].'%"
 OR powderLot LIKE "%'.$_POST["search"]["value"].'%"
 OR powderType LIKE "%'.$_POST["search"]["value"].'%"
 OR dateMake LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<input type="checkbox" value="'.$row["pasteNo"].'"name="check[]" id="delete" data-column="check" class="check">';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="pasteNo">' . $row["pasteNo"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="powderLot">' . $row["powderLot"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="powderType">' . $row["powderType"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="dateMake">' . $row["dateMake"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="maker">' . $row["maker"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="object">' . $row["object"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="amount">' . $row["amount"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="recipe">' . $row["recipe"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["pasteNo"].'" data-column="etc">' . $row["etc"] . '</div>';
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
