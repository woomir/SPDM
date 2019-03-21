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
             <a class="dropdown-item" href="makePwMass.php">Conditions of Manu</a>
             <a class="dropdown-item" href="analysisPwMass.php">Analysis</a>
           </div>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 145px; margin-right: 30px;">
           <i class="fas fa-flask"></i>&nbsp;&nbsp;Lab powder
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href=#>Conditions of Manu</a>
             <a class="dropdown-item" href="conditionOfCoating.php">Conditions of Coating</a>
             <a class="dropdown-item" href="analysisPw.php">Analysis</a>
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
                <li class="breadcrumb-item">Mass Powder</li>
                <li class="breadcrumb-item active" aria-current="page">Conditions of Manu</li>
              </ol>
            </nav>
          <div class="card-body">
            <?php
            settype($_SESSION['role_id'],'int');
            ?>
            <div class="row justify-content-between">
              <div class="col-4">
                <h3>양산 분말 제조 조건</h3>
              </div>
              <div align="col-4">
               <?php if ($_SESSION['role_id']<3){ ?>
               <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info btn-xs">Add</button>&nbsp;&nbsp;&nbsp;
             <?php } ?>
              </div>
            </div>
            <br>
              <div class="table-responsive">
                <div id="alert_message"></div>
                <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                 <thead align="center">
                  <tr>
                    <th width="">Lot<br>No</th>
                    <th width="">제품<br>분류</th>
                    <th width="">특징</th>
                    <th width="">코팅제1</th>
                    <th width="">코팅제1<br>비율</th>
                    <th width="">코팅제2 </th>
                    <th width="">코팅제2<br>비율</th>
                    <th width="">SAPA<br>비율</th>
                    <th width="">코팅온도</th>
                    <th>해쇄<br>투입속도</th>
                    <th>해쇄압</th>
                    <th>해쇄<br>회수율</th>
                    <th>미분<br>회수율</th>
                    <th>조분<br>회수율</th>
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
                         <div class="col-md-4">
                           <label>*Lot No</label>
                           <input type="text" name="lotNo" id="lotNo" class="form-control" />
                         </div>
                         <div class="col-md-4">
                           <label>*제품 분류</label>
                           <input type="text" name="nameProduct" id="nameProduct" class="form-control"></input>
                         </div>
                         <div class="col-md-4">
                           <label>*특징</label>
                           <input type="text" name="characteristic" id="characteristic" class="form-control"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-3">
                            <label>코팅제1</label>
                            <input type="text" name="nameLubricant1" id="nameLubricant1" class="form-control" />
                         </div>
                         <div class="col-md-3">
                          <label>코팅제1 비율</label>
                          <input type="number" name="ratioLubricant1" id="ratioLubricant1" class="form-control" placeholder="wt% / Ag" step="0.01"/>
                        </div>
                        <div class="col-md-3">
                           <label>코팅제2</label>
                           <input type="text" name="nameLubricant2" id="nameLubricant2" class="form-control" />
                        </div>
                        <div class="col-md-3">
                         <label>코팅제2 비율</label>
                         <input type="number" name="ratioLubricant2" id="ratioLubricant2" class="form-control" placeholder="wt% / Ag" step="0.01" />
                       </div>
                       </div>
                       </br>

                       <div class="row">
                         <div class="col-md-3">
                           <label>SAPA 비율</label>
                            <input type="text" name="ratioSAPA" id="ratioSAPA" class="form-control" value="2:1"/>
                         </div>
                         <div class="col-md-3">
                          <label>코팅온도</label>
                          <input type="number" name="tempCoating" id="tempCoating" class="form-control" placeholder="&#8451;"/>
                        </div>
                        <div class="col-md-3">
                          <label>해쇄 투입속도</label>
                           <input type="number" name="rateAddJet" id="rateAddJet" class="form-control" placeholder="Hz" step="0.1"/>
                        </div>
                        <div class="col-md-3">
                         <label>해쇄압</label>
                         <input type="number" name="pressureJet" id="pressureJet" class="form-control" placeholder="bar" step="0.1"/>
                       </div>
                       </div>
                       </br>
                       <div class="row">
                        <div class="col-md-4">
                         <label>해쇄 회수율</label>
                         <input type="number" name="yieldJet" id="yieldJet" class="form-control" placeholder="%" step="0.1"/>
                       </div>
                        <div class="col-md-4">
                          <label>미분 회수율</label>
                          <input type="number" name="yieldSmall" id="yieldSmall" class="form-control" placeholder="%" step="0.1"/>
                        </div>
                        <div class="col-md-4">
                          <label>조분 회수율</label>
                          <input type="number" name="yieldBig" id="yieldBig" class="form-control" placeholder="%" step="0.1"/>
                        </div>
                       </div>
                       </br>
                       <div class="row">
                       <div class="col-md-12">
                         <label>Etc</label>
                         <input type="text" name="etc" id="etc" class="form-control" />
                      </div>
                       </div>
                       </br>
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
    targets: [11,12]
    }],
    "ajax" : {
     url:"../dataManage/makePwMass/fetch.php",
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
            {targets: [-2],
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
                url:"../dataManage/makePwMass/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#lotNo').val(data.lotNo);
                     $('#nameProduct').val(data.nameProduct);
                     $('#characteristic').val(data.characteristic);
                     $('#nameLubricant1').val(data.nameLubricant1);
                     $('#ratioLubricant1').val(data.ratioLubricant1);
                     $('#nameLubricant2').val(data.nameLubricant2);
                     $('#ratioLubricant2').val(data.ratioLubricant2);
                     $('#ratioSAPA').val(data.ratioSAPA);
                     $('#tempCoating').val(data.tempCoating);
                     $('#rateAddJet').val(data.rateAddJet);
                     $('#pressureJet').val(data.pressureJet);
                     $('#yieldJet').val(data.yieldJet);
                     $('#yieldSmall').val(data.yieldSmall);
                     $('#yieldBig').val(data.yieldBig);
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
           else if($('#nameProduct').val() == '')
           {
                alert("제품 분류 is required");
           }
           else if($('#characteristic').val() == '')
           {
                alert("특징 is required");
           }
           else
           {
                $.ajax({
                     url:"../dataManage/makePwMass/insert.php",
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
                           url:"../dataManage/makePwMass/delete.php",
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
