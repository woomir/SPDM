<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Silver Powder Database Management</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/bootstrap.css" rel="stylesheet"/>
  <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
  <link href="../css/buttons.bootstrap4.min.css" rel="stylesheet"/>
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

  <style>
  footer.sticky-footer {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    position: absolute;
    right: 0;
    bottom: 0;
    width: calc(100% - 90px);
    height: 80px;
    background-color: #e9ecef;
  }
  body.sidebar-toggled footer.sticky-footer {
    width: calc(100% - 225px);
  }
  table {
    font-size: 14px;
  }
  </style>

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
            <li class="nav-item">
                <a class="nav-link active mb-0" href=""><?php echo $_SESSION['id']." : ".$_SESSION['role'];?></a>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="tooltip" data-placement="bottom" title="Password Change" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog"></i>
                </a>
            </li>
            &nbsp &nbsp <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#logoutModal">Logout</button>
          </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav toggled">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="tablesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-table"></i>
          <span>Database</span></a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Mass Powder</h6>
              <a class="dropdown-item" href=#>Conditions of Manu</a>
              <a class="dropdown-item" href="analysisPwMass.php">Analysis</a>
              <div class="dropdown-divider"></div>
              <h6 class="dropdown-header">Lab Powder</h6>
              <a class="dropdown-item" href=#>Conditions of Manu</a>
              <a class="dropdown-item" href="conditionOfCoating.php">Conditions of Coating</a>
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
                <li class="breadcrumb-item">Databases</li>
                <li class="breadcrumb-item">Mass Powder</li>
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
                      <th width="">Lot No </th>
                      <th width="">후처리<br />공정</th>
                      <th width="">SEM<br />size </th>
                      <th width="">STD</th>
                      <th width="">D10</th>
                      <th width="">D50</th>
                      <th width="">D90</th>
                      <th width="">Dmax</th>
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
         <a href="../index.html" class="btn btn-primary">Go login</a>
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
                        <div class="col-md-6">
                         <label>*Lot No</label>
                         <input type="text" name="lotNo" id="lotNo" class="form-control" placeholder="ex) 1809BU1CP6"/>
                        </div>
                        <div class="col-md-6">
                          <label>*후처리 공정</label>
                          <input type="text" name="classPost" id="classPost" class="form-control" placeholder="ex) JET, CL, C-CL, F-CL" />
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
                          <input type="number" name="td" id="td" class="form-control" step="0.1"/>
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

 <script src="../js/jquery-3.3.1.js"></script>
 <script src="../js/jquery.dataTables.min.js"></script>
 <script src="../js/dataTables.buttons.min.js"></script>
 <script src="../js/buttons.colVis.min.js"></script>
 <script src="../js/buttons.html5.min.js"></script>
 <script src="../js/jszip.min.js"></script>
 <script src="../js/buttons.bootstrap4.min.js"></script>

 <!-- Bootstrap core JavaScript-->
 <script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
 <!-- Page level plugin JavaScript-->
 <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
 <!-- Custom scripts for all pages-->
 <script src="../js/sb-admin.js"></script>


<script>
$(document).ready(function(){
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#PasteTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [[0,'desc'],[1,'asc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "columnDefs": [{
    orderable: false,
    targets: [21,22]
  }],
    "ajax" : {
     url:"../dataManage/analysisPwMass/fetch.php",
     type:"POST"
    },
    dom: "<'row'<'col-sm-12 col-md-auto'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 ml-auto'f>>" +
         "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
         buttons: ['copy', 'excel',
         {
           extend: 'colvis',
           text: 'Show / Hide columns'
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
                url:"../dataManage/analysisPwMass/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#lotNo').val(data.lotNo);
                     $('#classPost').val(data.classPost);
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

 });

 //Dropdown버튼의 속도 조절
  $('.dropdown').on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
  });

  $('.dropdown').on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>
