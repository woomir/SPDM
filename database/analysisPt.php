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
      <th width="">Paste<br> No</th>
      <th width="">Aging<br> Time</th>
      <th width="">Aging<br> Temp</th>
      <th width="">전처리</th>
      <th width="">Date</th>
      <th width="">점도<br>분석원</th>
      <th width="">1rpm</th>
      <th width="">10rpm</th>
      <th width="">30rpm</th>
      <th width="">100rpm</th>
      <th width="">1rpm_2</th>
      <th width="">10rpm_2</th>
      <th width="">30rpm_2</th>
      <th width="">100rpm_2</th>
      <th width="">탄성<br>분석원</th>
      <th width="">G' Low</th>
      <th width="">G' High</th>
      <th width="">YSP</th>
      <th width="">G' Low_2</th>
      <th width="">G' High_2</th>
      <th width="">YSP_2</th>
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
                           <label>*Paste No</label>
                           <input type="text" name="pasteNo" id="pasteNo" class="form-control" />
                         </div>
                         <div class="col-md-4">
                           <label>*Aging Time</label>
                           <select name="timeAging" id="timeAging" class="form-control">
                                <option >0</option>
                                <option >12</option>
                                <option >72</option>
                           </select>
                         </div>
                         <div class="col-md-4">
                           <label>Aging Temp</label>
                           <select name="tempAging" id="tempAging" class="form-control">
                                <option >0</option>
                                <option >50</option>
                           </select>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-3">
                           <label>전처리</label>
                           <select name="preCon" id="preCon" class="form-control">
                                <option >c-mixer</option>
                                <option >hand mixing</option>
                           </select>
                         </div>
                         <div class="col-md-6">
                           <label>*분석일자</label>
                           <input type="date" name="dateAnalysis" id="dateAnalysis" class="form-control" value="<?php echo date("Y-m-d");?>" />
                         </div>
                         <div class="col-md-3">
                           <label>*점도 분석원</label>
                           <select name="visAnalyzer" id="visAnalyzer" class="form-control">
                                <option >임기주</option>
                                <option >최영훈</option>
                                <option >손정우</option>
                                <option >진우민</option>
                                <option >이미영</option>
                           </select>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                               <div class="col-md-3">
                                  <label>1RPM</label>
                                  <input type="number" name="rpm1" id="rpm1" class="form-control" />
                               </div>
                               <div class="col-md-3">
                                <label>10RPM</label>
                                <input type="number" name="rpm10" id="rpm10" class="form-control" />
                               </div>
                               <div class="col-md-3">
                                <label>30RPM</label>
                                <input type="number" name="rpm30" id="rpm30" class="form-control" />
                               </div>
                               <div class="col-md-3">
                                <label>100RPM</label>
                                <input type="number" name="rpm100" id="rpm100" class="form-control" step="0.1"/>
                               </div>
                       </div></br>

                        <div class="row">
                          <div class="col-md-3">
                             <label>1RPM_2</label>
                             <input type="number" name="rpm1_2" id="rpm1_2" class="form-control" />
                          </div>
                         <div class="col-md-3">
                           <label>10RPM_2</label>
                           <input type="number" name="rpm10_2" id="rpm10_2" class="form-control" />
                         </div>
                         <div class="col-md-3">
                           <label>30RPM_2</label>
                           <input type="number" name="rpm30_2" id="rpm30_2" class="form-control" />
                         </div>
                         <div class="col-md-3">
                           <label>100RPM_2</label>
                           <input type="number" name="rpm100_2" id="rpm100_2" class="form-control" step="0.1" />
                         </div>
                         </div>
                         <br />

                         <div class="row">
                           <div class="col-md-3">
                             <label>탄성 분석원</label>
                             <select name="dssAnalyzer" id="dssAnalyzer" class="form-control">
                                  <option >진우민</option>
                                  <option >최영훈</option>
                                  <option >손정우</option>
                                  <option >임기주</option>
                                  <option >이미영</option>
                             </select>
                           </div>
                           <div class="col-md-3">
                              <label>G' Low</label>
                              <input type="number" name="lowG" id="lowG" class="form-control"/>
                           </div>
                          <div class="col-md-3">
                            <label>G' High</label>
                            <input type="number" name="highG" id="highG" class="form-control"/>
                          </div>
                          <div class="col-md-3">
                            <label>YSP</label>
                            <input type="number" name="ysp" id="ysp" class="form-control" step="0.1"/>
                          </div>
                        </div><br />
                        <div class="row">
                          <div class="col-md-4">
                             <label>G' Low_2</label>
                             <input type="number" name="lowG2" id="lowG2" class="form-control" />
                          </div>
                         <div class="col-md-4">
                           <label>G' High_2</label>
                           <input type="number" name="highG2" id="highG2" class="form-control" />
                         </div>
                         <div class="col-md-4">
                           <label>YSP_2</label>
                           <input type="number" name="ysp2" id="ysp2" class="form-control" step="0.1"/>
                         </div>
                       </div><br />
                          <label>Etc</label>
                          <input type="text" name="etc" id="etc" class="form-control" />
                          <br />
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
            <!-- <div class="card-header">SEM Images</div> -->
            <div class="card-body">
              <h4 id="filehead" style="font-style:italic;"></h4><br>
              <form method="post" id="file_form" enctype="multipart/form-data" action="../dataManage/analysisPt/file_manage.php">
                <?php if ($_SESSION['role_id'] < 3){ ?>
                  <!-- <div class="custom-file">
                    <input type="file" class="custom-file-input" id="semFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div> -->
                  <!-- <input type="file" name="files[]" id="semFile" data-url="../dataManage/analysisPt/uploads/" multiple> -->
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
                  <!-- <p class="fileList"></p> -->
                <?php } ?>
                
                <div>
                  <h6>< Data Files ></h6>
                  <div class="panel-body">
                    <ul class="other-list-group" id="otherfiles" style="padding:0px;">
                    </ul>
                  </div>
                </div>
                <div id="file_message"></div>
                <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" />
                <input type="hidden" name="file-pasteNo" id="file-pasteNo" value="" />
                <input type="hidden" name="file-timeAging" id="file-timeAging" value="" />
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
</div>

 <?php
 require_once('../lib/script_src.php');
 ?>

