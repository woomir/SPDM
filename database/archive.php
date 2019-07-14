<?php session_start();
   require_once('../lib/top.php');
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){
   settype($_SESSION['role_id'],'int');
   require_once('../lib/menu.php');
?>
<div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row justify-content-between">
              <div class="col-4">
                <h3>파일 관리</h3>
              </div>
            </div> <br>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="navitem">
                <a class="nav-link" id="M-tab" data-toggle="tab" href="#mass" role="tab" aria-controls="mass" aria-selected="flase">Mass</a>
              </li>
              <li class="navitem">
                <a class="nav-link active" id="L-tab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab" aria-selected="flase">Lab</a>
              </li>
              <li class="navitem">
                <a class="nav-link" id="P-tab" data-toggle="tab" href="#paste" role="tab" aria-controls="paste" aria-selected="false">Paste</a>
              </li>
              
            </ul>

            <div class="tab-content" id="myTabContent">

              <!-- Mass 테이블 -->
              <div class="tab-pane fade" id="mass" role="tabpanel" aria-labelledby="M-tab"><br>
                <div class="table-responsive">
                  <table id="MassTable" class="table table-bordered table-striped table-hover" style="width: 100%;">
                    <thead align="center">
                      <tr>
                        <th width="">Lot No</th>
                        <th width="">Powder Type</th>
                        <th width="">File Name</th>
                        <th width="">File Type</th>
                        <th width="">Updated</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              
              <!-- Lab 테이블 -->
              <div class="tab-pane fade show active" id="lab" role="tabpanel" aria-labelledby="L-tab"><br>
              <div class="table-responsive">
                  <table id="LabTable" class="table table-bordered table-striped table-hover" style="width: 100%;">
                  <thead align="center">
                    <tr>
                    <tr>
                        <th width="">Sample No</th>
                        <th width="">Powder Type</th>
                        <th width="">File Name</th>
                        <th width="">File Type</th>
                        <th width="">Updated</th>
                      </tr>
                    </tr>
                    </thead>
                  </table>
                </div>
              </div>
              
              <!-- Paste 테이블 -->
              <div class="tab-pane fade" id="paste" role="tabpanel" aria-labelledby="P-tab"><br>      
                <div class="table-responsive">
                  <table id="PasteTable" class="table table-bordered table-striped table-hover" style="width: 100%;">
                  <thead align="center">
                    <tr>
                      <th>Paste No</th>
                      <th>Aging Time</th>
                      <th>File Name</th>
                      <th width="">Updated</th>
                    </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div> <!-- card -->
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

  lab_fetch_data();

  $(document).on('click', '#M-tab', function(){
    $('#MassTable').DataTable().destroy();
    mass_fetch_data();
  });

  $(document).on('click', '#L-tab', function(){
    $('#LabTable').DataTable().destroy();
    lab_fetch_data();
  });
  
  
  $(document).on('click', '#P-tab', function(){
    $('#PasteTable').DataTable().destroy();
    paste_fetch_data();
  });

  function mass_fetch_data()
  {
   var dataTable = $('#MassTable').DataTable({

    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [4,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 50,
    "columnDefs": [
      {targets: [],
           visible: false}
    ],
        "ajax" : {
        url:"../dataManage/archive/massFetch.php",
        type:"POST"
      }
   });
  }
/////////
  function lab_fetch_data()
  {
   var dataTable = $('#LabTable').DataTable({

    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [4,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 50,
    "columnDefs": [
      {targets: [],
           visible: false}
    ],
    "ajax" : {
     url:"../dataManage/archive/labFetch.php",
     type:"POST"
   }
   });
  }


///////
  function paste_fetch_data()
  {
   var dataTable = $('#PasteTable').DataTable({

    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [3,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 50,
    "columnDefs": [
      {targets: [],
           visible: false}
    ],
    "ajax" : {
     url:"../dataManage/archive/pasteFetch.php",
     type:"POST"
   }
   });
  }


 });

</script>
