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
      <link href="../css/responsive.bootstrap4.min.css" rel="stylesheet"/>

<!--sidebar class에 toggled가 있을 때 사용-->
<style>
footer.sticky-footer {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 30px;
  font-size: 10px;
  background-color: #e9ecef;
}
table {
  font-size: 14px;
}
</style>


</head>
<?php
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){?>
   <body id="page-top">
     <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffde00; height:60px;">
       <a class="navbar-brand" href="" style="font-size:150%; font-weight:600;"><i class="fas fa-database"></i>&nbsp;&nbsp;Silver Powder Database Management</a>
       <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-haspopup="true" aria-expanded="false">
       <span class="navbar-toggler-icon"></span>
       </button>

     <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link active" style="font-weight:500;"><?php echo $_SESSION['id']." : ".$_SESSION['role'];?></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="tooltip" data-placement="bottom" title="Password Change" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-cog"></i>
                 </a>
             </li>
             <li>
             &nbsp; &nbsp; <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#logoutModal">Logout</button>
             </li>
           </ul>
     </div>
     </nav>

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height:40px; padding-left: 40px;">
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
     <div class="collapse navbar-collapse" id="navbarMenu">
       <ul class="navbar-nav">
         <li class="nav-item active">
           <a class="nav-link" href="#" style="width: 90px; margin-right: 30px;">
             <i class="fas fa-home"></i>&nbsp;&nbsp;Home</a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 160px; margin-right: 30px;">
           <i class="fas fa-industry"></i>&nbsp;&nbsp;Mass powder
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <h6 class="dropdown-header">Database</h6>
             <a class="dropdown-item" href="makePwMass.php">Manufacturing</a>
             <a class="dropdown-item" href="analysisPwMass.php">Analysis</a>
             <div class="dropdown-divider"></div>
             <h6 class="dropdown-header">Report</h6>
             <a class="dropdown-item" href="analysisPwMassView.php">Analysis</a>
           </div>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 145px; margin-right: 30px;">
           <i class="fas fa-flask"></i>&nbsp;&nbsp;Lab powder
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <h6 class="dropdown-header">Database</h6>
             <a class="dropdown-item" href=#>Manufacturing</a>
             <a class="dropdown-item" href="conditionOfCoating.php">Coating</a>
             <a class="dropdown-item" href="analysisPw.php">Analysis</a>
             <div class="dropdown-divider"></div>
             <h6 class="dropdown-header">Report</h6>
             <a class="dropdown-item" href="analysisPwView.php">Data Analysis</a>
           </div>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
           style="width: 110px; margin-right: 30px;">
           <i class="fas fa-solar-panel"></i>&nbsp;&nbsp;Paste
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <h6 class="dropdown-header">Database</h6>
             <a class="dropdown-item" href="recipe.php">Recipe</a>
             <a class="dropdown-item" href="listofManu.php">List</a>
             <a class="dropdown-item" href="analysisPt.php">Analysis</a>
             <div class="dropdown-divider"></div>
             <h6 class="dropdown-header">Report</h6>
             <a class="dropdown-item" href="analysisPtView.php">Data Analysis</a>
           </div>
         </li>
       </ul>
     </div>
   </nav> <br>

<div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="card mb-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Mass powder</li>
                <li class="breadcrumb-item">Report</li>
                <li class="breadcrumb-item active" aria-current="page">Data Analysis</li>
              </ol>
            </nav>
          <div class="card-body">
            <?php
            settype($_SESSION['role_id'],'int');
            ?>
            <div class="row justify-content-between">
              <div class="col-4">
                <h3>양산 분말 분석 데이터 정리</h3>
              </div>
            </div> <br>
              <div class="table-responsive">
                 <div id="alert_message"></div>
                <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                 <thead align="center">
                  <tr>
                    <th>Lot<br>No</th>
                    <th>Powder<br>Type</th>
                    <th>특징</th>
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

 <script src="../js/jquery-3.3.1.js"></script>
 <script src="../js/jquery.dataTables.min.js"></script>
 <script src="../js/dataTables.buttons.min.js"></script>
 <script src="../js/buttons.colVis.min.js"></script>
 <script src="../js/buttons.html5.min.js"></script>
 <script src="../js/jszip.min.js"></script>
 <script src="../js/buttons.bootstrap4.min.js"></script>
 <script src="../js/responsive.bootstrap4.min.js"></script>
 <script src="../js/dataTables.responsive.min.js"></script>

 <!-- Bootstrap core JavaScript-->
 <script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
 <!-- Page level plugin JavaScript-->
 <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
 <!-- Custom scripts for all pages-->
 <script src="../js/sb-admin.js"></script>


<script type="text/javascript">
$(document).ready(function(){

  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#PasteTable').DataTable({

    "processing" : true,
    "serverSide" : true,
    "order" : [[0,'desc'],[1,'desc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [
      //{targets: [3,4,7,12,13,14,15,16,17,18,20,-1],
        //   visible: false}
    ],
    "ajax" : {
     url:"../dataManage/analysisPwMassView/fetch.php",
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
