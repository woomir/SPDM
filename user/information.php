<?php session_start();
   require_once('../lib/top.php');
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){
   settype($_SESSION['role_id'],'int');
   require_once('../lib/menu.php'); 
   ?>

<div class="table-responsive">
   <div id="alert_message"></div>
  <table id="PasteTable" class="table table-bordered table-striped table-sm table-hover" style="width: 100%;">
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
</div>

<?php
  require_once('../lib/bottom.php');
}else{
  require_once('../lib/invalid_access.php');
}
?>