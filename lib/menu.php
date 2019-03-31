<style>
header {
  background-color:#ffde00; 
  height:50px;
  padding: 12px 15px;
  width: 100%;
  top: 0;
  left: 0;
  position: fixed;
  z-index: 1000;
}

.brand-main{
  width:500px;
  font-size: 25px; 
  font-weight:bold; 
  float:left; 
  text-decoration:none; 
  pointer-events: none; 
  color:black;
  display: inline-block;
  margin: 0 auto;
  height: 50px;
  vertical-align: middle;
}
ul.action-list{
  float: right;
    list-style: none;
    margin: 0;

}
li.action{
  display: block;
  float: left;
  position: relative;
  height: 36px;
  margin: 0;
  padding: 0 4px;
}

#userDropdown{
  color:black;
}

</style>

<body id="page-top">
<header class="site-header">

  <a href="#" class="brand-main">
    <i class="fas fa-database" style="padding: 8px;"></i>
    <span>Silver Powder Database Management</span>
  </a>
  
  <a href="#" class="nav-toggle" style="display:none;">
    <div class="hamburger hamburger--arrowturn">
      <div class="hamburger-box">
        <div class="hamburger-inner"></div>
      </div>
    </div>
  </a>

  <ul class="action-list">
          <li class="action" >
            <a id="useridcss" style="margin: 10px 0px 0px 0px;"><?php echo $_SESSION['id']." : ".$_SESSION['role'];?></a>
          </li>
          <li class="action">
              <a class="" href="#" id="userDropdown" role="button" data-toggle="tooltip" data-placement="bottom" title="Password Change" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i>
              </a>
          </li>
          <li class="action">
              <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#logoutModal" style="margin-left:20px;">Logout</button>
          </li>
  </ul>

</header> 


<!-- <nav id="titleNavbar" class="navbar navbar-expand-lg navbar-light" >
    <a id="titleText" class="navbar-brand" href=""><i class="fas fa-database"></i>&nbsp;&nbsp;Silver Powder Database Management</a>
    <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-haspopup="true" aria-expanded="false">
    <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a id="useridcss" class="nav-link active"><?php echo $_SESSION['id']." : ".$_SESSION['role'];?></a>
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
  </nav> -->

  <nav id="menuNavbar" class="navbar navbar-expand-lg navbar-dark bg-dark" style="clear:both; position: fixed;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarMenu">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a id="menuHome" class="nav-link" href="#" >
          <i class="fas fa-home"></i>&nbsp;&nbsp;Home</a>
      </li>
      <li class="nav-item dropdown">
        <a id="menuMasspowder" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-industry"></i>&nbsp;&nbsp;Mass powder
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <h6 class="dropdown-header">Database</h6>
          <a class="dropdown-item" href="makePwMass.php">Manufacturing</a>
          <a class="dropdown-item" href="analysisPwMass.php">Analysis</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Report</h6>
          <a class="dropdown-item" href="analysisPwMassView.php">Data Analysis</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a id="menuLabpowder" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <a id="menuPaste" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<?php
$uri = substr($_SERVER['REQUEST_URI'],15);
$bread = [];
if ($uri == 'makePwMass.php'){
  $bread = ['Mass Powder', 'Database', 'Manufacturing', '양산 분말 제조 조건'];
} elseif ($uri == 'analysisPwMass.php'){
  $bread = ['Mass Powder', 'Database', 'Analysis', '양산 분말 분석 데이터'];
} elseif ($uri == 'analysisPwMassView.php'){
  $bread = ['Mass Powder', 'Report', 'Data Analysis', '양산 분말 분석 데이터 정리'];
} elseif ($uri == '#.php'){
  $bread = ['Lab Powder', 'Database', 'Manufacturing', 'Lab 분말 제조 조건'];
} elseif ($uri == 'conditionOfCoating.php'){
  $bread = ['Lab Powder', 'Database', 'Coating', 'Coating 조건'];
} elseif ($uri == 'analysisPw.php'){
  $bread = ['Lab Powder', 'Database', 'Analysis', 'Lab 분말 분석 데이터'];
} elseif ($uri == 'analysisPwView.php'){
  $bread = ['Lab Powder', 'Report', 'Data Analysis', 'Lab 분말 분석 데이터 정리'];
} elseif ($uri == 'recipe.php'){
  $bread = ['Paste', 'Database', 'Recipe', 'Paste 배합'];
} elseif ($uri == 'listofManu.php'){
  $bread = ['Paste', 'Database', 'List', 'Paste 제조 일지'];
} elseif ($uri == 'analysisPt.php'){
  $bread = ['Paste', 'Database', 'Analysis', 'Paste 분석 데이터'];
} else {
  $bread = ['Paste', 'Report', 'Data Analysis', 'Paste 분석 데이터 정리'];
}
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
