<?php session_start();
   require_once('../lib/top.php');
 if(isset($_SESSION['id']) && isset($_SESSION['password'])){
   settype($_SESSION['role_id'],'int');
   require_once('../lib/menu.php');
?>

<div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="card mb-5">
            
          <div class="card-body">
            <div class="row justify-content-between">
              <div class="col-5">
                <h3>Change Log</h3>
                <hr>
                <br>
                <strong>2019-08-03</strong>
                <ul>
                  <li>Add function of filtering product name at mass table</li>
                </ul>
                <strong>2019-07-31</strong>
                <ul>
                  <li>Add column (date) to manufacturing table of mass powder</li>
                  <li>Sorting data of mass powder into powder type </li>
                </ul>
                <strong>2019-07-11</strong>
                <ul>
                  <li>Add function of fixed header at all tables</li>
                  <li>Change position of menu-bar to relative</li>
                  <li>Add page : Archive </li>
                </ul>
                <strong>2019-07-07</strong>
                <ul>
                  <li>Add function of selecting previous data at insert Form</li>
                  <ol>
                    <li>Mass powder - Manufacturing</li>
                    <li>Lab powder - Reaction, Wash, Coating</li>
                    <li>Paste - List</li>
                  </ol>
                </ul>
                <strong>2019-07-06</strong>
                <ul>
                  <li>Add page : Data Analysis - Reaction</li>
                </ul>
                <strong>2019-06-30</strong>
                <ul>
                  <li>Add page : Reaction of Lab powder</li>
                  <li>Add page : AgNO<sub>3</sub></li>
                </ul>
                <strong>2019-06-21</strong>
                <ul>
                  <li>Add page : Data Analysis - Wash</li>
                </ul>
                <strong>2019-06-18</strong>
                <ul>
                  <li>Add page : Chang Log</li>
                </ul>
                <strong>2019-06-16</strong>
                <ul>
                  <li>Add file upload system - Mass powder</li>
                </ul>
                <strong>2019-06-15</strong>
                <ul>
                  <li>Add page : Washing (Lab)</li>
                </ul>
                <strong>2019-06-12</strong>
                <ul>
                  <li>Protect data from deletion</li>
                </ul>
                <strong>2019-06-07</strong>
                <ul>
                  <li>Add file upload system - Paste</li>
                </ul>
                <strong>2019-05-17</strong>
                <ul>
                  <li>Add file upload system - Lab powder</li>
                </ul>
                <strong>2019-04-08</strong>
                <ul>
                  <li>Add page : Information of Users</li>
                  <li>Add page : Information of Login</li>
                </ul>
                <strong>2019-03-22</strong>
                <ul>
                  <li>Add page : Data analysis of Lab powder</li>
                  <li>Add page : Data analysis of Mass powder</li>
                </ul>
                <strong>2019-03-21</strong>
                <ul>
                  <li>Change the menu style</li>
                </ul>
                <strong>2019-03-18</strong>
                <ul>
                  <li>Open Site</li>
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
