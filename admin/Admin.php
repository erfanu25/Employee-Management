<?php 
  
  require_once('../functions/dbconfig.php');        
  require_once('../functions/functions.php');           
  $obj = new cls_func();
    session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }

  
  $i=0;
  
?>

<script type="text/javascript" src="../js/time1.js"></script>
<span id=curTime></span>




<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="icon" href="blue.png" type="PNG">
<body>

<title>
Admin
</title>
<br><br><br><br>
<center><h1><font color="indigo">Admin Use</font></h1></center>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
<br>
<hr>
 
<br><br><br><br><br>

<center><a href="reg.php"><button type="button"><font size="4">Add Employee</font></button></a></certer>
<br><br>
<center><a href="profile.php"><button type="button"><font size="4">Employee Information by ID</font></button></a></certer>
<br><br>
<center><a href="information.php"><button type="button"><font size="4">All Employee Information</font></button></a></certer>
<br><br>
<center><a href="department.php"><button type="button"><font size="4">Department wise Information</font></button></a></certer>
<br><br>
<center><a href="atten.php"><button type="button"><font size="4">Employee Attendence Information</font></button></a></certer>
<br><br>

<center><a href="cust.php"><button type="button"><font size="4">Customization</font></button></a></certer>
<br><br> 
<center><a href = "../logout.php"><input id="cancel" type = "button" value ="Log Out"></a></center>
<br><br><br>

</body>
</html>

<br>
<hr>

 <div><footer>Copyright © Md. Erfan Ullah</footer></div>  


