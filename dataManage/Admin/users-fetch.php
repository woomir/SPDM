
<?php
session_start();
//fetch.php
$connect = mysqli_connect("localhost", "root", "$52Telecast", "woomir");
$column = array('id', 'username', 'role_id', 'email', 'created');
$query = "SELECT * FROM users";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE id LIKE "%'.$_POST["search"]["value"].'%"
 OR username LIKE "%'.$_POST["search"]["value"].'%"
 OR role_id LIKE "%'.$_POST["search"]["value"].'%"
 OR email LIKE "%'.$_POST["search"]["value"].'%"
 OR created LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="username">' . $row["username"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="role_id">' . $row["role_id"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="email">' . $row["email"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["id"].'" data-column="created">' . $row["created"] . '</div>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{

$query = "SELECT * FROM users";
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
