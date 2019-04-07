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
      <th>Sample<br>No</th>
      <th>Concept</th>
      <th>Powder<br>Type</th>
      <th>Date</th>
      <th>Lot<br>No</th>
      <th>환원제</th>
      <th>환원제<br>비율</th>
      <th>환원제<br>사용량</th>
      <th>Amine</th>
      <th>Amine<br>사용량</th>
      <th>코팅제1</th>
      <th>코팅제1<br>비율</th>
      <th>코팅제2</th>
      <th>코팅제2<br>비율</th>
      <th>SA비율</th>
      <th>PA비율</th>
      <th>첨가제</th>
      <th>첨가제<br>비율</th>
      <th>첨가제<br>사용량</th>
      <th>코팅온도</th>
      <th>교반속도</th>
      <th>D10</th>
      <th>D50</th>
      <th>D90</th>
      <th>Dmax</th>
      <th>T-IGL</th>
      <th>P-IGL</th>
      <th>C-IGL</th>
      <th>BET</th>
      <th>TD</th>
      <th>XRD</th>
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
    "order" : [0,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [
      {targets: [3,4,6,12,13,14,15,16,17,18,20,-1],
           visible: false}
    ],
    "ajax" : {
     url:"../dataManage/analysisPwlabView/fetch.php",
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
