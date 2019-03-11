<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">

  <title>Silver Powder Database Management</title>

      <!-- Custom fonts for this template-->
      <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="../css/bootstrap.css" rel="stylesheet"/>
      <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
      <link href="../css/buttons.bootstrap4.min.css" rel="stylesheet"/>

<!--sidebar class에 toggled가 있을 때 사용-->
<style>
footer.sticky-footer {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  position: fixed;
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
          <a class="dropdown-item" href="recipe.php">Recipe</a>
          <a class="dropdown-item" href="listofManu.php">List of Manu</a>
          <a class="dropdown-item" href="analysisPt.php">Analysis</a>
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
                <li class="breadcrumb-item active" aria-current="page">Recipe</li>
              </ol>
            </nav>
          <div class="card-body">
            <?php
            settype($_SESSION['role_id'],'int');
            ?>
            <div class="row justify-content-between">
              <div class="col-4">
                <h3>Paste 배합 조건</h3>
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
                    <th>Recipe<br />Name</th>
                    <th>Binder1</th>
                    <th>Binder1<br>ratio</th>
                    <th>Binder2</th>
                    <th>Binder2<br>ratio</th>
                    <th>Binder3</th>
                    <th>Binder3<br>ratio</th>
                    <th>Solvent1</th>
                    <th>Solvent1<br>ratio</th>
                    <th>Solvent2</th>
                    <th>Solvent2<br>ratio</th>
                    <th>Solvent3</th>
                    <th>Solvent3<br>ratio</th>
                    <th>Solvent4</th>
                    <th>Solvent4<br>ratio</th>
                    <th>Additive1</th>
                    <th>Additive1<br>ratio</th>
                    <th>Additive2</th>
                    <th>Additive2<br>ratio</th>
                    <th>Additive3</th>
                    <th>Additive3<br>ratio</th>
                    <th>Additive4</th>
                    <th>Additive4<br>ratio</th>
                    <th>Additive5</th>
                    <th>Additive5<br>ratio</th>
                    <th>Additive6</th>
                    <th>Additive6<br>ratio</th>
                    <th>G/F1</th>
                    <th>G/F1<br>ratio</th>
                    <th>G/F2</th>
                    <th>G/F2<br>ratio</th>
                    <th>Powder<br>ratio</th>
                    <th>Etc</th>
                    <th>Edit</th>
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
                         <div class="col-md-12">
                           <label>*Recipe Name</label>
                           <input type="text" name="nameRecipe" id="nameRecipe" class="form-control" />
                         </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-md-8">
                           <label>*Binder1</label>
                           <input type="text" name="nameBinder1" id="nameBinder1" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>*Binder1 ratio</label>
                           <input type="number" name="ratioBinder1" id="ratioBinder1" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Binder2</label>
                           <input type="text" name="nameBinder2" id="nameBinder2" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Binder2 ratio</label>
                           <input type="number" name="ratioBinder2" id="ratioBinder2" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Binder3</label>
                           <input type="text" name="nameBinder3" id="nameBinder3" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Binder3 ratio</label>
                           <input type="number" name="ratioBinder3" id="ratioBinder3" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>*Solvent1</label>
                           <input type="text" name="nameSolvent1" id="nameSolvent1" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>*Solvent1 ratio</label>
                           <input type="number" name="ratioSolvent1" id="ratieSolvent1" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Solvent2</label>
                           <input type="text" name="nameSolvent2" id="nameSolvent2" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Solvent2 ratio</label>
                           <input type="number" name="ratioSolvent2" id="ratioSolvent2" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Solvent3</label>
                           <input type="text" name="nameSolvent3" id="nameSolvent3" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Solvent3 ratio</label>
                           <input type="number" name="ratioSolvent3" id="ratioSolvent3" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Solvent4</label>
                           <input type="text" name="nameSolvent4" id="nameSolvent4" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Solvent4 ratio</label>
                           <input type="number" name="ratioSolvent4" id="ratioSolvent4" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>*Additive1</label>
                           <input type="text" name="nameAdd1" id="nameAdd1" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>*Additive1 ratio</label>
                           <input type="number" name="ratioAdd1" id="ratioAdd1" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Additive2</label>
                           <input type="text" name="nameAdd2" id="nameAdd2" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Additive2 ratio</label>
                           <input type="number" name="ratioAdd2" id="ratioAdd2" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Additive3</label>
                           <input type="text" name="nameAdd3" id="nameAdd3" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Additive3 ratio</label>
                           <input type="number" name="ratioAdd3" id="ratioAdd3" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Additive4</label>
                           <input type="text" name="nameAdd4" id="nameAdd4" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Additive4 ratio</label>
                           <input type="number" name="ratioAdd4" id="ratioAdd4" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Additive5</label>
                           <input type="text" name="nameAdd5" id="nameAdd5" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Additive5 ratio</label>
                           <input type="number" name="ratioAdd5" id="ratioAdd5" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>Additive6</label>
                           <input type="text" name="nameAdd6" id="nameAdd6" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>Additive6 ratio</label>
                           <input type="number" name="ratioAdd6" id="ratioAdd6" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>*G/F1</label>
                           <input type="text" name="nameGF1" id="nameGF1" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>*G/F1 ratio</label>
                           <input type="number" name="ratioGF1" id="ratioGF1" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-8">
                           <label>G/F2</label>
                           <input type="text" name="nameGF2" id="nameGF2" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>G/F2 ratio</label>
                           <input type="number" name="ratioGF2" id="ratioGF2" class="form-control" step="0.01"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-4">
                           <label>*Powder ratio</label>
                           <input type="number" name="ratioPw" id="ratioPw" class="form-control" step="0.01"></input>
                         </div>
                         <div class="col-md-8">
                         <label>Etc</label>
                         <input type="text" name="etc" id="etc" class="form-control" />
                         </div>
                       </div>
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
    "columnDefs": [{
    orderable: false,
    targets: [32,33]
  },
  {targets: [5,6,13,14,25,26,29,30,32],
       visible: false}],
    "ajax" : {
     url:"../dataManage/recipe/fetch.php",
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
                url:"../dataManage/recipe/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#nameRecipe').val(data.nameRecipe);
                     $('#nameBinder1').val(data.nameBinder1);
                     $('#ratioBinder1').val(data.ratioBinder1);
                     $('#nameBinder2').val(data.nameBinder2);
                     $('#ratioBinder2').val(data.ratioBinder2);
                     $('#nameBinder3').val(data.nameBinder3);
                     $('#ratioBinder3').val(data.ratioBinder3);
                     $('#nameSolvent1').val(data.nameSolvent1);
                     $('#ratioSolvent1').val(data.ratioSolvent1);
                     $('#nameSolvent2').val(data.nameSolvent2);
                     $('#ratioSolvent2').val(data.ratioSolvent2);
                     $('#nameSolvent3').val(data.nameSolvent3);
                     $('#ratioSolvent3').val(data.ratioSolvent3);
                     $('#nameSolvent4').val(data.nameSolvent4);
                     $('#ratioSolvent4').val(data.ratioSolvent4);
                     $('#nameAdd1').val(data.nameAdd1);
                     $('#ratioAdd1').val(data.ratioAdd1);
                     $('#nameAdd2').val(data.nameAdd2);
                     $('#ratioAdd2').val(data.ratioAdd2);
                     $('#nameAdd3').val(data.nameAdd3);
                     $('#ratioAdd3').val(data.ratioAdd3);
                     $('#nameAdd4').val(data.nameAdd4);
                     $('#ratioAdd4').val(data.ratioAdd4);
                     $('#nameAdd5').val(data.nameAdd5);
                     $('#ratioAdd5').val(data.ratioAdd5);
                     $('#nameAdd6').val(data.nameAdd6);
                     $('#ratioAdd6').val(data.ratioAdd6);
                     $('#nameGF1').val(data.nameGF1);
                     $('#ratioGF1').val(data.ratioGF1);
                     $('#nameGF2').val(data.nameGF2);
                     $('#ratioGF2').val(data.ratioGF2);
                     $('#ratioPw').val(data.ratioPw);
                     $('#etc').val(data.etc);
                     $('#id').val(data.id);
                     $('#insert').val("Update");
                     $('#add_data_Modal').modal('show');
                }
           });
      });
      $('#insert_form').on("submit", function(event){
           event.preventDefault();
           if($('#nameRecipe').val() == "")
           {
                alert("Recipe Name is required");
           }
           else if($('#nameBinder1').val() == '')
           {
                alert("Binder1 is required");
           }
           else if($('#ratioBinder1').val() == '')
           {
                alert("Binder1 ratio is required");
           }
           else if($('#nameSolvent1').val() == '')
           {
                alert("Solvent1 is required");
           }
           else if($('#ratioSolvent1').val() == '')
           {
                alert("Solvent1 ratio is required");
           }
           else if($('#nameAdd1').val() == '')
           {
                alert("Additive1 is required");
           }
           else if($('#ratioAdd1').val() == '')
           {
                alert("Additive1 ratio is required");
           }
           else if($('#nameGF1').val() == '')
           {
                alert("GF1 is required");
           }
           else if($('#ratioGF1').val() == '')
           {
                alert("GF1 ratio is required");
           }
           else if($('#ratioPw').val() == '')
           {
                alert("Powder ratio is required");
           }
           else
           {
                $.ajax({
                     url:"../dataManage/recipe/insert.php",
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
                           url:"../dataManage/recipe/delete.php",
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
