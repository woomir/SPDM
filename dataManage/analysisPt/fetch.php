
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
$column = array('','sampleNo', 'd10', 'd50', 'd90', 'dmax', 'totalIgl',
'excessIgl', 'coatingIgl', 'dtaPeak', 'enthalphy', 'bet', 'td', 'xrd');

$query = "SELECT * FROM analysispwtbl";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE sampleNo LIKE "%'.$_POST["search"]["value"].'%"
 OR d10 LIKE "%'.$_POST["search"]["value"].'%"
 OR d50 LIKE "%'.$_POST["search"]["value"].'%"
 OR d90 LIKE "%'.$_POST["search"]["value"].'%"
 OR dmax LIKE "%'.$_POST["search"]["value"].'%"
 OR totalIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR excessIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR coatingIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR dtaPeak LIKE "%'.$_POST["search"]["value"].'%"
 OR enthalphy LIKE "%'.$_POST["search"]["value"].'%"
 OR bet LIKE "%'.$_POST["search"]["value"].'%"
 OR td LIKE "%'.$_POST["search"]["value"].'%"
 OR xrd LIKE "%'.$_POST["search"]["value"].'%"';
}

if(isset($_POST['order']))
{
 $query .= ' ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'';
}
else
{
 $query .= ' ORDER BY sampleNo DESC ';
}

$query1 = '';
//var_dump($_POST);
if($_POST["length"] != -1)
{
$query1 = ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<input type="checkbox" value="'.$row["sampleNo"].'"name="check[]" id="delete" data-column="check" class="check">';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="sampleNo">' . $row["sampleNo"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="d10">' . $row["d10"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="d50">' . $row["d50"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="d90">' . $row["d90"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="dmax">' . $row["dmax"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="totalIgl">' . $row["totalIgl"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="excessIgl">' . $row["excessIgl"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="coatingIgl">' . $row["coatingIgl"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="dtaPeak">' . $row["dtaPeak"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="enthalphy">' . $row["enthalphy"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="bet">' . $row["bet"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="td">' . $row["td"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["sampleNo"].'" data-column="xrd">' . $row["xrd"] . '</div>';
 $data[] = $sub_array;
}
//$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-sm delete" id="'.$row["id"].'">Delete</button>';
function get_all_data($connect)
{

$query = "SELECT * FROM analysispwtbl";
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
