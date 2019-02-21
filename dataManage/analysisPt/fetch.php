
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
$column = array('pasteNo', 'timeAging', 'tempAging', 'preCon', 'dateAnalysis',
'analyzer', 'rpm1', 'rpm10', 'rpm30', 'rpm100', 'rpm1_2', 'rpm10_2', 'rpm30_2',
'rpm100_2', 'lowG', 'highG', 'ysp', 'lowG2', 'highG2', 'ysp2', 'etc');
$query = "SELECT * FROM analysispttbl";



if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE pasteNo LIKE "%'.$_POST["search"]["value"].'%"
 OR timeAging LIKE "%'.$_POST["search"]["value"].'%"
 OR tempAging LIKE "%'.$_POST["search"]["value"].'%"
 OR preCon LIKE "%'.$_POST["search"]["value"].'%"
 OR dateAnalysis LIKE "%'.$_POST["search"]["value"].'%"
 OR analyzer LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm1 LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm10 LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm30 LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm100 LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm1_2 LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm10_2 LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm30_2 LIKE "%'.$_POST["search"]["value"].'%"
 OR rpm100_2 LIKE "%'.$_POST["search"]["value"].'%"
 OR lowG LIKE "%'.$_POST["search"]["value"].'%"
 OR highG LIKE "%'.$_POST["search"]["value"].'%"
 OR ysp LIKE "%'.$_POST["search"]["value"].'%"
 OR lowG2 LIKE "%'.$_POST["search"]["value"].'%"
 OR highG2 LIKE "%'.$_POST["search"]["value"].'%"
 OR ysp2 LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="timeAging">' . $row["timeAging"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="tempAging">' . $row["tempAging"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="preCon">' . $row["preCon"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="dateAnalysis">' . $row["dateAnalysis"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="analyzer">' . $row["analyzer"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpm1">' . $row["rpm1"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpm10">' . $row["rpm10"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpm30">' . $row["rpm30"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpm100">' . $row["rpm100"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpm1_2">' . $row["rpm1_2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpm10_2">' . $row["rpm10_2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpm30_2">' . $row["rpm30_2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="rpm100_2">' . $row["rpm100_2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="lowG">' . $row["lowG"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="highG">' . $row["highG"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ysp">' . $row["ysp"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="lowG2">' . $row["lowG2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="highG2">' . $row["highG2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ysp2">' . $row["ysp2"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="etc">' . $row["etc"] . '</div>';
 $sub_array[] = '<div><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-sm edit_data" />
                <input type="button" name="delete" value="Delete" id="'.$row["id"] .'" class="btn btn-sm btn-danger btn_delete" /></div>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM analysispttbl";
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
