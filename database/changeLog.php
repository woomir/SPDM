<?php session_start();
   require_once('../lib/top.php');
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){
   settype($_SESSION['role_id'],'int');
   require_once('../lib/menu.php');
?>

<div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="card mb-3">
            
          <div class="card-body">
            <div class="row justify-content-between">
              <div class="col-4">
                <h3>Change Log</h3>
                <hr>
                <br>
                <strong>2019-06-21</strong>
                <ul>
                  <li>Add web page : Data Analysis - Wash.</li>
                </ul>
                <strong>2019-06-18</strong>
                <ul>
                  <li>Add web page : Chang Log.</li>
                </ul>
                <strong>2019-06-16</strong>
                <ul>
                  <li>Add file upload system - Mass powder.</li>
                </ul>
                <strong>2019-06-15</strong>
                <ul>
                  <li>Add web page : Washing (Lab). </li>
                </ul>
                <strong>2019-06-12</strong>
                <ul>
                  <li>Protect data from deletion.</li>
                </ul>
                <strong>2019-06-07</strong>
                <ul>
                  <li>Add file upload system - Paste.</li>
                </ul>
                <strong>2019-05-17</strong>
                <ul>
                  <li>Add file upload system - Lab powder.</li>
                </ul>
                <strong>2019-04-08</strong>
                <ul>
                  <li>Add web page : Information of Users.</li>
                  <li>Add web page : Information of Login.</li>
                </ul>
                <strong>2019-03-22</strong>
                <ul>
                  <li>Add web page : Data analysis of Lab powder.</li>
                  <li>Add web page : Data analysis of Mass powder.</li>
                </ul>
                <strong>2019-03-21</strong>
                <ul>
                  <li>Change the menu style.</li>
                </ul>
                <strong>2019-03-18</strong>
                <ul>
                  <li>Open Site.</li>
                </ul>
              </div>
            </div> <br>

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

<?php
require_once('../lib/script_src.php');
?>


<script type="text/javascript">


</script>
