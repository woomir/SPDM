<?php session_start();
   require_once('../lib/top.php');
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){
   settype($_SESSION['role_id'],'int');
   require_once('../lib/menu.php');
?>

<div class="table-responsive">
   <div id="alert_message"></div>
  <table id="users-Table" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
   <thead align="center">
    <tr>
     <th>ID</th>
     <th>이름</th>
     <th>Role-ID</th>
     <th>e-mail</th>
     <th>Created</th>
     </tr>
    </thead>
  </table>
</div>
</div>
</div>
</div>

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
   var dataTable = $('#users-Table').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [[0,'asc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [{
    //orderable: false,
    //targets: [8,9],
    }],
    "ajax" : {
     url:"../dataManage/Admin/fetch.php",
     type:"POST"
   }
   });
  }
 });

</script>