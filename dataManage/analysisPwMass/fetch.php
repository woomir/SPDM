
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('lotNo', 'classPost', 'sizeSem', 'stdSem', 'd10', 'd50', 'd90', 'dmax',
'ncIgl', 'qcIgl', 'tIgl', 'pIgl', 'cIgl', 'dtaPeak', 'enthalphy', 'bet', 'td', 'xrd', 'pcuR', 'pcuNc', 'na', 'etc');
$query = "SELECT * FROM analysispwmasstbl";



if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE lotNo LIKE "%'.$_POST["search"]["value"].'%"
 OR classPost LIKE "%'.$_POST["search"]["value"].'%"
 OR sizeSem LIKE "%'.$_POST["search"]["value"].'%"
 OR stdSem LIKE "%'.$_POST["search"]["value"].'%"
 OR d10 LIKE "%'.$_POST["search"]["value"].'%"
 OR d50 LIKE "%'.$_POST["search"]["value"].'%"
 OR d90 LIKE "%'.$_POST["search"]["value"].'%"
 OR dmax LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="lotNo">' . $row["lotNo"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="classPost">' . $row["classPost"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="sizeSem">' . $row["sizeSem"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="stdSem">' . $row["stdSem"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="d10">' . $row["d10"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="d50">' . $row["d50"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="d90">' . $row["d90"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="dmax">' . $row["dmax"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="ncIgl">' . $row["ncIgl"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="qcIgl">' . $row["qcIgl"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="tIgl">' . $row["tIgl"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pIgl">' . $row["pIgl"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="cIgl">' . $row["cIgl"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="dtaPeak">' . $row["dtaPeak"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="enthalphy">' . $row["enthalphy"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="bet">' . $row["bet"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="td">' . $row["td"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="xrd">' . $row["xrd"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pcuR">' . $row["pcuR"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="pcuNc">' . $row["pcuNc"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="na">' . $row["na"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="etc">' . $row["etc"] . '</div>';
 $sub_array[] = '<div align="center"><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-sm edit_data"/>
                <input type="button" name="delete" value="Delete" id="'.$row["id"] .'" class="btn btn-sm btn-danger btn_delete" /></div>';
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