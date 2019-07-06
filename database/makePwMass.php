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
                <div align="col-4">
                <?php if ($_SESSION['role_id']<3){ ?>
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info btn-xs">Add</button>&nbsp;&nbsp;&nbsp;
                  <?php } ?>
                </div>
            </div> <br>
            
<div class="table-responsive">
  <div id="alert_message"></div>
  <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
   <thead align="center">
    <tr>
      <th width="">Lot<br>No</th>
      <th width="">제품<br>분류</th>
      <th width="">특징</th>
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
      <th width="">Edit</th>
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

<!--Modal add-->
<div id="add_data_Modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
           <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="gridModalLabel">Data Insert</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                     </button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                     <form method="post" id="insert_form">
                       <div class="row">
                         <div class="col-md-4">
                           <label>*Lot No</label>
                           <input type="text" name="lotNo" id="lotNo" class="form-control" />
                         </div>
                         <div class="col-md-4">
                           <label>*제품 분류</label>
                           <input type="text" name="nameProduct" id="nameProduct" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>*특징</label>
                           <input type="text" name="characteristic" id="characteristic" class="form-control"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-3">
                            <label>코팅제1</label>
                            <input type="text" name="nameLubricant1" id="nameLubricant1" class="form-control" />
                         </div>
                         <div class="col-md-3">
                          <label>코팅제1 비율</label>
                          <input type="number" name="ratioLubricant1" id="ratioLubricant1" class="form-control" placeholder="wt% / Ag" step="0.01"/>
                        </div>
                        <div class="col-md-3">
                           <label>코팅제2</label>
                           <input type="text" name="nameLubricant2" id="nameLubricant2" class="form-control" />
                        </div>
                        <div class="col-md-3">
                         <label>코팅제2 비율</label>
                         <input type="number" name="ratioLubricant2" id="ratioLubricant2" class="form-control" placeholder="wt% / Ag" step="0.01" />
                       </div>
                       </div>
                       </br>
                       <div class="row">
                         <div class="col-md-3">
                           <label>SAPA 비율</label>
                            <input type="text" name="ratioSAPA" id="ratioSAPA" class="form-control" value="2:1"/>
                         </div>
                         <div class="col-md-3">
                          <label>코팅온도</label>
                          <input type="number" name="tempCoating" id="tempCoating" class="form-control" placeholder="&#8451;"/>
                        </div>
                        <div class="col-md-3">
                          <label>해쇄 투입속도</label>
                           <input type="number" name="rateAddJet" id="rateAddJet" class="form-control" placeholder="Hz" step="0.1"/>
                        </div>
                        <div class="col-md-3">
                         <label>해쇄압</label>
                         <input type="number" name="pressureJet" id="pressureJet" class="form-control" placeholder="bar" step="0.1"/>
                       </div>
                       </div>
                       </br>
                       <div class="row">
                        <div class="col-md-4">
                         <label>해쇄 회수율</label>
                         <input type="number" name="yieldJet" id="yieldJet" class="form-control" placeholder="%" step="0.1"/>
                       </div>
                        <div class="col-md-4">
                          <label>미분 회수율</label>
                          <input type="number" name="yieldSmall" id="yieldSmall" class="form-control" placeholder="%" step="0.1"/>
                        </div>
                        <div class="col-md-4">
                          <label>조분 회수율</label>
                          <input type="number" name="yieldBig" id="yieldBig" class="form-control" placeholder="%" step="0.1"/>
                        </div>
                       </div>
                       </br>
                       <div class="row">
                       <div class="col-md-12">
                         <label>Etc</label>
                         <input type="text" name="etc" id="etc" class="form-control" />
                      </div>
                       </div>
                       </br>
                          <input type="hidden" name="id" id="id" />
                          <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" />
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                     </form>
                </div>
              </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>

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
    "responsive" : true,
    "order" : [[0,'desc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [{
    orderable: false,
    targets: [11,12]
    }],
    "ajax" : {
     url:"../dataManage/makePwMass/fetch.php",
     type:"POST"
   },
   dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
        "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: ['copy', 'excel',
        {
          extend: 'colvis',
          text: 'Show / Hide columns',
          postfixButtons: [ 'colvisRestore' ]
        }],
        columnDefs: [
            {targets: [-2],
             visible: false}
        ]
   });
  }
      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
           $('#id').val("");
      });
      $(document).on('click', '.edit_data', function(){
           var id = $(this).attr("id");
           $.ajax({
                url:"../dataManage/makePwMass/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#lotNo').val(data.lotNo);
                     $('#nameProduct').val(data.nameProduct);
                     $('#characteristic').val(data.characteristic);
                     $('#nameLubricant1').val(data.nameLubricant1);
                     $('#ratioLubricant1').val(data.ratioLubricant1);
                     $('#nameLubricant2').val(data.nameLubricant2);
                     $('#ratioLubricant2').val(data.ratioLubricant2);
                     $('#ratioSAPA').val(data.ratioSAPA);
                     $('#tempCoating').val(data.tempCoating);
                     $('#rateAddJet').val(data.rateAddJet);
                     $('#pressureJet').val(data.pressureJet);
                     $('#yieldJet').val(data.yieldJet);
                     $('#yieldSmall').val(data.yieldSmall);
                     $('#yieldBig').val(data.yieldBig);
                     $('#etc').val(data.etc);
                     $('#id').val(data.id);
                     $('#insert').val("Update");
                     $('#add_data_Modal').modal('show');
                }
           });
      });
      $('#insert_form').on("submit", function(event){
           event.preventDefault();
           if($('#lotNo').val() == "")
           {
                alert("Lot No is required");
           }
           else if($('#nameProduct').val() == '')
           {
                alert("제품 분류 is required");
           }
           else if($('#characteristic').val() == '')
           {
                alert("특징 is required");
           }
           else
           {
                $.ajax({
                     url:"../dataManage/makePwMass/insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#add_data_Modal').modal('hide');
                          $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                          $('#PasteTable').DataTable().destroy();
                          fetch_data();
                     }
                });
                setInterval(function(){
                 $('#alert_message').html('');
               }, 5000);
           }
      });

      $(document).on('click', '.btn_delete', function(){
                 var id=$(this).attr("id");
                 if(confirm("Are you sure you want to delete this?"))
                 {
                      $.ajax({
                           url:"../dataManage/makePwMass/delete.php",
                           method:"POST",
                           data:{id:id},
                           success:function(data){
                                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                                $('#PasteTable').DataTable().destroy();
                                fetch_data();
                           }
                      });
                      setInterval(function(){
                       $('#alert_message').html('');
                     }, 5000);
                 }
            });

    $(".modal").draggable({
      handle: ".modal-header"
    });

 });
</script>
