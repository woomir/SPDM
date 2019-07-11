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
  <table id="Agno3Table" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
   <thead align="center">
    <tr>
      <th width="">Lot No</th>
      <th width="">Ag농도</th>
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
  <div class="modal-dialog modal-sm">
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
              <div class="col-md-6">
                <label>*Lot No</label>
                <input type="text" name="lotNo" id="lotNo" class="form-control" placeholder="Ex) 1901A"/>
              </div>
              <div class="col-md-6">
                <label>*Ag농도</label>
                <input type="number" name="agC" id="agC" class="form-control" step="0.1">
              </div>
            </div><br />
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
   var dataTable = $('#Agno3Table').DataTable({

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
     url:"../dataManage/infoAgno3/fetch.php",
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
  });

  $(document).on('click', '.edit_data', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:"../dataManage/infoAgno3/edit.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
                  $('#lotNo').val(data.lotNo);
                  $('#agC').val(data.agC);
                  $('#etc').val(data.etc);
                  $('#id').val("edit");
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
        else if($('#agC').val() == '')
        {
            alert("Ag농도 is required");
        }
        else
        {
            $.ajax({
                  url:"../dataManage/infoAgno3/insert.php",
                  method:"POST",
                  data:$('#insert_form').serialize(),
                  beforeSend:function(){
                      $('#insert').val("Inserting");
                  },
                  success:function(data){
                      $('#insert_form')[0].reset();
                      $('#add_data_Modal').modal('hide');
                      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                      $('#Agno3Table').DataTable().destroy();
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
                        url:"../dataManage/infoAgno3/delete.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
                            $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                            $('#Agno3Table').DataTable().destroy();
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
