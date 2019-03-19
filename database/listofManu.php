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
  height: 50px;
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
  <nav class="navbar navbar-expand navbar-light" style="background-color: #ffde00; height:60px;">
    <a class="navbar-brand mr-2" href="" style="font-size:150%; font-weight:600;"><i class="fas fa-database"></i>&nbsp;&nbsp;Silver Powder Database Management</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active mb-0" style="font-weight:500;"><?php echo $_SESSION['id']." : ".$_SESSION['role'];?></a>
          </li>
          <li class="nav-item no-arrow">
              <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="tooltip" data-placement="bottom" title="Password Change" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i>
              </a>
          </li>
          &nbsp; &nbsp; <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#logoutModal">Logout</button>
        </ul>
  </nav>

  <nav class="navbar navbar-expand navbar-dark bg-dark" style="height:40px; padding-left: 80px;">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 160px; margin-right: 30px;">
        <i class="fas fa-industry"></i>&nbsp;&nbsp;Mass powder
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="makePwMass.php">Conditions of Manu</a>
          <a class="dropdown-item" href="analysisPwMass.php">Analysis</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 145px; margin-right: 30px;">
        <i class="fas fa-flask"></i>&nbsp;&nbsp;Lab powder
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href=#>Conditions of Manu</a>
          <a class="dropdown-item" href="conditionOfCoating.php">Conditions of Coating</a>
          <a class="dropdown-item" href="analysisPw.php">Analysis</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 110px; margin-right: 30px;">
        <i class="fas fa-solar-panel"></i>&nbsp;&nbsp;Paste
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <h6 class="dropdown-header">Database</h6>
          <a class="dropdown-item" href="recipe.php">Recipe</a>
          <a class="dropdown-item" href="listofManu.php">List of Manu</a>
          <a class="dropdown-item" href="analysisPt.php">Analysis</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Report</h6>
          <a class="dropdown-item" href="analysisPtView.php">Analysis</a>
          <a class="dropdown-item disabled" href="#">Chart (preparing)</a>
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
                <li class="breadcrumb-item">Databases</li>
                <li class="breadcrumb-item">Paste</li>
                <li class="breadcrumb-item active" aria-current="page">List of Manu</li>
              </ol>
            </nav>
          <div class="card-body">
            <?php
            settype($_SESSION['role_id'],'int');
            ?>
            <div class="row justify-content-between">
              <div class="col-4">
                <h3>Paste 제조 일지</h3>
              </div>
              <div align="col-4">
               <?php if ($_SESSION['role_id']<3){ ?>
               <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info btn-xs">Add</button>&nbsp;&nbsp;&nbsp;
             <?php } ?>
              </div>
            </div> <br>
              <div class="table-responsive">
                 <div id="alert_message"></div>
                <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover">
                 <thead align="center">
                  <tr>
                    <th width="">Paste No</th>
                    <th width="">Powder Lot</th>
                    <th width="">Powder type</th>
                    <th width="">Date</th>
                    <th width="">Maker</th>
                    <th>Object</th>
                    <th width="">Amount</th>
                    <th width="">Recipe</th>
                    <th>Etc</th>
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
                         <div class="col-md-3">
                           <label>*Paste No</label>
                           <input type="text" name="pasteNo" id="pasteNo" class="form-control" />
                         </div>
                         <div class="col-md-5">
                           <label>*Powder Lot</label>
                           <input type="text" name="powderLot" id="powderLot" class="form-control" placeholder="ex) 1809BU1CP6"></input>
                         </div>
                         <div class="col-md-4">
                           <label>*Powder Type</label>
                           <input type="text" name="powderType" id="powderType" class="form-control" value="JET"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-6">
                           <label>*제조일자</label>
                           <input type="date" name="dateMake" id="dateMake" class="form-control" value="<?php echo date("Y-m-d");?>"/>
                         </div>
                         <div class="col-md-3">
                           <label>*Maker</label>
                           <select name="maker" id="maker" class="form-control">
                                <option >임기주</option>
                                <option >최영훈</option>
                                <option >손정우</option>
                           </select>
                         </div>
                         <div class="col-md-3">
                           <label>*Amount</label>
                           <input type="number" name="amount" id="amount" class="form-control" min="100" max="500" value="200" />
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                            <label>*Object</label>
                            <input type="text" name="object" id="object" class="form-control" />
                         </div>
                         <div class="col-md-4">
                          <label>*Recipe</label>
                          <select name="recipe" id="recipe" class="form-control">
                               <option >H0125-F01</option>
                               <option >S2Y9</option>
                               <option >HS6A4</option>
                          </select>
                        </div>
                       </div>
                       </br>
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
    "order" : [[0,'desc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [{
    orderable: false,
    targets: [8,9],
    }],
    "ajax" : {
     url:"../dataManage/listofManu/fetch.php",
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
                url:"../dataManage/listofManu/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#pasteNo').val(data.pasteNo);
                     $('#powderLot').val(data.powderLot);
                     $('#powderType').val(data.powderType);
                     $('#dateMake').val(data.dateMake);
                     $('#maker').val(data.maker);
                     $('#object').val(data.object);
                     $('#amount').val(data.amount);
                     $('#recipe').val(data.recipe);
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
           else if($('#powderLot').val() == '')
           {
                alert("powderLot is required");
           }
           else if($('#powderType').val() == '')
           {
                alert("powderType is required");
           }
           else if($('#dateMake').val() == '')
           {
                alert("dateMake is required");
           }
           else if($('#maker').val() == '')
           {
                alert("maker is required");
           }
           else if($('#object').val() == '')
           {
                alert("object is required");
           }
           else if($('#amount').val() == '')
           {
                alert("amount is required");
           }
           else if($('#recipe').val() == '')
           {
                alert("recipe is required");
           }
           else
           {
                $.ajax({
                     url:"../dataManage/listofManu/insert.php",
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
                           url:"../dataManage/listofManu/delete.php",
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
