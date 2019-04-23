
<?php
session_start();
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('pasteNo', 'powderLot', 'powderType','object', 'recipe',
'timeAging', 'avgRpm1', 'avgRpm10', 'avgRpm30', 'avgRpm100', 'agingRpm10',
'agingRpm30', 'avgLowG', 'avgHighG', 'avgYsp', 'agingLowG', 'agingHighG',
'agingYsp');
$query = "SELECT * FROM analysispt_view";
$query .= " WHERE 1=1 ";


/* if(isset($_POST["search"]["value"]))
{
 $query .= '
 or pasteNo LIKE "%'.$_POST["search"]["value"].'%"
 or powderLot LIKE "%'.$_POST["search"]["value"].'%"
 or powderType LIKE "%'.$_POST["search"]["value"].'%"
 or object LIKE "%'.$_POST["search"]["value"].'%"
 or recipe LIKE "%'.$_POST["search"]["value"].'%"
 or timeAging LIKE "%'.$_POST["search"]["value"].'%"
 or avgRpm1 LIKE "%'.$_POST["search"]["value"].'%"
 or avgRpm10 LIKE "%'.$_POST["search"]["value"].'%"
 or avgRpm30 LIKE "%'.$_POST["search"]["value"].'%"
 or avgRpm100 LIKE "%'.$_POST["search"]["value"].'%"
 or agingRpm10 LIKE "%'.$_POST["search"]["value"].'%"
 or agingRpm30 LIKE "%'.$_POST["search"]["value"].'%"
 or avgLowG LIKE "%'.$_POST["search"]["value"].'%"
 or avgHighG LIKE "%'.$_POST["search"]["value"].'%"
 or avgYsp LIKE "%'.$_POST["search"]["value"].'%"
 or agingLowG LIKE "%'.$_POST["search"]["value"].'%"
 or agingHighG LIKE "%'.$_POST["search"]["value"].'%"
 or agingYsp LIKE "%'.$_POST["search"]["value"].'%"
 ';
} */

if( !empty($_POST["columns"][0]["search"]["value"]) ){
    $query.='and pasteNo LIKE "%'.$_POST["columns"][0]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][1]["search"]["value"]) ){
    $query.='and powderLot LIKE "%'.$_POST["columns"][1]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][2]["search"]["value"]) ){
    $query.='and powderType LIKE "%'.$_POST["columns"][2]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][3]["search"]["value"]) ){
    $query.='and object LIKE "%'.$_POST["columns"][3]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][4]["search"]["value"]) ){
    $query.='and recipe LIKE "%'.$_POST["columns"][4]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][5]["search"]["value"]) ){
    $query.='and timeAging LIKE "%'.$_POST["columns"][5]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][6]["search"]["value"]) ){
    $query.='and avgRpm1 LIKE "%'.$_POST["columns"][6]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][7]["search"]["value"]) ){
    $query.='and avgRpm10 LIKE "%'.$_POST["columns"][7]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][8]["search"]["value"]) ){
    $query.='and avgRpm30 LIKE "%'.$_POST["columns"][8]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][9]["search"]["value"]) ){
    $query.='and avgRpm100 LIKE "%'.$_POST["columns"][9]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][10]["search"]["value"]) ){
    $query.='and agingRpm10 LIKE "%'.$_POST["columns"][10]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][11]["search"]["value"]) ){
    $query.='and agingRpm30 LIKE "%'.$_POST["columns"][11]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][12]["search"]["value"]) ){
    $query.='and avgLowG LIKE "%'.$_POST["columns"][12]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][13]["search"]["value"]) ){
    $query.='and avgHighG LIKE "%'.$_POST["columns"][13]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][14]["search"]["value"]) ){
    $query.='and avgYsp LIKE "%'.$_POST["columns"][14]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][15]["search"]["value"]) ){
    $query.='and agingLowG LIKE "%'.$_POST["columns"][15]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][16]["search"]["value"]) ){
    $query.='and agingHighG LIKE "%'.$_POST["columns"][16]["search"]["value"].'%"';
}
if( !empty($_POST["columns"][17]["search"]["value"]) ){
    $query.='and agingYsp LIKE "%'.$_POST["columns"][17]["search"]["value"].'%"';
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
 $sub_array[] = $row["pasteNo"];
 $sub_array[] = $row["powderLot"];
 $sub_array[] = $row["powderType"];
 $sub_array[] = $row["object"];
 $sub_array[] = $row["recipe"];
 $sub_array[] = $row["timeAging"];
 $sub_array[] = $row["avgRpm1"];
 $sub_array[] = $row["avgRpm10"];
 $sub_array[] = $row["avgRpm30"];
 $sub_array[] = $row["avgRpm100"];
 $sub_array[] = $row["agingRpm10"];
 $sub_array[] = $row["agingRpm30"];
 $sub_array[] = $row["avgLowG"];
 $sub_array[] = $row["avgHighG"];
 $sub_array[] = $row["avgYsp"];
 $sub_array[] = $row["agingLowG"];
 $sub_array[] = $row["agingHighG"];
 $sub_array[] = $row["agingYsp"];

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
