<?php session_start();?>
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

  <title>Silver Powder Databases Management</title>

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
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="">SPDM</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
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
          <span>Databases</span></a>
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
              <a class="dropdown-item" href=#>Analysis-Mass</a>
              <a class="dropdown-item" href=#>Analysis-Lab</a>
          </div>
      </li>

    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="card mb-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Databases</li>
                <li class="breadcrumb-item">Lab Powder</li>
                <li class="breadcrumb-item active" aria-current="page">Analysis</li>
              </ol>
            </nav>
          <div class="card-body">
            <form method="post" action="../dataManage/analysisPw/delete.php">
              <div class="table-responsive">
                <?php
                settype($_SESSION['role_id'],'int');
                 //var_dump($_POST);
                 //print_r($_POST["database"]);
                 //$_SESSION['database'] = $_POST['database'];
                 //var_dump($_SESSION);
                ?>
                 <div align="right">
                  <?php if ($_SESSION['role_id']<3){ ?>
                  <button type="button" name="add" id="add" class="btn btn-info">Add</button>
                  <?php }
                  if ($_SESSION['role_id']<2){ ?>
                  <button type="submit" name="delete" class="btn btn-danger delete" id="delete">Delete Selected</button>
                  <?php } ?>
                 </div>
                 <br />
                 <div id="alert_message"></div>

                 <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover">
                  <thead>
                   <tr>
                     <th></th>
                     <th>Sample No</th>
                     <th>D10</th>
                     <th>D50</th>
                     <th>D90</th>
                     <th>Dmax</th>
                     <th>Total IGL</th>
                     <th>Excess IGL</th>
                     <th>Coating IGL</th>
                     <th>DTA Peak</th>
                     <th>Enthalphy</th>
                     <th>BET</th>
                     <th>TD</th>
                     <th>XRD</th>
                   </tr>
                   </thead>
                 </table>
              </div>
            </form>
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

<script type="text/javascript" language="javascript" >


 $(document).ready(function(){



  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#PasteTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [[1,'asc']],
    "columnDefs": [{
    orderable: false,
    //className: 'select-checkbox',
    targets: 0}],
    "ajax" : {
     url:"../dataManage/analysisPw/fetch.php",
     type:"POST"
    }
   });
  }


<?php if ($_SESSION['role_id']==1) {
  ?>
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"../dataManage/analysisPw/update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#PasteTable').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
  }, 5000);
 }
  <?php } ?>

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
 });

  $('#add').click(function(){
   var html = '<tr>';
   html += '<td></td>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td contenteditable id="data6"></td>';
   html += '<td contenteditable id="data7"></td>';
   html += '<td contenteditable id="data8"></td>';
   html += '<td contenteditable id="data9"></td>';
   html += '<td contenteditable id="data10"></td>';
   html += '<td contenteditable id="data11"></td>';
   html += '<td contenteditable id="data12"></td>';
   html += '<td contenteditable id="data13"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#PasteTable tbody').prepend(html);
  });

  $(document).on('click', '#insert', function(){
   var sampleNo = $('#data1').text();
   var d10 = $('#data2').text();
   var d50 = $('#data3').text();
   var d90 = $('#data4').text();
   var dmax = $('#data5').text();
   var totalIgl = $('#data6').text();
   var excessIgl = $('#data7').text();
   var coatingIgl = $('#data8').text();
   var dtaPeak = $('#data9').text();
   var enthalphy = $('#data10').text();
   var bet = $('#data11').text();
   var td = $('#data12').text();
   var xrd = $('#data13').text();


   if(sampleNo != '')
   {
    $.ajax({
     url:"../dataManage/analysisPw/insert.php",
     method:"POST",
     data:{
       sampleNo:sampleNo,
       d10:d10,
       d50:d50,
       d90:d90,
       dmax:dmax,
       totalIgl:totalIgl,
       excessIgl:excessIgl,
       coatingIgl:coatingIgl,
       dtaPeak:dtaPeak,
       enthalphy:enthalphy,
       bet:bet,
       td:td,
       xrd:xrd},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#PasteTable').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
   }, 5000);
   }
   else
   {
    alert("Fields is required");
   }
  });
  });

</script>
