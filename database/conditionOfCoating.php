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
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <h6 class="dropdown-header">Database</h6>
             <a class="dropdown-item" href="makePwMass.php">Conditions of Manu</a>
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
             <a class="dropdown-item" href=#>Conditions of Manu</a>
             <a class="dropdown-item" href="conditionOfCoating.php">Conditions of Coating</a>
             <a class="dropdown-item" href="analysisPw.php">Analysis</a>
             <div class="dropdown-divider"></div>
             <h6 class="dropdown-header">Report</h6>
             <a class="dropdown-item" href="analysisPwView.php">Analysis</a>
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
                <li class="breadcrumb-item">Lab Powder</li>
                  <li class="breadcrumb-item">Database</li>
                <li class="breadcrumb-item active" aria-current="page">Conditions of Coating</li>
              </ol>
            </nav>
          <div class="card-body">
            <?php
            settype($_SESSION['role_id'],'int');
            ?>
            <div class="row justify-content-between">
              <div class="col-4">
                <h3>Lab 코팅 조건</h3>
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
                    <th width="">Sample<br>No</th>
                    <th width="">Concept</th>
                    <th width="">Date</th>
                    <th width="">Lot<br>No</th>
                    <th width="">Amount</th>
                    <th width="">세척<br>조건</th>
                    <th width="">환원제</th>
                    <th width="">환원제<br>비율</th>
                    <th width="">환원제<br>사용량</th>
                    <th width="">환원제<br>Lot</th>
                    <th width="">Amine</th>
                    <th width="">Amine<br>사용량</th>
                    <th width="">코팅제1</th>
                    <th width="">코팅제1<br>비율</th>
                    <th width="">코팅제1<br>사용량</th>
                    <th width="">코팅제2 </th>
                    <th width="">코팅제2<br>비율</th>
                    <th width="">코팅제2<br>사용량</th>
                    <th width="">SA<br>비율</th>
                    <th width="">PA<br>비율</th>
                    <th width="">SA<br>사용량</th>
                    <th width="">PA<br>사용량</th>
                    <th width="">코팅제<br>용매종류</th>
                    <th width="">코팅제<br>용매사용량</th>
                    <th width="">코팅제<br>용액온도</th>
                    <th>첨가제</th>
                    <th>첨가제<br>비율</th>
                    <th>첨가제<br>사용량</th>
                    <th width="">분말분산<br>용매</th>
                    <th width="">분말분산<br>용매사용량</th>
                    <th width="">투입순서</th>
                    <th width="">코팅온도</th>
                    <th width="">교반속도</th>
                    <th width="">분말<br>Time</th>
                    <th width="">환원제<br>Time</th>
                    <th width="">Amine<br>Time</th>
                    <th width="">코팅1<br>Time</th>
                    <th width="">코팅2<br>Time</th>
                    <th width="">분말<br>전도도</th>
                    <th width="">분말<br>온도</th>
                    <th width="">코팅 전<br>pH</th>
                    <th width="">실험담당자</th>
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
                         <div class="col-md-6">
                           <label>*Sample No</label>
                           <input type="text" name="sampleNo" id="sampleNo" class="form-control" />
                         </div>
                         <div class="col-md-6">
                           <label>*Concept</label>
                           <input type="text" name="concept" id="concept" class="form-control"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-5">
                           <label>*제조일자</label>
                           <input type="date" name="dateMake" id="dateMake" class="form-control" value="<?php echo date("Y-m-d");?>"/>
                         </div>
                         <div class="col-md-4">
                           <label>*Lot No</label>
                           <input type="text" name="ncpwLot" id="ncpwLot" class="form-control"></input>
                         </div>
                         <div class="col-md-3">
                           <label>*Amount</label>
                           <input type="number" name="amountPw" id="amountPw" class="form-control" min="100" max="500" value="300" />
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-3">
                            <label>세척조건</label>
                            <input type="text" name="conditionWash" id="conditionWash" class="form-control" value="DMW원심"/>
                         </div>
                         <div class="col-md-3">
                          <label>환원제 이름</label>
                          <select name="nameRed" id="nameRed" class="form-control">
                               <option ></option>
                               <option >G.Ox</option>
                               <option >AA</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                           <label>환원제 비율</label>
                           <input type="number" name="ratioRed" id="ratioRed" class="form-control" placeholder="wt% / Ag" step="0.01" />
                        </div>
                        <div class="col-md-3">
                         <label>환원제 Lot</label>
                         <input type="text" name="lotRed" id="lotRed" class="form-control" />
                       </div>
                       </div>
                       </br>
                       <div class="row">
                        <div class="col-md-3">
                           <label>Amine 이름</label>
                           <input type="text" name="nameAmine" id="nameAmine" class="form-control" />
                        </div>
                        <div class="col-md-3">
                         <label>Amine 사용량</label>
                         <input type="number" name="amountAmine" id="amountAmine" class="form-control" placeholder="g or ml" step="0.1"/>
                       </div>
                       <div class="col-md-3">
                          <label>코팅제1</label>
                          <input type="text" name="nameLubricant1" id="nameLubricant1" class="form-control" />
                       </div>
                       <div class="col-md-3">
                        <label>코팅제1 비율</label>
                        <input type="number" name="ratioLubricant1" id="ratioLubricant1" class="form-control" placeholder="wt% / Ag" step="0.01"/>
                      </div>
                       </div>
                       </br>
                       <div class="row">
                         <div class="col-md-3">
                            <label>코팅제2</label>
                            <input type="text" name="nameLubricant2" id="nameLubricant2" class="form-control" />
                         </div>
                         <div class="col-md-3">
                          <label>코팅제2 비율</label>
                          <input type="number" name="ratioLubricant2" id="ratioLubricant2" class="form-control" placeholder="wt% / Ag" step="0.01" />
                        </div>
                        <div class="col-md-3">
                          <label>SA 비율</label>
                           <input type="number" name="ratioSA" id="ratioSA" class="form-control" placeholder="%" step="0.1"/>
                        </div>
                        <div class="col-md-3">
                         <label>PA 비율</label>
                         <input type="number" name="ratioPA" id="ratioPA" class="form-control" placeholder="%" step="0.1" />
                       </div>
                       </div>
                       </br>
                       <div class="row">
                        <div class="col-md-3">
                          <label>코팅제 용매 종류</label>
                           <input type="text" name="nameSolLubri" id="nameSolLubri" class="form-control" value="EtOH"/>
                        </div>
                        <div class="col-md-3">
                         <label>코팅제 용매양</label>
                         <input type="number" name="amountSolLubri" id="amountSolLubri" class="form-control" placeholder="ml" />
                       </div>
                       <div class="col-md-3">
                         <label>코팅제 용액온도</label>
                          <input type="number" name="tempSolLubri" id="tempSolLubri" class="form-control" value="65"/>
                       </div>
                       <div class="col-md-3">
                        <label>분말분산 용매</label>
                        <input type="text" name="nameSolPw" id="nameSolPw" class="form-control" value="DMW"/>
                      </div>
                       </div>
                       </br>
                       <div class="row">
                       <div class="col-md-3">
                        <label>분말분산 용매양</label>
                        <input type="number" name="amountSolPw" id="amountSolPw" class="form-control" value="600" />
                      </div>
                      <div class="col-md-3">
                        <label>첨가제 이름</label>
                        <input type="text" name="nameAdd" id="nameAdd" class="form-control" />
                      </div>
                      <div class="col-md-3">
                        <label>첨가제 비율</label>
                        <input type="number" name="ratioAdd" id="ratioAdd" class="form-control" step="0.01" />
                      </div>
                      <div class="col-md-3">
                       <label>코팅온도</label>
                       <input type="number" name="tempCoating" id="tempCoating" class="form-control" placeholder="&#8451;"/>
                     </div>
                       </div>
                       </br>
                       <div class="row">
                         <div class="col-md-6">
                           <label>투입순서</label>
                            <select name="orderAdd" id="orderAdd" class="form-control">
                                 <option ></option>
                                 <option >DMW-PW-Red-Coating</option>
                                 <option >DMW-Red-PW-AM-Coating</option>
                                 <option >DMW-PW-AM-Coating</option>
                                 <option >DMW-Add-Red-PW-AM-Coating</option>
                            </select>
                         </div>
                         <div class="col-md-3">
                          <label>교반속도 (RPM)</label>
                          <input type="number" name="rpmPw" id="rpmPw" class="form-control" value="1500" />
                         </div>
                         <div class="col-md-3">
                           <label>분말 Time</label>
                            <input type="number" name="timePw" id="timePw" class="form-control" placeholder="min" />
                         </div>
                       </div>
                       </br>
                       <div class="row">
                        <div class="col-md-3">
                         <label>환원제 Time</label>
                         <input type="number" name="timeRed" id="timeRed" class="form-control" placeholder="min" />
                       </div>
                         <div class="col-md-3">
                          <label>Amine Time</label>
                          <input type="number" name="timeAmine" id="timeAmine" class="form-control" placeholder="min" />
                         </div>
                         <div class="col-md-3">
                           <label>코팅1 Time</label>
                            <input type="number" name="timeCoating1" id="timeCoating1" class="form-control" placeholder="min" />
                         </div>
                         <div class="col-md-3">
                          <label>코팅2 Time</label>
                          <input type="number" name="timeCoating2" id="timeCoating2" class="form-control" placeholder="min" />
                        </div>
                       </div>
                       </br>
                       <div class="row">
                      <div class="col-md-3">
                       <label>분말 전도도</label>
                       <input type="number" name="conductivityAfterPw" id="conductivityAfterPw" class="form-control" placeholder="&#181;S/cm" />
                     </div>
                     <div class="col-md-3">
                       <label>분말 온도</label>
                        <input type="number" name="tempAfterPw" id="tempAfterPw" class="form-control" placeholder="&#8451;" />
                     </div>
                     <div class="col-md-3">
                      <label>코팅전 pH</label>
                      <input type="number" name="pHBeforeCoating" id="pHBeforeCoating" class="form-control" step="0.1"/>
                    </div>
                    <div class="col-md-3">
                     <label>실험담당자</label>
                     <input type="text" name="maker" id="maker" class="form-control" />
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
    targets: [42,43],
  }],
    "ajax" : {
     url:"../dataManage/conditionOfCoating/fetch.php",
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
            {targets: [5,8,9,14,17,18,19,20,21,22,23,24,27,28,29,30,32,33,34,35,36,37,38,39,40,-2],
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
                url:"../dataManage/conditionOfCoating/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#sampleNo').val(data.sampleNo);
                     $('#concept').val(data.concept);
                     $('#dateMake').val(data.dateMake);
                     $('#ncpwLot').val(data.ncpwLot);
                     $('#amountPw').val(data.amountPw);
                     $('#conditionWash').val(data.conditionWash);
                     $('#nameRed').val(data.nameRed);
                     $('#ratioRed').val(data.ratioRed);
                     $('#lotRed').val(data.lotRed);
                     $('#nameAmine').val(data.nameAmine);
                     $('#amountAmine').val(data.amountAmine);
                     $('#nameLubricant1').val(data.nameLubricant1);
                     $('#ratioLubricant1').val(data.ratioLubricant1);
                     $('#nameLubricant2').val(data.nameLubricant2);
                     $('#ratioLubricant2').val(data.ratioLubricant2);
                     $('#ratioSA').val(data.ratioSA);
                     $('#ratioPA').val(data.ratioPA);
                     $('#nameSolLubri').val(data.nameSolLubri);
                     $('#amountSolLubri').val(data.amountSolLubri);
                     $('#tempSolLubri').val(data.tempSolLubri);
                     $('#nameAdd').val(data.nameAdd);
                     $('#ratioAdd').val(data.ratioAdd);
                     $('#nameSolPw').val(data.nameSolPw);
                     $('#amountSolPw').val(data.amountSolPw);
                     $('#orderAdd').val(data.orderAdd);
                     $('#tempCoating').val(data.tempCoating);
                     $('#rpmPw').val(data.rpmPw);
                     $('#timePw').val(data.timePw);
                     $('#timeRed').val(data.timeRed);
                     $('#timeAmine').val(data.timeAmine);
                     $('#timeCoating1').val(data.timeCoating1);
                     $('#timeCoating2').val(data.timeCoating2);
                     $('#conductivityAfterPw').val(data.conductivityAfterPw);
                     $('#tempAfterPw').val(data.tempAfterPw);
                     $('#pHBeforeCoating').val(data.pHBeforeCoating);
                     $('#maker').val(data.maker);
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
           else if($('#concept').val() == '')
           {
                alert("Concept is required");
           }
           else if($('#dateMake').val() == '')
           {
                alert("Date is required");
           }
           else if($('#ncpwLot').val() == '')
           {
                alert("Lot No is required");
           }
           else if($('#amountPw').val() == '')
           {
                alert("Amount is required");
           }
           else
           {
                $.ajax({
                     url:"../dataManage/conditionOfCoating/insert.php",
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
                           url:"../dataManage/conditionOfCoating/delete.php",
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
