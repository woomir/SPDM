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
  <table id="WashTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
   <thead align="center">
    <tr>
      <th width="">Sample<br>No</th>
      <th width="">Concept</th>
      <th width="">Date</th>
      <th width="">반응분말<br>Lot No</th>
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
      <th width="">실험<>담당자</th>
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

  <!--Modal file-->
  <div id="file_Modal" class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" >
      <div class="modal-content" style="width:100%; height:100%; margin:0; padding:0;">
        <div class="modal-header">
          <h4 class="modal-title" id="gridModalLabel">File Management</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="card mb-3">
              <div class="card-body">
                <form method="post" id="file_form" enctype="multipart/form-data" action="../dataManage/labWashing/file_manage.php">
                  <?php if ($_SESSION['role_id'] < 3){ ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><br>
                    <span class="btn btn-success fileinput-button">
                      <i class="glyphicon glyphicon-plus"></i>
                      <span>Add files...</span>
                      <!-- The file input field used as target for the file upload widget -->
                      <input id="fileupload" type="file" name="files[]" multiple onchange="myFunction()">
                    </span><br><br>
                    <p id="file-list"></p>
                  <?php } ?>
                  <div>
                    <h6>< Image Files ></h6>
                    <div class="panel-body">
                      <ul class="list-group" id="savedfiles">
                      </ul>
                    </div>
                  </div><br>
                  <div>
                    <h6>< Other Files ></h6>
                    <div class="panel-body">
                      <ul class="other-list-group" id="otherfiles" style="padding:0px;">
                      </ul>
                    </div>
                  </div>
                  <div id="file_message"></div>
                  <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" />
                  <input type="hidden" name="file-sampleNo" id="file-sampleNo" value="" />
                  <input type="hidden" name="file-save-id" id="file-save-id" value="">
                  <?php if ($_SESSION['role_id'] < 3){ ?>
                    <input type="submit" name="save" id="save" value="Save" class="btn btn-primary" style="float: right;"/>
                  <?php } ?>
                </form>
              </div>
            </div>
            </div>
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
  });

  $(document).on('click', '.edit_data', function(){
        var id = $(this).attr("id");
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

      //file button 동작
  $(document).on('click', '.btn_file', function(){
    var id = $(this).attr("id");
    $('#save').val("Save");
    $('#file_form')[0].reset();
    $('#id').val("");
    $('#file-list').text("Select one or more files.");
    $('#savedfiles').html('');
    $('#otherfiles').html('');
    $('.progress-bar').attr('aria-valuenow', '0').css('width', '0%').text('');
    $.ajax({
              url:"../dataManage/labWashing/file_view.php",
              method:"POST",
              data:{id:id},
              dataType:"json",
              success:function(data){
                    var i = Object.keys(data).length;
                    if (data[0].check == 0){ // check가 '0'이면 첨부 파일이 존재함.
                      var imageCount = 0;
                      var otherCount = 0;
                      for(var a = 0; a < i; a++){
                        var fileType = data[a].fileType;
                        if (data[a].fileType === 'image'){
                          $('#savedfiles').append('<li class="list-group-item"><div><a href="../dataManage/labWashing/uploads/' + 
                          data[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                          data[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                          data[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                          imageCount++;
                        } else {
                          $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/labWashing/uploads/' + 
                          data[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                          data[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                          data[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                          otherCount++;
                        }
                      }
                        if (imageCount === 0){
                          $('#savedfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                        } else if (otherCount === 0){
                          $('#otherfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                        }
                      } else { 
                        $('#savedfiles').append('<li class="list-group-item"><div>' + 
                        data[0].fileName + '</div></li>');
                        $('#otherfiles').append('<li class="list-group-item"><div>' + 
                        data[0].fileName + '</div></li>');
                    }
                    $('#file-sampleNo').val(data[0].sampleNo);
                    $('#file_Modal').modal('show');
                    $('#file_message').text('');
                    $('#file-save-id').val(id);
              }
          });
  });

  //file 삭제
  $(document).on('click', '.file-delete', function(){
    var id = $('#file-save-id').val(); 
    var filename = $(this).attr("name");
    if(confirm("Are you sure you want to delete this?")){
    $.ajax({
                url:"../dataManage/labWashing/file_manage.php",
                method:"POST",
                data:{filename:filename},
                success:function(data){
                  // console.log(data);
                  $('#file_message').html('<div class="alert alert-success">'+data+'</div>');
                  $.ajax({
                          url:"../dataManage/labWashing/file_view.php",
                          method:"POST",
                          data:{id:id},
                          dataType:"json",
                          success:function(data2){
                              $("#savedfiles").html('');
                              $("#otherfiles").html('');
                              var i = Object.keys(data2).length;
                              if (data2[0].check == 0){ // check가 '0'이면 첨부 파일이 존재함.
                                var imageCount = 0;
                                var otherCount = 0;
                                for(var a = 0; a < i; a++){
                                  var fileType = data2[a].fileType;
                                  if (data2[a].fileType === 'image'){
                                    $('#savedfiles').append('<li class="list-group-item"><div><a href="../dataManage/labWashing/uploads/' + 
                                    data2[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                                    data2[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                                    data2[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                                    imageCount++;
                                  } else {
                                    $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/labWashing/uploads/' + 
                                    data2[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                                    data2[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                                    data2[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                                    otherCount++;
                                  }
                                }
                                  if (imageCount === 0){
                                    $('#savedfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                                  } else if (otherCount === 0){
                                    $('#otherfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                                  }
                                } else { 
                                  $('#savedfiles').append('<li class="list-group-item"><div>' + 
                                  data2[0].fileName + '</div></li>');
                                  $('#otherfiles').append('<li class="list-group-item"><div>' + 
                                  data2[0].fileName + '</div></li>');
                              }
                              $('#file-sampleNo').val(data2[0].sampleNo);
                            }/* ,
                            error: function(error){
                              alert('error');
                            } */
                      });
                }
           });
    }
  })

  //file save
  $('#file_form').on("submit", function(event){
          var id = $('#file-save-id').val(); 
           event.preventDefault();
           if($('#fileupload').val() == "")
           {
                alert("File is required");
           }
           else
           {
                $.ajax({
                  //업로드 진행 바
                  xhr: function(){
                    var xhr = new window.XMLHttpRequest();  
                    xhr.upload.addEventListener('progress',function(e) {
                      if (e.lengthComputable){

                        var percent = Math.round((e.loaded / e.total) * 100);

                        $('.progress-bar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                      }
                    });
                    return xhr;
                  },
                    url:"../dataManage/labWashing/file_manage.php",
                     method:"POST",
                     data: new FormData($("#file_form")[0]),
                     processData : false,
                     contentType : false,
                    //  beforeSend:function(){
                    //       $('#save').val("Saving");
                    //  },
                     success:function(data){
                          $('#file_form')[0].reset();
                          $('#file-list').text('Select one or more files.');
                          $('#file_message').html('<div class="alert alert-success">'+data+'</div>');
                          $.ajax({
                                  url:"../dataManage/labWashing/file_view.php",
                                  method:"POST",
                                  data:{id:id},
                                  dataType:"json",
                                  success:function(data2){
                                      $("#savedfiles").html('');
                                      $("#otherfiles").html('');
                                      var i = Object.keys(data2).length;
                                      if (data2[0].check == 0){ // check가 '0'이면 첨부 파일이 존재함.
                                        var imageCount = 0;
                                        var otherCount = 0;
                                        for(var a = 0; a < i; a++){
                                          var fileType = data2[a].fileType;
                                          if (data2[a].fileType === 'image'){
                                            $('#savedfiles').append('<li class="list-group-item"><div><a href="../dataManage/labWashing/uploads/' + 
                                            data2[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                                            data2[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                                            data2[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                                            imageCount++;
                                          } else {
                                            $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/labWashing/uploads/' + 
                                            data2[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                                            data2[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                                            data2[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                                            otherCount++;
                                          }
                                        }
                                          if (imageCount === 0){
                                            $('#savedfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                                          } else if (otherCount === 0){
                                            $('#otherfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                                          }
                                        } else { 
                                          $('#savedfiles').append('<li class="list-group-item"><div>' + 
                                          data2[0].fileName + '</div></li>');
                                          $('#otherfiles').append('<li class="list-group-item"><div>' + 
                                          data2[0].fileName + '</div></li>');
                                      }
                                      $('#file-sampleNo').val(data2[0].sampleNo);
                                    }/* ,
                                    error: function(error){
                                      alert('error');
                                    } */
                                });
                     }
                });
                setInterval(function(){
                 $('#file_message').html('');
               }, 5000);
           }
      });
    
    $(".modal").draggable({
      handle: ".modal-header"
    });

 });

 function myFunction(){
  var x = document.getElementById("fileupload");
  var txt = "";
  if ('files' in x) {
    if (x.files.length == 0) {
      txt = "Select one or more files.";
    } else {
      for (var i = 0; i < x.files.length; i++) {
        txt += "<br>" + (i+1) +  ". ";
        var file = x.files[i];
        if ('name' in file) {
          txt += file.name + " ";
        }
        if ('size' in file) {
          txt += "(" + (file.size/1024).toFixed() + " KB)";
        }
      }
    }
  } 
  else {
    if (x.value == "") {
      txt += "Select one or more files.";
    } else {
      txt += "The files property is not supported by your browser!";
      txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
    }
  }
  document.getElementById("file-list").innerHTML = txt;
}

</script>
