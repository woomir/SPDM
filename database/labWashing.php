<?php session_start();
   require_once('../lib/top.php');
   include '../dataManage/db.php';
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
  <table id="WashTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
   <thead align="center">
    <tr>
      <th width="">Sample<br>No</th>
      <th width="">Concept</th>
      <th width="">Date</th>
      <th width="">반응 분말<br>Lot No</th>
      <th width="">DMW<br>사용량</th>
      <th width="">분말<br>사용량</th>
      <th width="">세척제<br>종류</th>
      <th width="">세척제<br>비율</th>
      <th width="">세척제<br>사용량</th>
      <th width="">세척 온도</th>
      <th width="">투입 순서</th>
      <th width="">교반 속도</th>
      <th width="">세척제 용해<br>Time</th>
      <th width="">분말 분산<br>Time</th>
      <th width="">실험<br>담당자</th>
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
          <div style="display:inline-block; position:absolute; right:190px; top:22px; font-weight:bold;">이전 데이터 가져오기</div>
                            <select name="existCondition" id="existCondition" class="form-control" style="width:20%; display:inline-block; float:right;">
                            <option value="">Sample No</option>
                            <?php 
                              $query = "SELECT sampleNo from washtbl ORDER BY dateWashing DESC";
                              $result = mysqli_query($connect,$query);
                              while($row = mysqli_fetch_array($result)){
                                echo "<option value='".$row["sampleNo"]."'>".$row["sampleNo"]."</option>";
                              }
                            ?>    
                            </select>
                     <br><br>
            <div class="row">
              <div class="col-md-4">
                <label>*Sample No</label>
                <input type="text" name="sampleNo" id="sampleNo" class="form-control" />
              </div>
              <div class="col-md-8">
                <label>*Concept</label>
                <input type="text" name="concept" id="concept" class="form-control"></input>
              </div>
            </div><br />
            <div class="row">
              <div class="col-md-4">
                <label>*세척 일자</label>
                <input type="date" name="dateWashing" id="dateWashing" class="form-control" value="<?php echo date("Y-m-d");?>"/>
              </div>
              <div class="col-md-5">
                <label>*반응분말 Lot</label>
                <input type="text" name="pwLot" id="pwLot" class="form-control"></input>
              </div>
              <div class="col-md-3">
                <label>*DMW 사용량</label>
                <input type="number" name="amountDMW" id="amountDMW" class="form-control" value="" placeholder="ml"/>
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-3">
                <label>*분말 사용량</label>
                <input type="number" name="amountPw" id="amountPw" class="form-control" value="" placeholder="g"/>
              </div>
              <div class="col-md-3">
              <label>세척제 종류</label>
              <select name="kindsWash" id="kindsWash" class="form-control">
                    <option >NaOH</option>
              </select>
              </div>
              <div class="col-md-3">
                  <label>세척제 비율</label>
                  <input type="number" name="ratioWash" id="ratioWash" class="form-control" placeholder="wt% / Ag" step="0.01" />
              </div>
              <div class="col-md-3">
                <label>세척 온도</label>
                <input type="number" name="temp" id="temp" class="form-control" placeholder="&#8451;"/>
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-6">
                <label>투입순서</label>
                <select name="orderAdd" id="orderAdd" class="form-control">
                      <option >DMW-Wash agent-PW</option>
                </select>
              </div>
              <div class="col-md-3">
              <label>교반속도 (RPM)</label>
              <input type="number" name="rpm" id="rpm" class="form-control" value="1500" />
              </div>
              <div class="col-md-3">
                <label>세척제 용해 Time</label>
                <input type="number" name="timeDissol" id="timeDissol" class="form-control" placeholder="min" />
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-3">
                <label>분말 분산 Time</label>
                <input type="number" name="timePw" id="timePw" class="form-control" placeholder="min" />
              </div>
              <div class="col-md-3">
                <label>실험담당자</label>
                <input type="text" name="maker" id="maker" class="form-control" />
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-12">
                <label>Etc</label>
                <input type="text" name="etc" id="etc" class="form-control" />
              </div>
            </div><br>
            <input type="hidden" name="id" id="id" value="insert"/>
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
   var dataTable = $('#WashTable').DataTable({

    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [[2,'desc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [{
    orderable: false,
    targets: [],
    }],
    "ajax" : {
     url:"../dataManage/labWashing/fetch.php",
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
            {targets: [],
             visible: false}
        ]
   });
  }

  $('#add').click(function(){
        $('#insert').val("Insert");
        $('#insert_form')[0].reset();
        $('#id').val("");
        $('#existCondition').val("");
  });

  $(document).on('click', '.edit_data', function(){
        var id = $(this).attr("id");
        $('#existCondition').val("");
        $.ajax({
            url:"../dataManage/labWashing/edit.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
                  $('#sampleNo').val(data.sampleNo);
                  $('#concept').val(data.concept);
                  $('#dateWashing').val(data.dateWashing);
                  $('#pwLot').val(data.pwLot);
                  $('#amountDMW').val(data.amountDMW);
                  $('#amountPw').val(data.amountPw);
                  $('#kindsWash').val(data.kindsWash);
                  $('#ratioWash').val(data.ratioWash);
                  $('#temp').val(data.temp);
                  $('#orderAdd').val(data.orderAdd);
                  $('#rpm').val(data.rpm);
                  $('#timeDissol').val(data.timeDissol);
                  $('#timePw').val(data.timePw);
                  $('#maker').val(data.maker);
                  $('#etc').val(data.etc);
                  $('#id').val("edit");
                  $('#insert').val("Update");
                  $('#add_data_Modal').modal('show');
            }
        });
  });

  $('#insert_form').on("submit", function(event){
        event.preventDefault();
        if($('#sampleNo').val() == "")
        {
            alert("Sample No is required");
        }
        else if($('#concept').val() == '')
        {
            alert("Concept is required");
        }
        else if($('#dateWashing').val() == '')
        {
            alert("Date is required");
        }
        else if($('#pwLot').val() == '')
        {
            alert("Lot No is required");
        }
        else if($('#amountDMW').val() == '')
        {
            alert("DMW 사용량 is required");
        }
        else if($('#amountPw').val() == '')
        {
            alert("분말 사용량 is required");
        }
        else
        {
            $.ajax({
                  url:"../dataManage/labWashing/insert.php",
                  method:"POST",
                  data:$('#insert_form').serialize(),
                  beforeSend:function(){
                      $('#insert').val("Inserting");
                  },
                  success:function(data){
                      $('#insert_form')[0].reset();
                      $('#add_data_Modal').modal('hide');
                      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                      $('#WashTable').DataTable().destroy();
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
                        url:"../dataManage/labWashing/delete.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                            $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                            $('#WashTable').DataTable().destroy();
                            fetch_data();
                        }
                  });
                  setInterval(function(){
                    $('#alert_message').html('');
                  }, 5000);
              }
  });

  $("#existCondition").change(function(){
      var id = this.value;
      $.ajax({
                url:"../dataManage/labWashing/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                  $('#sampleNo').val(data.sampleNo);
                  $('#concept').val(data.concept);
                  $('#dateWashing').val(data.dateWashing);
                  $('#pwLot').val(data.pwLot);
                  $('#amountDMW').val(data.amountDMW);
                  $('#amountPw').val(data.amountPw);
                  $('#kindsWash').val(data.kindsWash);
                  $('#ratioWash').val(data.ratioWash);
                  $('#temp').val(data.temp);
                  $('#orderAdd').val(data.orderAdd);
                  $('#rpm').val(data.rpm);
                  $('#timeDissol').val(data.timeDissol);
                  $('#timePw').val(data.timePw);
                  $('#maker').val(data.maker);
                  $('#etc').val(data.etc);
                  $('#id').val(data.id);
                  $('#add_data_Modal').show().formValidation('resetForm');
                }
           });
    });
 });

</script>
