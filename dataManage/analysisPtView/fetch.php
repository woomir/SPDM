
<?php
session_start();
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('pasteNo', 'powderLot', 'powderType','object', 'recipe',
'timeAging', 'avgRpm1', 'avgRpm10', 'avgRpm30', 'avgRpm100', 'agingRpm10',
'agingRpm30', 'avgLowG', 'avgHighG', 'avgYsp', 'agingLowG', 'agingHighG',
'agingYsp');
$query = "SELECT * FROM analysispt_view";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE pasteNo LIKE "%'.$_POST["search"]["value"].'%"
 OR powderLot LIKE "%'.$_POST["search"]["value"].'%"
 OR powderType LIKE "%'.$_POST["search"]["value"].'%"
 OR object LIKE "%'.$_POST["search"]["value"].'%"
 OR recipe LIKE "%'.$_POST["search"]["value"].'%"
 OR timeAging LIKE "%'.$_POST["search"]["value"].'%"
 OR avgRpm1 LIKE "%'.$_POST["search"]["value"].'%"
 OR avgRpm10 LIKE "%'.$_POST["search"]["value"].'%"
 OR avgRpm30 LIKE "%'.$_POST["search"]["value"].'%"
 OR avgRpm100 LIKE "%'.$_POST["search"]["value"].'%"
 OR agingRpm10 LIKE "%'.$_POST["search"]["value"].'%"
 OR agingRpm30 LIKE "%'.$_POST["search"]["value"].'%"
 OR avgLowG LIKE "%'.$_POST["search"]["value"].'%"
 OR avgHighG LIKE "%'.$_POST["search"]["value"].'%"
 OR avgYsp LIKE "%'.$_POST["search"]["value"].'%"
 OR agingLowG LIKE "%'.$_POST["search"]["value"].'%"
 OR agingHighG LIKE "%'.$_POST["search"]["value"].'%"
 OR agingYsp LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-column="pasteNo">' . $row["pasteNo"] . '</div>';
 $sub_array[] = '<div data-column="powderLot">' . $row["powderLot"] . '</div>';
 $sub_array[] = '<div data-column="powderType">' . $row["powderType"] . '</div>';
 $sub_array[] = '<div data-column="object">' . $row["object"] . '</div>';
 $sub_array[] = '<div data-column="recipe">' . $row["recipe"] . '</div>';
 $sub_array[] = '<div data-column="timeAging">' . $row["timeAging"] . '</div>';
 $sub_array[] = '<div data-column="avgRpm1">' . $row["avgRpm1"] . '</div>';
 $sub_array[] = '<div data-column="avgRpm10">' . $row["avgRpm10"] . '</div>';
 $sub_array[] = '<div data-column="avgRpm30">' . $row["avgRpm30"] . '</div>';
 $sub_array[] = '<div data-column="avgRpm100">' . $row["avgRpm100"] . '</div>';
 $sub_array[] = '<div data-column="agingRpm10">' . $row["agingRpm10"] . '</div>';
 $sub_array[] = '<div data-column="agingRpm30">' . $row["agingRpm30"] . '</div>';
 $sub_array[] = '<div data-column="avgLowG">' . $row["avgLowG"] . '</div>';
 $sub_array[] = '<div data-column="avgHighG">' . $row["avgHighG"] . '</div>';
 $sub_array[] = '<div data-column="avgYsp">' . $row["avgYsp"] . '</div>';
 $sub_array[] = '<div data-column="agingLowG">' . $row["agingLowG"] . '</div>';
 $sub_array[] = '<div data-column="agingHighG">' . $row["agingHighG"] . '</div>';
 $sub_array[] = '<div data-column="agingYsp">' . $row["agingYsp"] . '</div>';

 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM analysispt_view";
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
