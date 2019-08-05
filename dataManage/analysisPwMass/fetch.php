
<?php
session_start();
//fetch.php
include '../db.php';

$column = array('lotNo', 'classPost', 'sizeSem', 'stdSem', 'd10', 'd50', 'd90', 'dmax','cohesion',
'ncIgl', 'qcIgl', 'tIgl', 'pIgl', 'cIgl', 'dtaPeak', 'enthalphy', 'bet', 'td', 'xrd', 'pcuR', 'pcuNc', 'na', 'phos', 'etc');
$query = "SELECT * FROM analysispwmasstbl";

$query .= " WHERE ";

if(isset($_POST["is_massPwType"]))
{
  if($_POST["is_massPwType"] !== "Etc"){
 $query .= "classPost = '".$_POST["is_massPwType"]."' AND ";
}else{
  $query .= " NOT classPost IN ('R', 'NC', 'JET', 'CL') AND ";
}
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
 (lotNo LIKE "%'.$_POST["search"]["value"].'%"
 OR sizeSem LIKE "%'.$_POST["search"]["value"].'%"
 OR stdSem LIKE "%'.$_POST["search"]["value"].'%"
 OR d10 LIKE "%'.$_POST["search"]["value"].'%"
 OR d50 LIKE "%'.$_POST["search"]["value"].'%"
 OR d90 LIKE "%'.$_POST["search"]["value"].'%"
 OR dmax LIKE "%'.$_POST["search"]["value"].'%"
 OR cohesion LIKE "%'.$_POST["search"]["value"].'%"
 OR ncIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR qcIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR tIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR pIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR cIgl LIKE "%'.$_POST["search"]["value"].'%"
 OR dtaPeak LIKE "%'.$_POST["search"]["value"].'%"
 OR enthalphy LIKE "%'.$_POST["search"]["value"].'%"
 OR bet LIKE "%'.$_POST["search"]["value"].'%"
 OR td LIKE "%'.$_POST["search"]["value"].'%"
 OR xrd LIKE "%'.$_POST["search"]["value"].'%"
 OR pcuR LIKE "%'.$_POST["search"]["value"].'%"
 OR pcuNc LIKE "%'.$_POST["search"]["value"].'%"
 OR na LIKE "%'.$_POST["search"]["value"].'%"
 OR phos LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="classPost">' . $row["classPost"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="sizeSem">' . sprintf("%.2f",$row["sizeSem"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="stdSem">' . sprintf("%.2f",$row["stdSem"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="d10">' . sprintf("%.2f",$row["d10"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="d50">' . sprintf("%.2f",$row["d50"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="d90">' . sprintf("%.2f",$row["d90"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="dmax">' . sprintf("%.2f",$row["dmax"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="cohesion">' . $row["cohesion"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ncIgl">' . sprintf("%.2f",$row["ncIgl"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="qcIgl">' . sprintf("%.2f",$row["qcIgl"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="tIgl">' . sprintf("%.3f",$row["tIgl"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pIgl">' . sprintf("%.3f",$row["pIgl"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="cIgl">' . sprintf("%.3f",$row["cIgl"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="dtaPeak">' . sprintf("%.1f",$row["dtaPeak"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="enthalphy">' . sprintf("%.1f",$row["enthalphy"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="bet">' . sprintf("%.2f",$row["bet"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="td">' . sprintf("%.2f",$row["td"]) . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="xrd">' . $row["xrd"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pcuR">' . $row["pcuR"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pcuNc">' . $row["pcuNc"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="na">' . $row["na"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="phos">' . $row["phos"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="etc">' . $row["etc"] . '</div>';
 
 if ($_SESSION['role_id']==1){
  $sub_array[] = '<div align="center">
                  <input type="button" name="file" value="File" id="'.$row["id"] .'" class="btn btn-sm btn-secondary btn_file"/>
                  <input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-sm edit_data" />
                  <input type="button" name="delete" value="Delete" id="'.$row["id"] .'" class="btn btn-sm btn-danger btn_delete" /></div>';
              } else if ($_SESSION['role_id']==2) {
                $sub_array[] = '<div align="center">
                <input type="button" name="file" value="File" id="'.$row["id"] .'" class="btn btn-sm btn-secondary btn_file" />
                <input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-sm edit_data" /></div>';
              } else if ($_SESSION['role_id']==3) {
                $sub_array[] = '<div align="center">
                <input type="button" name="file" value="File" id="'.$row["id"] .'" class="btn btn-sm btn-secondary btn_file" /></div>';
              } else {
                $sub_array[]='';
              }

 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM analysispwmasstbl";
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
