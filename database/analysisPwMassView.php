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
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><?php echo $bread[0]; ?></li>
                <li class="breadcrumb-item"><?php echo $bread[1]; ?></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[2]; ?></li>
              </ol>
            </nav>
          <div class="card-body">
            <div class="row justify-content-between">
              <div class="col-4">
                <h3><?php echo $bread[3]; ?></h3>
              </div>
            </div> <br>

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="navitem">
              <a class="nav-link" id="R-tab" data-toggle="tab" href="#reaction" role="tab" aria-controls="reaction" aria-selected="flase">Reaction</a>
            </li>
            <li class="navitem">
              <a class="nav-link" id="NC-tab" data-toggle="tab" href="#nc" role="tab" aria-controls="nc" aria-selected="false">NC</a>
            </li>
            <li class="navitem">
              <a class="nav-link" id="Jet-tab" data-toggle="tab" href="#jet" role="tab" aria-controls="jet" aria-selected="true">JET</a>
            </li>
            <li class="navitem">
              <a class="nav-link active" id="Cl-tab" data-toggle="tab" href="#cl" role="tab" aria-controls="cl" aria-selected="true">CL</a>
            </li>
            <li class="navitem">
              <a class="nav-link" id="Etc-tab" data-toggle="tab" href="#etc" role="tab" aria-controls="etc" aria-selected="true">Etc</a>
            </li>
          </ul>

         
          <div class="tab-content" id="myTabContent">

          <!-- 반응 분말 테이블 -->
          <div class="tab-pane fade" id="reaction" role="tabpanel" aria-labelledby="R-tab"><br>
              <div class="table-responsive">
                <table id="RTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                <thead align="center">
                  <tr>
                    <th>Lot<br>No</th>
                    <th id="">
                      <select name="RmassPwType" id="RmassPwType" class="form-control">
                        <option value="">제품분류</option>
                        <option value="CP4">CP4</option>
                        <option value="CP6">CP6</option>
                      </select>
                    </th>
                    <th width="">특징</th>
                    <th>제조일자</th>
                    <th width="">코팅제1</th>
                    <th width="">코팅제1<br>비율</th>
                    <th width="">코팅제2</th>
                    <th width="">코팅제2<br>비율</th>
                    <th width="">SAPA<br>비율</th>
                    <th width="">코팅온도</th>
                    <th>해쇄<br>투입속도</th>
                    <th>해쇄압</th>
                    <th>해쇄<br>회수율</th>
                    <th>미분<br>회수율</th>
                    <th>조분<br>회수율</th>
                    <th width="">Etc</th>
                    <th>SEM Size</th>
                    <th>T-IGL</th>
                    <th>PCU</th>
                    <th>Etc</th>
                  </tr>
                  </thead>
                </table>
              </div>
            </div> 

            <!-- 세척 분말 테이블 -->
            <div class="tab-pane fade" id="nc" role="tabpanel" aria-labelledby="NC-tab"><br>
              <div class="table-responsive">
                <table id="NCTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                <thead align="center">
                  <tr>
                    <th>Lot<br>No</th>
                    <th id="">
                      <select name="NCmassPwType" id="NCmassPwType" class="form-control">
                        <option value="">제품분류</option>
                        <option value="CP4">CP4</option>
                        <option value="CP6">CP6</option>
                      </select>
                    </th>
                    <th width="">특징</th>
                    <th>제조일자</th>
                    <th width="">코팅제1</th>
                    <th width="">코팅제1<br>비율</th>
                    <th width="">코팅제2</th>
                    <th width="">코팅제2<br>비율</th>
                    <th width="">SAPA<br>비율</th>
                    <th width="">코팅온도</th>
                    <th>해쇄<br>투입속도</th>
                    <th>해쇄압</th>
                    <th>해쇄<br>회수율</th>
                    <th>미분<br>회수율</th>
                    <th>조분<br>회수율</th>
                    <th width="">Etc</th>
                    <th>SEM Size</th>
                    <th>T-IGL</th>
                    <th>PCU</th>
                    <th>Etc</th>
                  </tr>
                  </thead>
                </table>
              </div>
            </div> 

            <!-- 해쇄 분말 테이블 -->
            <div class="tab-pane fade" id="jet" role="tabpanel" aria-labelledby="Jet-tab"><br>
              <div class="table-responsive">
                <table id="JetTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                <thead align="center">
                  <tr>
                    <th>Lot<br>No</th>
                    <th id="">
                      <select name="JetmassPwType" id="JetmassPwType" class="form-control">
                        <option value="">제품분류</option>
                        <option value="CP4">CP4</option>
                        <option value="CP6">CP6</option>
                      </select>
                    </th>
                    <th width="">특징</th>
                    <th>제조일자</th>
                    <th width="">코팅제1</th>
                    <th width="">코팅제1<br>비율</th>
                    <th width="">코팅제2</th>
                    <th width="">코팅제2<br>비율</th>
                    <th width="">SAPA<br>비율</th>
                    <th width="">코팅온도</th>
                    <th>해쇄<br>투입속도</th>
                    <th>해쇄압</th>
                    <th>해쇄<br>회수율</th>
                    <th>미분<br>회수율</th>
                    <th>조분<br>회수율</th>
                    <th width="">Etc</th>
                    <th>SEM<br>Size</th>
                    <th>D10</th>
                    <th>D50</th>
                    <th>D90</th>
                    <th>Dmax</th>
                    <th>응집도</th>
                    <th>QC-IGL</th>
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
          
           <!-- 분급 분말 테이블 -->
            <div class="tab-pane fade show active" id="cl" role="tabpanel" aria-labelledby="Cl-tab"><br>
              <div class="table-responsive">
                <table id="ClTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                <thead align="center">
                  <tr>
                    <th>Lot<br>No</th>
                    <th id="">
                      <select name="ClmassPwType" id="ClmassPwType" class="form-control">
                        <option value="">제품분류</option>
                        <option value="CP4">CP4</option>
                        <option value="CP6">CP6</option>
                      </select>
                    </th>
                    <th width="">특징</th>
                    <th>제조일자</th>
                    <th width="">코팅제1</th>
                    <th width="">코팅제1<br>비율</th>
                    <th width="">코팅제2</th>
                    <th width="">코팅제2<br>비율</th>
                    <th width="">SAPA<br>비율</th>
                    <th width="">코팅온도</th>
                    <th>해쇄<br>투입속도</th>
                    <th>해쇄압</th>
                    <th>해쇄<br>회수율</th>
                    <th>미분<br>회수율</th>
                    <th>조분<br>회수율</th>
                    <th width="">Etc</th>
                    <th>SEM<br>Size</th>
                    <th>D10</th>
                    <th>D50</th>
                    <th>D90</th>
                    <th>Dmax</th>
                    <th>응집도</th>
                    <th>NC-IGL</th>
                    <th>QC-IGL</th>
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

            <!-- 테스트 분말 테이블 -->
            <div class="tab-pane fade" id="etc" role="tabpanel" aria-labelledby="Etc-tab"><br>
              <div class="table-responsive">
                <table id="EtcTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                <thead align="center">
                  <tr>
                    <th>Lot<br>No</th>
                    <th id="">제품분류</th>
                    <th width="">특징</th>
                    <th>제조일자</th>
                    <th width="">코팅제1</th>
                    <th width="">코팅제1<br>비율</th>
                    <th width="">코팅제2</th>
                    <th width="">코팅제2<br>비율</th>
                    <th width="">SAPA<br>비율</th>
                    <th width="">코팅온도</th>
                    <th>해쇄<br>투입속도</th>
                    <th>해쇄압</th>
                    <th>해쇄<br>회수율</th>
                    <th>미분<br>회수율</th>
                    <th>조분<br>회수율</th>
                    <th width="">Etc</th>
                    <th>SEM<br>Size</th>
                    <th>D10</th>
                    <th>D50</th>
                    <th>D90</th>
                    <th>Dmax</th>
                    <th>응집도</th>
                    <th>NC-IGL</th>
                    <th>QC-IGL</th>
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

  cl_fetch_data();

  $(document).on('click', '#R-tab', function(){
        $('#RTable').DataTable().destroy();
        reaction_fetch_data();
      });

      $(document).on('click', '#NC-tab', function(){
        $('#NCTable').DataTable().destroy();
        nc_fetch_data();
      });
      
      $(document).on('click', '#Jet-tab', function(){
        $('#JetTable').DataTable().destroy();
        jet_fetch_data();
      });

      $(document).on('click', '#Cl-tab', function(){
        $('#ClTable').DataTable().destroy();
        cl_fetch_data();
      });

      $(document).on('click', '#Etc-tab', function(){
        $('#EtcTable').DataTable().destroy();
        etc_fetch_data();
      });

  function cl_fetch_data(is_massPwType)
  {
   var dataTable = $('#ClTable').DataTable({
   
    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [0,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "ajax" : {
     url:"../dataManage/analysisPwMassView/cl-fetch.php",
     type:"POST",
     data: {is_massPwType : is_massPwType}
   },
   dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: ['copy', 'excel',
        {
          extend: 'colvis',
          text: 'Show / Hide columns'
        }],
        columnDefs: [
          {targets: [8, 10, 15,],
          visible: false},
          {"orderable": false,
          "targets": [1]}
        ]
   });
  }

  function jet_fetch_data(is_massPwType)
  {
   var dataTable = $('#JetTable').DataTable({
   
    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [0,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "ajax" : {
     url:"../dataManage/analysisPwMassView/jet-fetch.php",
     type:"POST",
     data: {is_massPwType : is_massPwType}
   },
   dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: ['copy', 'excel',
        {
          extend: 'colvis',
          text: 'Show / Hide columns'
        }],
        columnDefs: [
          {targets: [8, 10, 15,],
          visible: false},
          {"orderable": false,
          "targets": [1]}
        ]
   });
  }

  function reaction_fetch_data(is_massPwType)
  {
   var dataTable = $('#RTable').DataTable({
   
    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [0,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "ajax" : {
     url:"../dataManage/analysisPwMassView/reaction-fetch.php",
     type:"POST",
     data: {is_massPwType : is_massPwType}
   },
   dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: ['copy', 'excel',
        {
          extend: 'colvis',
          text: 'Show / Hide columns'
        }],
        columnDefs: [
          {targets: [8, 10, 15, 19],
          visible: false},
          {"orderable": false,
          "targets": [1]}
        ]
   });
  }


  function nc_fetch_data(is_massPwType)
  {
   var dataTable = $('#NCTable').DataTable({
   
    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [0,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "ajax" : {
     url:"../dataManage/analysisPwMassView/nc-fetch.php",
     type:"POST",
     data: {is_massPwType : is_massPwType}
   },
   dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: ['copy', 'excel',
        {
          extend: 'colvis',
          text: 'Show / Hide columns'
        }],
        columnDefs: [
          {targets: [8, 10, 15, 19],
          visible: false},
          {"orderable": false,
          "targets": [1]}
        ]
   });
  }

  function etc_fetch_data()
  {
   var dataTable = $('#EtcTable').DataTable({
   
    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [0,'desc'],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "ajax" : {
     url:"../dataManage/analysisPwMassView/etc-fetch.php",
     type:"POST"
   },
   dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: ['copy', 'excel',
        {
          extend: 'colvis',
          text: 'Show / Hide columns'
        }],
        columnDefs: [
          {targets: [8, 10, 15,],
          visible: false},
          {"orderable": false,
          "targets": [1]}
        ]
   });
  }

  $(document).on('change', '#RmassPwType', function(){
        var massPwType = $(this).val();
        $('#RTable').DataTable().destroy();
        if(massPwType != '')
        {
          reaction_fetch_data(massPwType);
        }
        else
        {
          reaction_fetch_data();
        }
      });

      $(document).on('change', '#NCmassPwType', function(){
        var massPwType = $(this).val();
        $('#NCTable').DataTable().destroy();
        if(massPwType != '')
        {
          nc_fetch_data(massPwType);
        }
        else
        {
          nc_fetch_data();
        }
      });

      $(document).on('change', '#JetmassPwType', function(){
        var massPwType = $(this).val();
        $('#JetTable').DataTable().destroy();
        if(massPwType != '')
        {
          jet_fetch_data(massPwType);
        }
        else
        {
          jet_fetch_data();
        }
      });

      $(document).on('change', '#ClmassPwType', function(){
        var massPwType = $(this).val();
        $('#ClTable').DataTable().destroy();
        if(massPwType != '')
        {
          cl_fetch_data(massPwType);
        }
        else
        {
          cl_fetch_data();
        }
      });

 });

</script>
