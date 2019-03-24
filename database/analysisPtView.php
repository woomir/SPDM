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
 function fetch_data()
 {
  var dataTable = $('#PasteTable').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [[0,'desc'],[5,'asc']],
   "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
   "iDisplayLength": 25,
   "columnDefs": [{
   // orderable: false,
   // targets: [8,9],
   }],
   "ajax" : {
    url:"../dataManage/analysisPtView/fetch.php",
    type:"POST"
  },
  dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
       "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
       buttons: ['copy', 'excel',
       {
         extend: 'colvis',
         text: 'Show / Hide columns'
       }]
  });
 }
});
</script>
