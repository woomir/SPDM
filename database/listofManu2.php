<?php session_start();
$connect = mysqli_connect("localhost", "root", "52telecast", "woomir");
$query = "SELECT * FROM makelistpastetbl ORDER BY datemake DESC";
 $result = mysqli_query($connect, $query);
?>

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
                <li class="breadcrumb-item">Databases</li>
                <li class="breadcrumb-item">Paste</li>
                <li class="breadcrumb-item active" aria-current="page">List of Manu</li>
              </ol>
            </nav>
          <div class="card-body">
            <form method="post" action="../dataManage/listofManu/delete.php">
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
                 <div class="form-group">
                  <div class="input-group">
                   <span class="input-group-addon">Search</span>
                   <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                  </div>
                 </div>
                </br>
                   <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover">
                     <tr>
                       <th width="8%">Paste No</th>
                       <th width="10%">Powder Lot</th>
                       <th width="7%">Powder type</th>
                       <th width="10%">제조 일자</th>
                       <th width="7%">작업자</th>
                       <th>제조 목적</th>
                       <th width="7%">제조량 (g)</th>
                       <th width="7%">배합명</th>
                       <th>비고</th>
                       <th width="15%">Edit</th>
                    </tr>

                    <?php
                    while($row = mysqli_fetch_array($result))
                     { ?>
                       <tr>
                          <td><?php echo $row["pasteNo"]; ?></td>
                          <td><?php echo $row["powderLot"]; ?></td>
                          <td><?php echo $row["powderType"]; ?></td>
                          <td><?php echo $row["dateMake"]; ?></td>
                          <td><?php echo $row["maker"]; ?></td>
                          <td><?php echo $row["object"]; ?></td>
                          <td><?php echo $row["amount"]; ?></td>
                          <td><?php echo $row["recipe"]; ?></td>
                          <td><?php echo $row["etc"]; ?></td>
                          <td>
                          <?php  if ($_SESSION['role_id']<3){ ?>
                          <input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" />
                          <?php } ?>
                          <?php  if ($_SESSION['role_id']<2){ ?>
                          <input type="button" name="delete" value="Delete" id="<?php echo $row["id"]; ?>" class="btn btn-xs btn-danger btn_delete" />
                            <?php } ?>
                          </td>
                     </tr>
                     <?php
                     }
                     ?>
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

<!--Modal add-->
<div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Add</h4>
                </div>
                <div class="modal-body">
                     <form method="post" id="insert_form">
                          <label>Enter Paste No</label>
                          <input type="text" name="pasteNo" id="pasteNo" class="form-control" />
                          <br />
                          <label>Enter Powder Lot</label>
                          <input type="text" name="powderLot" id="powderLot" class="form-control"></input>
                          <br />
                          <label>Powder Type</label>
                          <select name="powderType" id="powderType" class="form-control">
                               <option value="jet">JET</option>
                               <option value="cl">CL</option>
                          </select>
                          <br />
                          <label>Date make</label>
                          <input type="date" name="dateMake" id="dateMake" class="form-control" />
                          <br />
                          <label>Maker</label>
                          <select name="maker" id="maker" class="form-control">
                               <option value="lgj">임기주</option>
                               <option value="cyh">최영훈</option>
                               <option value="sjw">손정우</option>
                          </select>
                          </br>
                          <label>Object</label>
                          <input type="text" name="object" id="object" class="form-control" />
                          <br />
                          <label>Amount</label>
                          <input type="number" name="amount" id="amount" class="form-control" min="100" max="500" />
                          <br />
                          <label>Recipe</label>
                          <select name="recipe" id="recipe" class="form-control">
                               <option value="s2y9">S2Y9</option>
                               <option value="hs6a4">HS6A4</option>
                          </select>
                          </br>
                          <label>Etc</label>
                          <input type="text" name="etc" id="etc" class="form-control" />
                          <br />
                          <input type="hidden" name="id" id="id" />
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                     </form>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>


<script>
$(document).ready(function(){

      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
      });
      $(document).on('click', '.edit_data', function(){
           var id = $(this).attr("id");
           $.ajax({
                url:"../dataManage/listofManu2/fetch.php",
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
                     url:"../dataManage/listofManu2/insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#add_data_Modal').modal('hide');
                          $('#PasteTable').html(data);
                     }
                });
           }
      });

      $(document).on('click', '.btn_delete', function(){
                 var id=$(this).attr("id");
                 if(confirm("Are you sure you want to delete this?"))
                 {
                      $.ajax({
                           url:"../dataManage/listofManu2/delete.php",
                           method:"POST",
                           data:{id:id},
                           success:function(data){
                                $('#PasteTable').html(data);
                           }
                      });
                 }
            });

 });

</script>
