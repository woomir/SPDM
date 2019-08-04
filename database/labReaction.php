<?php session_start();
   require_once('../lib/top.php');
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){
   settype($_SESSION['role_id'],'int');
   require_once('../lib/menu.php');
   include '../dataManage/db.php';
?>
<div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="card mb-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><?php echo $bread[0]; ?></li>
                <li class="breadcrumb-item"><?php echo $bread[1]; ?></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[2]; ?></li>
              </ol>
            </nav>
          <div class="card-body">
            <div class="row justify-content-between">
              <div class="col-4">
                <h3><?php echo $bread[3]; ?></h3>
              </div>
                <div align="col-4">
                <?php if ($_SESSION['role_id']<3){ ?>
                <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info btn-xs">Add</button>&nbsp;&nbsp;&nbsp;
                  <?php } ?>
                </div>
            </div> <br>

            <ul class="nav nav-tabs" id="reactionTab" role="tablist">
              <li class="navitem">
                <a class="nav-link active" id="wpotab" data-toggle="tab" href="#wporeaction" role="tab" aria-controls="wporeaction" aria-selected="true">WPO 제조</a>
              </li>
              <li class="navitem">
                <a class="nav-link" id="newtab" data-toggle="tab" href="#newreaction" role="tab" aria-controls="newreaction" aria-selected="false">신규환원제</a>
              </li>
            </ul>
            
            <div class="tab-content" id="myTabContent">
              <!--  테이블 정리 -->
              <div class="tab-pane fade show active" id="wporeaction" role="tabpanel" aria-labelledby="wpotab"><br>
                <div class="table-responsive">
                  <div id="alert_message"></div>
                  <table id="ReactionTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                  <thead align="center">
                    <tr>
                      <th width="">Sample<br>No</th>
                      <th width="">Object</th>
                      <th width="">Date</th>
                      <th width="">Scale</th>
                      <th width="">AgNO3<br>Lot</th>
                      <th width="">Ag농도</th>
                      <th width="">Ag makeup<br>부피</th>
                      <th width="">암모니아<br>당량</th>
                      <th width="">암모니아<br>사용량</th>
                      <th width="">첨가제1<br>종류</th>
                      <th width="">첨가제1<br>비율</th>
                      <th width="">첨가제1<br>사용량</th>
                      <th width="">첨가제2<br>종류</th>
                      <th width="">첨가제2<br>비율</th>
                      <th width="">첨가제2<br>사용량</th>
                      <th width="">첨가제3<br>종류</th>
                      <th width="">첨가제3<br>비율</th>
                      <th width="">첨가제3<br>사용량</th>
                      <th width="">첨가제4<br>종류</th>
                      <th width="">첨가제4<br>비율</th>
                      <th width="">첨가제4<br>사용량</th>
                      <th width="">Ag makeup<br>온도</th>
                      <th width="">Ag makeup<br>교반속도</th>
                      <th width="">Ag makeup<br>투입순서</th>
                      <th width="">Ag makeup<br>Etc</th>
                      <th width="">환원용액<br>부피</th>
                      <th width="">환원제<br>종류</th>
                      <th width="">환원제<br>농도</th>
                      <th width="">환원제<br>사용량</th>
                      <th width="">환원첨가1<br>종류</th>
                      <th width="">환원첨가1<br>비율</th>
                      <th width="">환원첨가1<br>사용량</th>
                      <th width="">환원첨가2<br>종류</th>
                      <th width="">환원첨가2<br>비율</th>
                      <th width="">환원첨가2<br>사용량</th>
                      <th width="">환원용액<br>온도</th>
                      <th width="">환원용액<br>교반속도</th>
                      <th width="">반응NaOH<br>[wt.%/Ag]</th>
                      <th width="">환원용액<br>Etc</th>
                      <th width="">반응액<br>온도</th>
                      <th width="">반응pH</th>
                      <th width="">실험담당자</th>
                      <th width="">Edit</th>
                    </tr>
                    </thead>
                  </table>
                </div>
              </div>

              <div class="tab-pane fade" id="newreaction" role="tabpanel" aria-labelledby="newtab"><br>
               Comming Soon    
              </div>

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
                     <div style="display:inline-block; position:absolute; right:190px; top:22px; font-weight:bold;">이전 데이터 가져오기</div>
                            
                      <div class="existCondition">
                            <select name="existCondition" id="existCondition" class="form-control" style="width:20%; display:inline-block; float:right;">
                              <option value="">Sample No</option>
                              <?php 
                              $query = "SELECT sampleNo from reactionpw ORDER BY date DESC";
                              $result = mysqli_query($connect,$query);
                              while($row = mysqli_fetch_array($result)){
                                echo "<option value='".$row["sampleNo"]."'>".$row["sampleNo"]."</option>";
                              }
                             ?>    
                            </select>
                      </div>
                     <br><br>
                       <div class="row">
                         <div class="col-md-6">
                           <label>*Sample No</label>
                           <input type="text" name="sampleNo" id="sampleNo" class="form-control" />
                         </div>
                         <div class="col-md-6">
                           <label>*Object</label>
                           <input type="text" name="object" id="object" class="form-control"></input>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                         <div class="col-md-5">
                           <label>*제조일자</label>
                           <input type="date" name="date" id="date" class="form-control" value="<?php echo date("Y-m-d");?>"/>
                         </div>
                         <div class="col-md-4">
                           <label>*Scale</label>
                           <select name="scale" id="scale" class="form-control">
                               <option >Lab</option>
                               <option >Bench</option>
                          </select>
                         </div>
                         <div class="col-md-3">
                           <label>*AgNO3 Lot</label>
                           <?php 
                            $query = 'SELECT lotNo from infoagno3 order by lotNo desc';
                            $result = mysqli_query($connect, $query);
                           ?>
                           <select name="infoAgno3_lotNo" id="infoAgno3_lotNo" class="form-control">
                              <?php 
                              while($row = mysqli_fetch_array($result)){
                                echo '<option>'.$row["lotNo"].'</option>';
                              }
                              ?>
                          </select>
                         </div>
                       </div>
                       <br />
                       <div class="row">
                          <div class="col-md-3">
                            <label>Ag농도</label>
                            <input type="number" name="agC" id="agC" class="form-control" value="" placeholder="g/L"/>
                          </div>
                          <div class="col-md-3">
                              <label>Ag용액 부피</label>
                              <input type="text" name="agTvol" id="agTvol" class="form-control" value="" placeholder="ml" />
                          </div>
                          <div class="col-md-3">
                            <label>암모니아 당량</label>
                            <input type="number" name="amEq" id="amEq" class="form-control" value="" placeholder="" step="0.01" />
                          </div>
                          <div class="col-md-3">
                            <label>첨가제1 종류</label>
                            <input type="text" name="kindAdd1" id="kindAdd1" class="form-control" placeholder="" value="Ox.A" />
                          </div>
                          
                       </div>
                       <br>
                       <div class="row">
                        <div class="col-md-3">
                          <label>첨가제1 비율</label>
                          <input type="number" name="ratioAdd1" id="ratioAdd1" class="form-control" placeholder="wt.%/Ag" value="" step="0.01"/>
                        </div> 
                        <div class="col-md-3">
                           <label>첨가제2 종류</label>
                           <input type="text" name="kindAdd2" id="kindAdd2" class="form-control" placeholder="" value="K2SO4" />
                        </div>
                        <div class="col-md-3">
                         <label>첨가제2 비율</label>
                         <input type="number" name="ratioAdd2" id="ratioAdd2" class="form-control" placeholder="wt.%/Ag" value="" step="0.1"/>
                        </div>
                        <div class="col-md-3">
                            <label>첨가제3 종류</label>
                            <input type="text" name="kindAdd3" id="kindAdd3" class="form-control" placeholder="" value="P.Na"  />
                        </div>
                       </div>
                       <br>
                       <div class="row">
                        <div class="col-md-3">
                          <label>첨가제3 비율</label>
                          <input type="number" name="ratioAdd3" id="ratioAdd3" class="form-control" placeholder="wt.%/Ag" value="" step="0.0001" />
                        </div>
                        <div class="col-md-3">
                            <label>첨가제4 종류</label>
                            <input type="text" name="kindAdd4" id="kindAdd4" class="form-control" placeholder="" value=""  />
                        </div>
                        <div class="col-md-3">
                          <label>첨가제4 비율</label>
                          <input type="number" name="ratioAdd4" id="ratioAdd4" class="form-control" placeholder="" value="" step="" />
                        </div>
                        <div class="col-md-3">
                         <label>Ag용액 온도</label>
                         <input type="number" name="agTemp" id="agTemp" class="form-control" placeholder="&#8451;" step="" />
                        </div>
                       </div>
                       <br>
                       <div class="row">
                        <div class="col-md-3">
                          <label>Ag용액 교반속도</label>
                           <input type="number" name="agRpm" id="agRpm" class="form-control" placeholder="rpm" step=""/>
                        </div>
                        <div class="col-md-6">
                          <label>Ag용액 투입순서</label>
                          <select name="agOrder" id="agOrder" class="form-control">
                               <option >DMW-Ox.A-AgNO3-AM-K2SO4-P.Na</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                         <label>Ag용액 Etc</label>
                         <input type="text" name="agEtc" id="agEtc" class="form-control" placeholder="" />
                        </div>
                       </div>
                       <br>
                       <div class="row">
                        <div class="col-md-3">
                          <label>환원용액 부피</label>
                          <input type="number" name="redTvol" id="redTvol" class="form-control" value="" placeholder="ml"/>
                        </div>
                        <div class="col-md-3">
                          <label>환원제 종류</label>
                          <input type="text" name="kindRed" id="kindRed" class="form-control" value="HQ" />
                        </div>
                        <div class="col-md-3">
                          <label>환원제 농도</label>
                          <input type="number" name="redC" id="redC" class="form-control" placeholder = "g/L" step="0.1"/>
                        </div>
                        <div class="col-md-3">
                            <label>첨가제1 종류</label>
                            <input type="text" name="kindRedAdd1" id="kindRedAdd1" class="form-control" placeholder="" value="" />
                        </div>
                       </div>
                       </br>
                       <div class="row">
                        <div class="col-md-3">
                         <label>첨가제1 비율</label>
                         <input type="number" name="ratioRedAdd1" id="ratioRedAdd1" class="form-control" placeholder="wt.%/Ag" value="" step="0.0001"/>
                        </div>
                        <div class="col-md-3">
                            <label>첨가제2 종류</label>
                            <input type="text" name="kindRedAdd2" id="kindRedAdd2" class="form-control" placeholder="" value=""  />
                        </div>
                        <div class="col-md-3">
                          <label>첨가제2 비율</label>
                          <input type="number" name="ratioRedAdd2" id="ratioRedAdd2" class="form-control" placeholder="wt.%/Ag" value="" step="0.0001" />
                        </div>
                        <div class="col-md-3">
                         <label>환원용액 온도</label>
                         <input type="number" name="redTemp" id="redTemp" class="form-control" placeholder="&#8451;" />
                        </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-md-3">
                          <label>환원용액 교반속도</label>
                          <input type="number" name="redRpm" id="redRpm" class="form-control" placeholder="rpm" />
                         </div>
                         <div class="col-md-3">
                           <label>반응NaOH 사용비율</label>
                            <input type="number" name="ratioReactionNaOH" id="ratioReactionNaOH" class="form-control" placeholder="wt.%/Ag" value="200"/>
                         </div>
                         <div class="col-md-6">
                          <label>환원용액 Etc</label>
                          <input type="text" name="redEtc" id="redEtc" class="form-control" placeholder="" />
                         </div>
                          </div>
                          </br>
                          <div class="row">
                            <div class="col-md-3">
                            <label>반응 pH</label>
                            <input type="number" name="reactionpH" id="reactionpH" class="form-control" placeholder="" step="0.1" />
                            </div>
                            <div class="col-md-3">
                              <label>반응 온도</label>
                                <input type="number" name="reactionTemp" id="reactionTemp" class="form-control" placeholder="&#8451;" />
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
                          <input type="text" name="redEtc" id="redEtc" class="form-control" />
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

 <?php
 require_once('../lib/script_src.php');
 ?>

<script type="text/javascript">
$(document).ready(function(){

  fetch_data();

  function fetch_data(is_scale)
  {
   var dataTable = $('#ReactionTable').DataTable({

    "processing" : true,
    "serverSide" : true,
    "responsive" : true,
    "fixedHeader" : true,
    "order" : [[0,'desc']],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "iDisplayLength": 25,
    "columnDefs": [{
  }],
    "ajax" : {
     url:"../dataManage/labReaction/fetch.php",
     type:"POST",
     data: {is_scale:is_scale}
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
            {targets: [4,8,11,14,17,18,19,20,22,23,24,28,31,34,36,38],
             visible: false}
        ]
   });

    //Scale 선택 기능
    $('#ReactionTable_filter').prepend('Scale:&nbsp&nbsp&nbsp<select id="select" class="form-control form-control-sm" style="width:20%; display:inline-block;"></select>&nbsp&nbsp&nbsp');
    $('#select').append('<option value="">All</optionv><option value="Lab">Lab</option><option value="Bench">Bench</option>');
    $('#select').val(is_scale);
  }

    $(document).on('change', '#select', function(){
          var scale = $(this).val();
          $('#ReactionTable').DataTable().destroy();
          if(scale != '')
          {
            fetch_data(scale);
          }
          else
          {
            fetch_data();
          }
        });

      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
           $('#id').val("");
           $('#existCondition').val("");
      });
      $(document).on('click', '.edit_data', function(){
           var id = $(this).attr("id");
           $('#existCondition').val("");
           $.ajax({
                url:"../dataManage/labReaction/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#sampleNo').val(data.sampleNo);
                     $('#object').val(data.object);
                     $('#date').val(data.date);
                     $('#scale').val(data.scale);
                     $('#infoAgno3_lotNo').val(data.infoAgno3_lotNo);
                     $('#agC').val(data.agC);
                     $('#agTvol').val(data.agTvol);
                     $('#amEq').val(data.amEq);
                     $('#kindAdd1').val(data.kindAdd1);
                     $('#ratioAdd1').val(data.ratioAdd1);
                     $('#kindAdd2').val(data.kindAdd2);
                     $('#ratioAdd2').val(data.ratioAdd2);
                     $('#kindAdd3').val(data.kindAdd3);
                     $('#ratioAdd3').val(data.ratioAdd3);
                     $('#kindAdd4').val(data.kindAdd4);
                     $('#ratioAdd4').val(data.ratioAdd4);
                     $('#agTemp').val(data.agTemp);
                     $('#agRpm').val(data.agRpm);
                     $('#agOrder').val(data.agOrder);
                     $('#agEtc').val(data.agEtc);
                     $('#redTvol').val(data.redTvol);
                     $('#kindRed').val(data.kindRed);
                     $('#redC').val(data.redC);
                     $('#kindRedAdd1').val(data.kindRedAdd1);
                     $('#ratioRedAdd1').val(data.ratioRedAdd1);
                     $('#kindRedAdd2').val(data.kindRedAdd2);
                     $('#ratioRedAdd2').val(data.ratioRedAdd2);
                     $('#redTemp').val(data.redTemp);
                     $('#redRpm').val(data.redRpm);
                     $('#ratioReactionNaOH').val(data.ratioReactionNaOH);
                     $('#redEtc').val(data.redEtc);
                     $('#reactionpH').val(data.reactionpH);
                     $('#reactionTemp').val(data.reactionTemp);
                     $('#maker').val(data.maker);
                     $('#etc').val(data.etc);
                     $('#id').val("edit");
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
           else if($('#object').val() == '')
           {
                alert("Object is required");
           }
           else if($('#date').val() == '')
           {
                alert("Date is required");
           }
           else if($('#scale').val() == '')
           {
                alert("Scale is required");
           }   
           else if($('#infoAgno3_lotNo').val() == '')
           {
                alert("infoAgno3_lotNo is required");
           }     
           else
           {
                $.ajax({
                     url:"../dataManage/labReaction/insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#add_data_Modal').modal('hide');
                          $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                          $('#ReactionTable').DataTable().destroy();
                          fetch_data();
                          $('.existCondition').load("labReaction.php #existCondition");
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
                           url:"../dataManage/labReaction/delete.php",
                           method:"POST",
                           data:{id:id},
                           success:function(data){
                                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                                $('#ReactionTable').DataTable().destroy();
                                fetch_data();
                           }
                      });
                      setInterval(function(){
                       $('#alert_message').html('');
                     }, 5000);
                 }
            });
    
    $(".modal").draggable({
      handle: ".modal-header"
    });

    $(document).on('click', '#existCondition', function() {
      var id = this.value;
      $.ajax({
                url:"../dataManage/labReaction/edit.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                    $('#sampleNo').val(data.sampleNo);
                     $('#object').val(data.object);
                     $('#date').val(data.date);
                     $('#scale').val(data.scale);
                     $('#infoAgno3_lotNo').val(data.infoAgno3_lotNo);
                     $('#agC').val(data.agC);
                     $('#agTvol').val(data.agTvol);
                     $('#amEq').val(data.amEq);
                     $('#kindAdd1').val(data.kindAdd1);
                     $('#ratioAdd1').val(data.ratioAdd1);
                     $('#kindAdd2').val(data.kindAdd2);
                     $('#ratioAdd2').val(data.ratioAdd2);
                     $('#kindAdd3').val(data.kindAdd3);
                     $('#ratioAdd3').val(data.ratioAdd3);
                     $('#kindAdd4').val(data.kindAdd4);
                     $('#ratioAdd4').val(data.ratioAdd4);
                     $('#agTemp').val(data.agTemp);
                     $('#agRpm').val(data.agRpm);
                     $('#agOrder').val(data.agOrder);
                     $('#agEtc').val(data.agEtc);
                     $('#redTvol').val(data.redTvol);
                     $('#kindRed').val(data.kindRed);
                     $('#redC').val(data.redC);
                     $('#kindRedAdd1').val(data.kindRedAdd1);
                     $('#ratioRedAdd1').val(data.ratioRedAdd1);
                     $('#kindRedAdd2').val(data.kindRedAdd2);
                     $('#ratioRedAdd2').val(data.ratioRedAdd2);
                     $('#redTemp').val(data.redTemp);
                     $('#redRpm').val(data.redRpm);
                     $('#ratioReactionNaOH').val(data.ratioReactionNaOH);
                     $('#redEtc').val(data.redEtc);
                     $('#reactionpH').val(data.reactionpH);
                     $('#reactionTemp').val(data.reactionTemp);
                     $('#maker').val(data.maker);
                     $('#etc').val(data.etc);
                     $('#id').val(data.id);
                    //  $('#add_data_Modal').show().formValidation('resetForm');
                }
           });
    });

 });

</script>
