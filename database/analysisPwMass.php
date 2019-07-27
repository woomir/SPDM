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
      <th width="">Lot No </th>
      <th>Powder<br>Type</th>
      <th width="">SEM<br />size </th>
      <th width="">STD</th>
      <th width="">D10</th>
      <th width="">D50</th>
      <th width="">D90</th>
      <th width="">Dmax</th>
      <th>응집도</th>
      <th width="">NC-IGL</th>
      <th width="">QC-IGL</th>
      <th width="">T-IGL</th>
      <th width="">P-IGL</th>
      <th width="">C-IGL</th>
      <th width="">DTA Peak</th>
      <th width="">Enthalphy</th>
      <th width="">BET</th>
      <th width="">TD</th>
      <th width="">XRD</th>
      <th width="">R-PCU</th>
      <th width="">NC-PCU</th>
      <th width="">Na</th>
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
      <div class="modal-dialog">
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
                         <input type="text" name="lotNo" id="lotNo" class="form-control" placeholder="ex) 1809BU1CP6"/>
                        </div>
                        <div class="col-md-6">
                          <label>*후처리 공정</label>
                          <div class="classPost">
                            <select name="classPost" id="classPost" class="form-control">
                              <option value="R">Reaction</option>
                              <option value="NC">NC</option>
                              <option value="JET">JET</option>
                              <option value="CL">CL</option>
                              <option value="input">직접입력</option>
                            </select>
                          </div>
                            
                          <!-- <input type="text" name="classPost" id="classPost" class="form-control" placeholder="ex) JET, CL, C-CL, F-CL" /> -->
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6">
                         <label>SEM size</label>
                         <input type="number" name="sizeSem" id="sizeSem" class="form-control" placeholder="&#181;m" step="0.01"/>
                        </div>
                        <div class="col-md-6">
                          <label>STD</label>
                          <input type="number" name="stdSem" id="stdSem" class="form-control" placeholder="&#181;m" step="0.01"/>
                        </div>
                      </div>
                       <br />
                       <div class="row">
                         <div class="col-md-3">
                           <label>D10</label>
                           <input type="number" name="dt" id="dt" class="form-control" placeholder="&#181;m" step="0.001"></input>
                         </div>
                         <div class="col-md-3">
                           <label>D50</label>
                           <input type="number" name="df" id="df" class="form-control" placeholder="&#181;m" step="0.001"></input>
                         </div>
                         <div class="col-md-3">
                           <label>D90</label>
                           <input type="number" name="dn" id="dn" class="form-control" placeholder="&#181;m" step="0.001"></input>
                         </div>
                         <div class="col-md-3">
                           <label>Dmax</label>
                           <input type="number" name="dmax" id="dmax" class="form-control" placeholder="&#181;m" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-4">
                           <label>NC-IGL</label>
                           <input type="number" name="ncIgl" id="ncIgl" class="form-control" placeholder="%" step="0.001"/>
                         </div>
                         <div class="col-md-4">
                           <label>QC-IGL</label>
                           <input type="number" name="qcIgl" id="qcIgl" class="form-control" placeholder="%" step="0.001"/>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-4">
                           <label>T-IGL</label>
                           <input type="number" name="tIgl" id="tIgl" class="form-control" placeholder="%" step="0.001"/>
                         </div>
                         <div class="col-md-4">
                           <label>P-IGL</label>
                           <input type="number" name="pIgl" id="pIgl" class="form-control" placeholder="%" step="0.001"/>
                         </div>
                         <div class="col-md-4">
                           <label>C-IGL</label>
                           <input type="number" name="cIgl" id="cIgl" class="form-control" placeholder="%" step="0.001"/>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-4">
                            <label>DTA Peak</label>
                            <input type="number" name="dtaPeak" id="dtaPeak" class="form-control" placeholder="&#8451;" step="0.1"/>
                         </div>
                         <div class="col-md-4">
                          <label>Enthalphy</label>
                          <input type="number" name="enthalphy" id="enthalphy" class="form-control" placeholder="J/g" step="0.1"/>
                        </div>
                       </div>
                       </br>
                       <div class="row">
                         <div class="col-md-4">
                            <label>BET</label>
                            <input type="number" name="bet" id="bet" class="form-control" placeholder="m&sup2/g" step="0.0001"/>
                         </div>
                         <div class="col-md-4">
                          <label>TD</label>
                          <input type="number" name="td" id="td" class="form-control" step="0.01"/>
                        </div>
                        <div class="col-md-4">
                         <label>XRD</label>
                         <input type="number" name="xrd" id="xrd" class="form-control" placeholder="&#8491;"/>
                        </div>
                       </div></br>
                       <div class="row">
                         <div class="col-md-4">
                            <label>R-PCU (4:1)</label>
                            <input type="number" name="pcuR" id="pcuR" class="form-control"/>
                         </div>
                         <div class="col-md-4">
                          <label>NC-PCU (2:1)</label>
                          <input type="number" name="pcuNc" id="pcuNc" class="form-control"/>
                        </div>
                        <div class="col-md-4">
                         <label>Na</label>
                         <input type="number" name="na" id="na" class="form-control" placeholder="mg/&#8467;"/>
                        </div>
                       </div></br>
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
              <form method="post" id="file_form" enctype="multipart/form-data" action="../dataManage/analysisPwMass/file_manage.php">
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
                <input type="hidden" name="file-lotNo" id="file-lotNo" value="" />
                <input type="hidden" name="file-classPost" id="file-classPost" value="" />
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
  {targets: [3,7,14,15,-2,-3,-5],
       visible: false}],
    "ajax" : {
     url:"../dataManage/analysisPwMass/fetch.php",
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
           $('.classPost').html('<select name="classPost" id="classPost" class="form-control">'+
                              '<option value="R">Reaction</option>'+
                              '<option value="NC">NC</option>'+
                              '<option value="JET">JET</option>'+
                              '<option value="CL">CL</option>'+
                              '<option value="input">직접입력</option>'+
                              '</select>');
      });
      $(document).on('click', '.edit_data', function(){
           $('.classPost').html('<select name="classPost" id="classPost" class="form-control">'+
                              '<option value="R">Reaction</option>'+
                              '<option value="NC">NC</option>'+
                              '<option value="JET">JET</option>'+
                              '<option value="CL">CL</option>'+
                              '<option value="input">직접입력</option>'+
                              '</select>');
           var id = $(this).attr("id");
           $.ajax({
                url:"../dataManage/analysisPwMass/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                    var a = data.classPost;
                     $('#lotNo').val(data.lotNo);
                     if(a!=='CL' && a!=='JET' && a!=='NC' && a!=='R'){
                      $('.classPost').html('<input type="text" name="classPost" id="classPost" class="form-control" placeholder="직접입력" value="'+data.classPost+'"></input>');
                     }else{
                      $('#classPost').val(data.classPost);
                     }
                     $('#sizeSem').val(data.sizeSem);
                     $('#stdSem').val(data.stdSem);
                     $('#dt').val(data.d10);
                     $('#df').val(data.d50);
                     $('#dn').val(data.d90);
                     $('#dmax').val(data.dmax);
                     $('#ncIgl').val(data.ncIgl);
                     $('#qcIgl').val(data.qcIgl);
                     $('#tIgl').val(data.tIgl);
                     $('#pIgl').val(data.pIgl);
                     $('#cIgl').val(data.cIgl);
                     $('#dtaPeak').val(data.dtaPeak);
                     $('#enthalphy').val(data.enthalphy);
                     $('#bet').val(data.bet);
                     $('#td').val(data.td);
                     $('#xrd').val(data.xrd);
                     $('#pcuR').val(data.pcuR);
                     $('#pcuNc').val(data.pcuNc);
                     $('#na').val(data.na);
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
           else if($('#classPost').val() == '')
           {
                alert("후처리 공정 is required");
           }
           else
           {
                $.ajax({
                     url:"../dataManage/analysisPwMass/insert.php",
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
                           url:"../dataManage/analysisPwMass/delete.php",
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
      $('#savedfiles').html('');
      $('#otherfiles').html('');
      $('.progress-bar').attr('aria-valuenow', '0').css('width', '0%').text('');
      $.ajax({
                url:"../dataManage/analysisPwMass/file_view.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                      $('#filehead').html(data[0].lotNo + ' ' + data[0].classPost);
                      var i = Object.keys(data).length;
                      if (data[0].check == 0){ // check가 '0'이면 첨부 파일이 존재함.
                        var imageCount = 0;
                        var otherCount = 0;
                        for(var a = 0; a < i; a++){
                          var fileType = data[a].fileType;
                          if (data[a].fileType === 'image'){
                            $('#savedfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPwMass/uploads/' + 
                            data[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                            data[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                            data[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                            imageCount++;
                          } else {
                            $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPwMass/uploads/' + 
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
                      $('#file-lotNo').val(data[0].lotNo);
                      $('#file-classPost').val(data[0].classPost);
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
                url:"../dataManage/analysisPwMass/file_manage.php",
                method:"POST",
                data:{filename:filename},
                success:function(data){
                  // console.log(data);
                  $('#file_message').html('<div class="alert alert-success">'+data+'</div>');
                  $.ajax({
                          url:"../dataManage/analysisPwMass/file_view.php",
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
                                    $('#savedfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPwMass/uploads/' + 
                                    data2[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                                    data2[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                                    data2[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                                    imageCount++;
                                  } else {
                                    $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPwMass/uploads/' + 
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
                              $('#file-lotNo').val(data2[0].lotNo);
                              $('#file-classPost').val(data2[0].classPost);
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
                    url:"../dataManage/analysisPwMass/file_manage.php",
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
                                  url:"../dataManage/analysisPwMass/file_view.php",
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
                                            $('#savedfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPwMass/uploads/' + 
                                            data2[a].fileName + '" class="fileList-fileName" style="color:black;" download>' + 
                                            data2[a].fileName + '</a><div class="pull-right action buttons" style="display:inline; padding: 20px;"><a href="#" class="file-delete" name="' +
                                            data2[a].fileName + '" style="color:black; "><i class="fas fa-trash-alt"></i></a></div></li>');
                                            imageCount++;
                                          } else {
                                            $('#otherfiles').append('<li class="list-group-item"><div><a href="../dataManage/analysisPwMass/uploads/' + 
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
                                      $('#file-lotNo').val(data2[0].lotNo);
                                      $('#file-classPost').val(data2[0].classPost);
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

    $(document).on("change","#classPost",function(){
      var value = $('#classPost').val();
      if (value == "input"){
        $('.classPost').html('<input type="text" name="classPost" id="classPost" class="form-control" placeholder="직접입력"></input>');
      }
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
