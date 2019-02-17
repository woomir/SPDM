<?php

 $connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
 $sql = "DELETE FROM makelistpastetbl WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $sql))
 {
   //header("location:/Project/SPDM/database/listofManu2.php");
      $message = 'Data Deleted';
      $output = '';
      $output .= '<label class="text-success">' . $message . '</label>';
      $select_query = "SELECT * FROM makelistpastetbl ORDER BY datemake DESC";
      $result = mysqli_query($connect, $select_query);
      $output .= '
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
              <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" />
              <input type="button" name="delete" value="Delete" id="'.$row["id"] .'" class="btn btn-xs btn-danger btn_delete" />
              </td>
         </tr>
           ';
      }
      $output .= '</table>';

 }
echo $output;
 ?>
