<?php session_start();
   require_once('../lib/top.php');
   include '../dataManage/db.php';
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){
   settype($_SESSION['role_id'],'int');
   require_once('../lib/menu.php');
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
            </div> <br>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="navitem">
                <a class="nav-link" id="R-tab" data-toggle="tab" href="#reaction" role="tab" aria-controls="reaction" aria-selected="flase">Reaction</a>
              </li>
              <li class="navitem">
                <a class="nav-link" id="W-tab" data-toggle="tab" href="#wash" role="tab" aria-controls="wash" aria-selected="false">Wash</a>
              </li>
              <li class="navitem">
                <a class="nav-link active" id="C-tab" data-toggle="tab" href="#coating" role="tab" aria-controls="coating" aria-selected="true">Coating</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">

              <!-- 반응 테이블 정리 -->
              <div class="tab-pane fade" id="reaction" role="tabpanel" aria-labelledby="R-tab"><br>
                <div class="table-responsive">
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
                        <th>SEM size</th>
                        <th width="">D10 </th>
                        <th width="">D50 </th>
                        <th width="">D90 </th>
                        <th width="">Dmax</th>
                        <th width="">T-IGL</th>
                        <th width="">P-IGL</th>
                        <th width="">C-IGL</th>
                        <th width="">DTA Peak</th>
                        <th width="">Enthalphy</th>
                        <th width="">BET</th>
                        <th width="">TD</th>
                        <th width="">XRD</th>
                        <th width="">PCU</th>
                        <th width="">Na</th>
                        <th width="">Etc</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
              
              <!-- 세척 테이블 정리 -->
              <div class="tab-pane fade" id="wash" role="tabpanel" aria-labelledby="W-tab"><br>
              <div class="table-responsive">
                  <table id="WashTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                  <thead align="center">
                    <tr>
                      <th>Sample<br>No</th>
                      <th>Concept</th>
                      <th>Date</th>
                      <th width="">반응 분말<br>Lot No</th>
                      <th width="">DMW<br>사용량</th>
                      <th width="">분말<br>사용량</th>
                      <th width="">세척제<br>종류</th>
                      <th width="">세척제<br>비율</th>
                      <th width="">세척제<br>사용량</th>
                      <th width="">세척 온도</th>
                      <th width="">투입 순서</th>
                      <th width="">교반 속도</th>
                      <th width="">세척제 용해<br>Time</th>
                      <th width="">분말 분산<br>Time</th>
                      <th width="">실험<br>담당자</th>
                      <th>Etc</th>
                      <th>D10</th>
                      <th>D50</th>
                      <th>D90</th>
                      <th>Dmax</th>
                      <th>T-IGL</th>
                      <th>DTA Peak</th>
                      <th>Enthalphy</th>
                      <th>BET</th>
                      <th>XRD</th>
                      <th>PCU</th>
                      <th>Na</th>
                      <th width="">Etc</th>
                    </tr>
                    </thead>
                  </table>
                </div>
              </div>
              
              <!-- 코팅 테이블 정리 -->
              <div class="tab-pane fade show active" id="coating" role="tabpanel" aria-labelledby="C-tab"><br>      
                <div class="table-responsive">
                  <table id="CoatingTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
                  <thead align="center">
                    <tr>
                      <th>Sample<br>No</th>
                      <th>Concept</th>
                      <th>Powder<br>Type</th>
                      <th>Date</th>
                      <th>Lot<br>No</th>
                      <th>환원제</th>
                      <th>환원제<br>비율</th>
                      <th>환원제<br>사용량</th>
                      <th>Amine</th>
                      <th>Amine<br>사용량</th>
                      <th>코팅제1</th>
                      <th>코팅제1<br>비율</th>
                      <th>코팅제2</th>
                      <th>코팅제2<br>비율</th>
                      <th>SA비율</th>
                      <th>PA비율</th>
                      <th>첨가제</th>
                      <th>첨가제<br>비율</th>
                      <th>첨가제<br>사용량</th>
                      <th>코팅온도</th>
                      <th>교반속도</th>
                      <th>SEM size</th>
                      <th>응집도</th>
                      <th>D10</th>
                      <th>D50</th>
                      <th>D90</th>
                      <th>Dmax</th>
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
          </div> <!-- card -->
        </div>
        
        <div class="row">
          <div class="col-lg-12 col-xl-9 mt-2">
            <div class="card">
              <div class="card-header"><i class="fas fa-chart-line"></i>&nbsp&nbspGraph</div>
              <div class="card-body">
                <div style="width:100%;">
                      <!-- <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item">Graph</li>
                        </ol>
                      </nav> -->
                    <canvas id="myChart"></canvas>
                  </div> 
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-xl-3 mt-2">
            <div class="card">
              <div class="card-header"><i class="fas fa-cog"></i>&nbsp&nbspSetup</div>
              <div class="card-body">
                <div>
                  <label for="">&nbspChart type</label>
                  <select name="charttype" id="charttype" class="form-control">
                    <option value="line">Line</option>
                    <option value="scatter">Scatter</option>
                    <option value="bar">bar</option>
                    <option value="pie">Pie</option>
                  </select>
                </div>
                <br>
                <div>
                  <label for="">X-AXIS</label>
                  <select name="" id="xAxis" class="form-control">
                    <?php 
                      $query = "SHOW COLUMNS FROM analysispw_view";
                      $result = mysqli_query($connect,$query);
                      while($row = mysqli_fetch_assoc($result)){
                        echo "<option value=''>".$row['Field']."</option>";
                      }
                    ?>  
                  </select>
                </div>
                <br>
                <div>
                  <label for="">Y-AXIS</label>
                  <select name="" id="yAxis" class="form-control">
                  <?php 
                      $query = "SHOW COLUMNS FROM analysispw_view";
                      $result = mysqli_query($connect,$query);
                      while($row = mysqli_fetch_assoc($result)){
                        echo "<option value=''>".$row['Field']."</option>";
                      }
                    ?>  
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
          
      </div><!-- /.container-fluid -->
<br>
<?php
  require_once('../lib/bottom.php');
}else{
  require_once('../lib/invalid_access.php');
}
?>
</body>
</html>

