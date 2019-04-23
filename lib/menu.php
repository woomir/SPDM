<style>
header {
  background-color:#ffde00; 
  height:60px;
  padding: 0px 0px;
  width: 100%;
  top: 0;
  left: 0;
  position: fixed;
  z-index: 1000;
  display: block;
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
  top: 10px;  
  height: 50px;
  position: relative;
  padding-left: 20px;

}

ul.action-list{
  display: inline-block;
  list-style: none;
  top: 10px;
  right: 10px;
  margin: 0;
  height: 50px;
  position: relative;
  float: right;
}
li.action{
  display: block;
  float: left;
  position: relative;
  height: 40px;
  margin: 0;
  padding: 5px 8px;
}

#logoutbtn{
  height: 30px;
}

#useridcss{
  font-weight:600;
  position: relative;
  top: 2px;
}

#userDropdown{
  color:black;
}

#wrapper{
  position: absolute; 
  top: 120px; 
  width: 100%;
}

.nav-item:hover{
  background-color: #3C3B3B;
}
.nav-link:active{
  color: #ffde00;
}

#menuNavbar{
  background-color: #333;
  top: 60px;
  z-index: 70;
  position: fixed;
  width: 100%;
  left: 0;
  height: 45px;
  padding: 0px 0px;
}

#navbarMenu{
  padding: 0px 15px;
  margin: 0;
}

#menuHome{
  width: 100px; 
  padding: 10px 10px;
  margin: 0px 10px 0px 10px;
}

#menuMasspowder{
  width: 160px; 
  padding: 10px 10px;
  margin: 0px 10px 0px 10px;
}
#menuLabpowder{
   width: 145px; 
   padding: 10px 10px;
   margin: 0px 10px 0px 10px;
}
#menuPaste{
  width: 110px; 
  padding: 10px 10px;
  margin: 0px 10px 0px 10px;
}

#menuAdmin{
  width: 160px;
  padding: 10px 10px;
  margin: 0px 10px 0px 10px;
}


.navbar-nav > li > .dropdown-menu{
  background-color: #333;
}

.navbar-nav > li > .dropdown-menu > a.dropdown-item:hover {
  background-color: #3C3B3B;
}

.navbar-nav > li.nav-item.dropdown.active.show>a{
  color: #ffde00;
}

li > .dropdown-menu > .dropdown-item{
  color: #F8F8FF;
}
li > .dropdown-menu > .dropdown-item:hover{
  color: #F8F8FF;
}

</style>

<body id="page-top">
  <header class="site-header">
    <a href="#" class="brand-main">
      <i class="fas fa-database" ></i>
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
        <div id="useridcss"><?php echo $_SESSION['id']." : ".$_SESSION['role'];?></div>
      </li>
      <li class="action">
        <div style="position: relative; top: 2px;"> 
          <a class="" href="#" id="userDropdown" role="button" data-toggle="tooltip" data-placement="bottom" title="Password Change" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i>
          </a>
        </div>
      </li>
      <li class="action">
          <button id="logoutbtn" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#logoutModal">Logout</button>
      </li>
    </ul>
  </header>   

  <nav id="menuNavbar" class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarMenu">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a id="menuHome" class="nav-link" href="#" >
          <i class="fas fa-home"></i>&nbsp;&nbsp;Home</a>
      </li>
      <li id="liMasspowder" class="nav-item dropdown active">
        <a id="menuMasspowder" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
      <li id="liLabpowder" class="nav-item dropdown active">
        <a id="menuLabpowder" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-flask"></i>&nbsp;&nbsp;Lab powder
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <h6 class="dropdown-header">Database</h6>
          <a class="dropdown-item" href=#>Manufacturing</a>
          <a class="dropdown-item" href="labCoating.php">Coating</a>
          <a class="dropdown-item" href="analysisPwlab.php">Analysis</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Report</h6>
          <a class="dropdown-item" href="analysisPwlabView.php">Data Analysis</a>
        </div>
      </li>
      <li id="liPaste" class="nav-item dropdown active">
        <a id="menuPaste" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
      <?php if ($_SESSION['role_id']==1){ ?>
      <li id="liAdmin" class="nav-item dropdown active">
        <a id="menuAdmin" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-friends"></i>&nbsp;&nbsp;Administrator
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="users.php">가입자 정보</a>
          <a class="dropdown-item" href="login_log.php">로그인 정보</a>
        </div>
      </li>
      <?php } ?>
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
} elseif ($uri == 'labCoating.php'){
  $bread = ['Lab Powder', 'Database', 'Coating', 'Coating 조건'];
} elseif ($uri == 'analysisPwlab.php'){
  $bread = ['Lab Powder', 'Database', 'Analysis', 'Lab 분말 분석 데이터'];
} elseif ($uri == 'analysisPwlabView.php'){
  $bread = ['Lab Powder', 'Report', 'Data Analysis', 'Lab 분말 분석 데이터 정리'];
} elseif ($uri == 'recipe.php'){
  $bread = ['Paste', 'Database', 'Recipe', 'Paste 배합'];
} elseif ($uri == 'listofManu.php'){
  $bread = ['Paste', 'Database', 'List', 'Paste 제조 일지'];
} elseif ($uri == 'analysisPt.php'){
  $bread = ['Paste', 'Database', 'Analysis', 'Paste 분석 데이터'];
} elseif ($uri == 'analysisPtView.php'){
  $bread = ['Paste', 'Report', 'Data Analysis', 'Paste 분석 데이터 정리'];
} elseif ($uri == 'users.php') {
  $bread = ['Admin', '가입자 정보', '', '가입자 정보'];
} else {
  $bread = ['Admin', '로그인 정보', '', '로그인 정보'];
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
