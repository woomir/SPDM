<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM makelistpastetbl
  WHERE pasteNo LIKE '%".$search."%'
  OR powderLot LIKE '%".$search."%'
  OR powderType LIKE '%".$search."%'
  OR dateMake LIKE '%".$search."%'
  OR maker LIKE '%".$search."%'
  OR object LIKE '%".$search."%'
  OR amount LIKE '%".$search."%'
  OR recipe LIKE '%".$search."%'
  OR etc LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM makelistpastetbl ORDER BY dateMake
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover">
   <tr>
     <th width="8%">Paste No</th>
     <th width="10%">Powder Lot</th>
     <th width="7%">Powder type</th>
     <th width="10%">제조 일자</th>
     <th width="7%">작업자</th>
     <th>제조 목적</th>
     <th width="7%">제조량 (g)</th>
     <th width="7%">배합명</th>
     <th>비고</th>
     <th width="15%">Edit</th>
  </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
     <td>' . $row["pasteNo"] . '</td>
     <td>' . $row["powderLot"] . '</td>
     <td>' . $row["powderType"] . '</td>
     <td>' . $row["dateMake"] . '</td>
     <td>' . $row["maker"] . '</td>
     <td>' . $row["object"] . '</td>
     <td>' . $row["amount"] . '</td>
     <td>' . $row["recipe"] . '</td>
     <td>' . $row["etc"] . '</td>
     <td> <input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" />
     <input type="button" name="delete" value="Delete" id="'.$row["id"] .'" class="btn btn-xs btn-danger btn_delete" />
     </td>
  </tr>
  ';
 }
 echo $output;
 var_dump($_POST);
}
else
{
 echo 'Data Not Found';
}

?>