<?php
require_once('../lib/script_src.php');
?>

<script type="text/javascript">
$(document).ready(function(){

      coating_fetch_data();

      $(document).on('click', '#R-tab', function(){
        $('#ReactionTable').DataTable().destroy();
        reaction_fetch_data();
      });

      $(document).on('click', '#C-tab', function(){
        $('#CoatingTable').DataTable().destroy();
        coating_fetch_data();
      });
      
      
      $(document).on('click', '#W-tab', function(){
        $('#WashTable').DataTable().destroy();
        wash_fetch_data();
      });

      function reaction_fetch_data()
      {
      var dataTable = $('#ReactionTable').DataTable({

        "processing" : true,
        "serverSide" : true,
        "responsive" : true,
        "fixedHeader" : true,
        "order" : [2,'desc'],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "iDisplayLength": 25,
        "columnDefs": [
          {targets: [4,6,8,11,14,17,18,19,20,22,23,24,25,28,31,32,33,34,36,38,41,43,45,46,48,49,50,51,52,53,55,56],
              visible: false}
        ],
            "ajax" : {
            url:"../dataManage/analysisPwlabView/reactionFetch.php",
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
    /////////
      function wash_fetch_data()
      {
      var dataTable = $('#WashTable').DataTable({

        "processing" : true,
        "serverSide" : true,
        "responsive" : true,
        "fixedHeader" : true,
        "order" : [2,'desc'],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "iDisplayLength": 25,
        "columnDefs": [
          {targets: [10,11,12,14,15,16,17,18,19,21,22,23,27],
              visible: false}
        ],
        "ajax" : {
        url:"../dataManage/analysisPwlabView/washFetch.php",
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


    ///////
      function coating_fetch_data()
      {
      var dataTable = $('#CoatingTable').DataTable({

        "processing" : true,
        "serverSide" : true,
        "fixedHeader" : true,
        "responsive" : true,
        "order" : [0,'desc'],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "iDisplayLength": 25,
        "columnDefs": [
          {targets: [3,6,12,13,14,15,16,17,18,20],
              visible: false}
        ],
        "ajax" : {
        url:"../dataManage/analysisPwlabView/coatingFetch.php",
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


 });


var ctx = document.getElementById('myChart');
var chartType = $('#charttype').val();

var myChart = new Chart(ctx, {
    type: chartType,
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
