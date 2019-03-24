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
      <th width="">Sample No </th>
      <th width="">Powder Type </th>
      <th width="">D10 </th>
      <th width="">D50 </th>
      <th width="">D90 </th>
      <th width="">Dmax</th>
      <th width="">T-IGL</th>
      <th width="">P-IGL</th>
      <th width="">C-IGL</th>
      <th width="">DTA Peak</th>
      <th width="">Enthalphy</th>
      <th width="">BET</th>
      <th width="">TD</th>
      <th width="">XRD</th>
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
                         <label>*Sample No</label>
                         <input type="text" name="sampleNo" id="sampleNo" class="form-control" />
                        </div>
                        <div class="col-md-6">
                          <label>*Powder Type</label>
                          <input type="text" name="powderType" id="powderType" class="form-control" value="JET"/>
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
                          <input type="number" name="td" id="td" class="form-control" step="0.1"/>
                        </div>
                        <div class="col-md-4">
                         <label>XRD</label>
                         <input type="number" name="xrd" id="xrd" class="form-control" placeholder="&#8491;"/>
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
    "order" : [[0,'desc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [{
    orderable: false,
    targets: [14,15]
  },
  {targets: [5,9,10,-2],
       visible: false}],
    "ajax" : {
     url:"../dataManage/analysisPw/fetch.php",
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
                url:"../dataManage/analysisPw/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#sampleNo').val(data.sampleNo);
                     $('#powderType').val(data.powderType);
                     $('#dt').val(data.d10);
                     $('#df').val(data.d50);
                     $('#dn').val(data.d90);
                     $('#dmax').val(data.dmax);
                     $('#tIgl').val(data.tIgl);
                     $('#pIgl').val(data.pIgl);
                     $('#cIgl').val(data.cIgl);
                     $('#dtaPeak').val(data.dtaPeak);
                     $('#enthalphy').val(data.enthalphy);
                     $('#bet').val(data.bet);
                     $('#td').val(data.td);
                     $('#xrd').val(data.xrd);
                     $('#etc').val(data.etc);
                     $('#id').val(data.id);
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
           else if($('#powderType').val() == '')
           {
                alert("Powder Type is required");
           }
           else
           {
                $.ajax({
                     url:"../dataManage/analysisPw/insert.php",
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
                           url:"../dataManage/analysisPw/delete.php",
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

 });
</script>