<script>
  
$(document).ready(function(){
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#PasteTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [[0,'desc'],[1,'asc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [{
    orderable: false,
    targets: [21,22]
    },
    {targets: [2,3,4,5,14,-2],
       visible: false}],

    "ajax" : {
     url:"../dataManage/analysisPt/fetch.php",
     type:"POST"
    },
    dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
         "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
         buttons: ['copy', 'excel',
         {
           extend: 'colvis',
           text: 'Show / Hide columns',
           postfixButtons: [ 'colvisRestore' ]
         }]

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
            url:"../dataManage/analysisPt/edit.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
                  $('#pasteNo').val(data.pasteNo);
                  $('#timeAging').val(data.timeAging);
                  $('#tempAging').val(data.tempAging);
                  $('#preCon').val(data.preCon);
                  $('#dateAnalysis').val(data.dateAnalysis);
                  $('#visAnalyzer').val(data.visAnalyzer);
                  $('#rpm1').val(data.rpm1);
                  $('#rpm10').val(data.rpm10);
                  $('#rpm30').val(data.rpm30);
                  $('#rpm100').val(data.rpm100);
                  $('#rpm1_2').val(data.rpm1_2);
                  $('#rpm10_2').val(data.rpm10_2);
                  $('#rpm30_2').val(data.rpm30_2);
                  $('#rpm100_2').val(data.rpm100_2);
                  $('#dssAnalyzer').val(data.dssAnalyzer);
                  $('#lowG').val(data.lowG);
                  $('#highG').val(data.highG);
                  $('#ysp').val(data.ysp);
                  $('#lowG2').val(data.lowG2);
                  $('#highG2').val(data.highG2);
                  $('#ysp2').val(data.ysp2);
                  $('#etc').val(data.etc);
                  $('#id').val(data.id);
                  $('#insert').val("Update");
                  $('#add_data_Modal').modal('show');
            }
        });
  });
  $('#insert_form').on("submit", function(event){
        event.preventDefault();
        if($('#pasteNo').val() == "")
        {
            alert("Paste No is required");
        }
        else if($('#timeAging').val() == '')
        {
            alert("Aging Time is required");
        }
        else if($('#tempAging').val() == '')
        {
            alert("Aging Temp is required");
        }
        else if($('#dateAnalysis').val() == '')
        {
            alert("분석일자 is required");
        }
        else if($('#visAnalyzer').val() == '')
        {
            alert("점도 분석원 is required");
        }
        else
        {
            $.ajax({
                  url:"../dataManage/analysisPt/insert.php",
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
                        url:"../dataManage/analysisPt/delete.php",
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

  //file button 동작
  $(document).on('click', '.btn_file', function(){
        var id = $(this).attr("id");
        $('#save').val("Save");
        $('#file_form')[0].reset();
        $('#id').val("");
        $('#file-list').text("Select one or more files.");
        $('#otherfiles').html('');
        $('.progress-bar').attr('aria-valuenow', '0').css('width', '0%').text('');
        $.ajax({
                  url:"../dataManage/analysisPt/file_view.php",
                  method:"POST",
                  data:{id:id},
                  dataType:"json",
                  success:function(data){
                        $('#filehead').html(data[0].pasteNo + ' ' + data[0].timeAging + 'hr');
                        var i = Object.keys(data).length;
                        if (data[0].check == 0){ // check가 '0'이면 첨부 파일이 존재함.
                          var otherCount = 0;
                          for(var a = 0; a < i; a++){
                            var fileType = data[a].fileType;
                            if (data[a].fileType === 'image'){
                            } else {
                              $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPt/uploads/' + 
                              data[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                              data[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                              data[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                              otherCount++;
                            }
                          }
                            if (otherCount === 0){
                              $('#otherfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                            }
                        } else { 
                          $('#otherfiles').append('<li class="list-group-item"><div>' + 
                          data[0].fileName + '</div></li>');
                        }
                        $('#file-pasteNo').val(data[0].pasteNo);
                        $('#file-timeAging').val(data[0].timeAging);
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
                url:"../dataManage/analysisPt/file_manage.php",
                method:"POST",
                data:{filename:filename},
                success:function(data){
                  $('#file_message').html('<div class="alert alert-success">'+data+'</div>');
                  $.ajax({
                          url:"../dataManage/analysisPt/file_view.php",
                          method:"POST",
                          data:{id:id},
                          dataType:"json",
                          success:function(data2){
                              $("#otherfiles").html('');
                              var i = Object.keys(data2).length;
                              if (data2[0].check == 0){ // check가 '0'이면 첨부 파일이 존재함.
                                var otherCount = 0;
                                for(var a = 0; a < i; a++){
                                  var fileType = data2[a].fileType;
                                  if (data2[a].fileType === 'image'){
                                    
                                  } else {
                                    $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPt/uploads/' + 
                                    data2[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                                    data2[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                                    data2[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                                    otherCount++;
                                  }
                                }
                                  if (otherCount === 0){
                                    $('#otherfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                                  }
                                } else { 
                                  $('#otherfiles').append('<li class="list-group-item"><div>' + 
                                  data2[0].fileName + '</div></li>');
                              }
                              $('#file-pasteNo').val(data2[0].pasteNo);
                              $('#file-timeAging').val(data2[0].timeAging);
                            }
                      });
                }
           });
    }
  });


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
                  xhr: function(){
                    var xhr = new window.XMLHttpRequest();  
                    xhr.upload.addEventListener('progress',function(e) {
                      if (e.lengthComputable){

                        /* console.log('Bytes Loaded: ' + e.loaded);
                        console.log('Total size: ' + e.total);
                        console.log('Percentage Uploaded: ' + (e.loaded / e.total)); */

                        var percent = Math.round((e.loaded / e.total) * 100);

                        $('.progress-bar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                      }
                    });
                    return xhr;
                  },
                    url:"../dataManage/analysisPt/file_manage.php",
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
                                  url:"../dataManage/analysisPt/file_view.php",
                                  method:"POST",
                                  data:{id:id},
                                  dataType:"json",
                                  success:function(data2){
                                      $("#otherfiles").html('');
                                      var i = Object.keys(data2).length;
                                      if (data2[0].check == 0){ // check가 '0'이면 첨부 파일이 존재함.
                                        var otherCount = 0;
                                        for(var a = 0; a < i; a++){
                                          var fileType = data2[a].fileType;
                                          if (data2[a].fileType === 'image'){
                                          } else {
                                            $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPt/uploads/' + 
                                            data2[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                                            data2[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                                            data2[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                                            otherCount++;
                                          }
                                        }
                                         if (otherCount === 0){
                                            $('#otherfiles').append('<li class="list-group-item"><div>첨부파일 없음</div></li>');
                                          }
                                        } else { 
                                          $('#otherfiles').append('<li class="list-group-item"><div>' + 
                                          data2[0].fileName + '</div></li>');
                                      }
                                      $('#file-pasteNo').val(data2[0].pasteNo);
                                      $('#file-timeAging').val(data2[0].timeAging);
                                    }
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
