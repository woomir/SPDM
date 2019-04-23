<?php session_start();
require_once('../lib/top.php');
if(isset($_SESSION['id']) && isset($_SESSION['password'])){
   settype($_SESSION['role_id'],'int');
   require_once('../lib/menu.php');
?>

<div class="table-responsive">
  <div id="alert_message"></div>
 <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
  <thead align="center">
   <tr>
     <th>Paste No</th>
     <th>Powder Lot</th>
     <th>Powder Type</th>
     <th>object</th>
     <th>배합</th>
     <th>Aging Time</th>
     <th>1rpm</th>
     <th>10rpm</th>
     <th>30rpm</th>
     <th>100rpm</th>
     <th>Aging 10rpm</th>
     <th>Aging 30rpm</th>
     <th>G' Low</th>
     <th>G' High</th>
     <th>YSP</th>
     <th>Aging G' Low</th>
     <th>Aging G' High</th>
     <th>Aging YSP</th>
    </tr>
   </thead>
   <thead>
     <tr>
       <td><input type="text" data-column="0" class="search-input"></td>
       <td><input type="text" data-column="1" class="search-input"></td>
       <td><input type="text" data-column="2" class="search-input"></td>
       <td><input type="text" data-column="3" class="search-input"></td>
       <td><input type="text" data-column="4" class="search-input"></td>
       <td><input type="text" data-column="5" class="search-input"></td>
       <td><input type="text" data-column="6" class="search-input"></td>
       <td><input type="text" data-column="7" class="search-input"></td>
       <td><input type="text" data-column="8" class="search-input"></td>
       <td><input type="text" data-column="9" class="search-input"></td>
       <td><input type="text" data-column="10" class="search-input"></td>
       <td><input type="text" data-column="11" class="search-input"></td>
       <td><input type="text" data-column="12" class="search-input"></td>
       <td><input type="text" data-column="13" class="search-input"></td>
       <td><input type="text" data-column="14" class="search-input"></td>
       <td><input type="text" data-column="15" class="search-input"></td>
       <td><input type="text" data-column="16" class="search-input"></td>
       <td><input type="text" data-column="17" class="search-input"></td>
     </tr>
   </thead>
 </table>
</div>
</div>
</div>
</div><!-- /.container-fluid -->
<?php
 require_once('../lib/bottom.php');
}else{
 require_once('../lib/invalid_access.php');
}
?>
</body>
</html>

<?php
require_once('../lib/script_src.php');
?>

<script type="text/javascript">
 
$(document).ready(function(){

 fetch_data();

 function fetch_data(test)
 {
  var dataTable = $('#PasteTable').DataTable({
   "processing" : true,
   "serverSide" : true,
   "orderMulti" : true,
      //"order" : [[0,'desc'],[5,'asc']],
   "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
   "iDisplayLength": 25,
   "ajax" : {
    url:"../dataManage/analysisPtView/fetch.php",
    type:"POST"
  },
  "columnDefs":[
    {
     "targets":[4],
     "orderable":false,
    }
   ],
  dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
       "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
       buttons: ['copy', 'excel',
       {
         extend: 'colvis',
         text: 'Show / Hide columns'
       }]
  });

  // 
  $('.search-input').on( 'keyup', function () {
					var i =$(this).attr('data-column');  
					var v =$(this).val();  
          dataTable.columns(i).search(v).draw();
          // console.log(i,v);
				} );
 }

});
</script>
