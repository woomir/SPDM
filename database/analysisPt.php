<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

  <title>Silver Powder Database Management</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>
<?php
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){?>
<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand mr-1" href="">Silver Powder Database Management</a>
    <button class="btn btn-link text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
          <ul class="navbar-nav ml-auto">
            <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#logoutModal">Logout</button>
          </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="tablesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-table"></i>
          <span>Database</span></a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Mass Powder</h6>
              <a class="dropdown-item" href=#>Conditions of Manu</a>
              <a class="dropdown-item" href=#>Analysis</a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header">Lab powder</h6>
              <a class="dropdown-item" href=#>Conditions of Manu</a>
              <a class="dropdown-item" href=#>Conditions of Coating</a>
              <a class="dropdown-item" href="analysisPw.php">Analysis</a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header">Paste</h6>
              <a class="dropdown-item" href=#>Recipe</a>
              <a class="dropdown-item" href="listofManu.php">List of Manu</a>
              <a class="dropdown-item" href="analysisPt.php">Analysis</a>
          </div>
      </li>

    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="card mb-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Database</li>
                <li class="breadcrumb-item">Paste</li>
                <li class="breadcrumb-item active" aria-current="page">Analysis</li>
              </ol>
            </nav>
          <div class="card-body">
              <div class="table-responsive">
                <?php
                settype($_SESSION['role_id'],'int');
                ?>
                 <div align="right">
                  <?php if ($_SESSION['role_id']<3){ ?>
                  <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info btn-xs">Add</button>
                <?php } ?>
                 </div>
                 <br />
                 <div id="alert_message"></div>
                <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover">
                 <thead align="center">
                  <tr>
                    <th width="10%">Paste No</th>
                    <th width="">Aging Time</th>
                    <th width="">Aging Temp</th>
                    <th width="">전처리 방법</th>
                    <th width="">분석 일자</th>
                    <th width="">점도 분석원</th>
                    <th width="">1rpm</th>
                    <th width="">10rpm</th>
                    <th width="">30rpm</th>
                    <th width="">100rpm</th>
                    <th width="">1rpm_2</th>
                    <th width="">10rpm_2</th>
                    <th width="">30rpm_2</th>
                    <th width="">100rpm_2</th>
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

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © WOOMIR 2019</span>
          </div>
        </div>
      </footer>

    </div> <!-- /.content-wrapper -->
  </div> <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

<?php }else{ ?>

<!-- invalid access-->
<div class="card card-login mt-5 mx-auto">
     <div class="card text-center">
       <div class="card-header">
         Silver Powder Databases Management
       </div>
       <div class="card-body">
         <h5 class="card-title">Login Failed</h5>
         <p class="card-text">Invaild access</p>
         <a href="../login.html" class="btn btn-primary">Go login</a>
       </div>
     </div>
 </div>
<?php }
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
                         <div class="col-md-3">
                           <label>*Paste No</label>
                           <input type="text" name="pasteNo" id="pasteNo" class="form-control" />
                         </div>
                         <div class="col-md-5">
                           <label>*Aging Time</label>
                           <input type="number" name="timeAging" id="timeAging" class="form-control" placeholder="hr"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Aging Temp</label>
                           <input type="number" name="tempAging" id="tempAging" class="form-control" placeholder="C"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-3">
                           <label>전처리</label>
                           <input type="text" name="preCon" id="preCon" class="form-control" />
                         </div>
                         <div class="col-md-5">
                           <label>*분석일자</label>
                           <input type="date" name="dateAnalysis" id="dateAnalysis" class="form-control" />
                         </div>
                         <div class="col-md-4">
                           <label>*분석원</label>
                           <select name="analyzer" id="analyzer" class="form-control">
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
                          <input type="number" name="rpm100" id="rpm100" class="form-control" />
                        </div>
                        </div>
                        </br>
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
                           <input type="number" name="rpm100_2" id="rpm100_2" class="form-control" />
                         </div>
                         </div>
                         <br />
                         <div class="row">
                           <div class="col-md-4">
                              <label>G' Low</label>
                              <input type="number" name="lowG" id="lowG" class="form-control" />
                           </div>
                          <div class="col-md-4">
                            <label>G'High</label>
                            <input type="number" name="highG" id="highG" class="form-control" />
                          </div>
                          <div class="col-md-4">
                            <label>YSP</label>
                            <input type="number" name="ysp" id="ysp" class="form-control" />
                          </div>
                        </div><br />
                        <div class="row">
                          <div class="col-md-4">
                             <label>G' Low_2</label>
                             <input type="number" name="lowG2" id="lowG2" class="form-control" />
                          </div>
                         <div class="col-md-4">
                           <label>G'High_2</label>
                           <input type="number" name="highG2" id="highG2" class="form-control" />
                         </div>
                         <div class="col-md-4">
                           <label>YSP_2</label>
                           <input type="number" name="ysp2" id="ysp2" class="form-control" />
                         </div>
                       </div><br />
                          <label>Etc</label>
                          <input type="text" name="etc" id="etc" class="form-control" />
                          <br />
                          <input type="hidden" name="id" id="id" />
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


<script>
$(document).ready(function(){
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#PasteTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [[4,'asc']],
    "columnDefs": [{
    orderable: false,
    targets: [21]
  }],
    "ajax" : {
     url:"../dataManage/analysisPt/fetch.php",
     type:"POST"
    }
   });
  }
      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
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
                     $('#analyzer').val(data.analyzer);
                     $('#rpm1').val(data.rpm1);
                     $('#rpm10').val(data.rpm10);
                     $('#rpm30').val(data.rpm30);
                     $('#rpm100').val(data.rpm100);
                     $('#rpm1_2').val(data.rpm1_2);
                     $('#rpm10_2').val(data.rpm10_2);
                     $('#rpm30_2').val(data.rpm30_2);
                     $('#rpm100_2').val(data.rpm100_2);
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
                alert("pasteNo is required");
           }
           else if($('#timeAging').val() == '')
           {
                alert("Aging Time is required");
           }
           else if($('#dateAnalysis').val() == '')
           {
                alert("분석일자 is required");
           }
           else if($('#analyzer').val() == '')
           {
                alert("분석원 is required");
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

 });

</script>
