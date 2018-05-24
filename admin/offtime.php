<?php
require_once('../functions/dbconfig.php');        
  require_once('../functions/functions.php');           
  $obj = new cls_func();
  session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
  $qry=$obj->show_set_time();
  $rec=$qry->fetch_assoc();
  
  
?>
<link rel="stylesheet" type="text/css" href="admin.css">
<br><br>
<center><h2>Office Time</h2></center>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
  <hr>
<center><form enctype="multipart/form-data" method="post" class="form-horizontal">
<table style="width:70%">
  
  
  <tr>
    <th>IN Time</th>
    <td><?php echo $rec['intime']; ?></td>
  </tr>
  <tr>
    <th>Out Time</th>
    <td><?php echo $rec['outtime']; ?></td>
  </tr>
   
</table>

  <br>
  <a href = "cust.php"><input type = "button" value = "Back" ></a>

</form>

</center>

<br>
<hr>

  <center><footer>Copyright © Md. Erfan Ullah</footer></center>
