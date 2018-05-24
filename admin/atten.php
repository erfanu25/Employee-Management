<?php 
	
	require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();

    session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
	
	
  
	
?>
<link rel="stylesheet" type="text/css" href="admin.css">
<br>
<center><h1> Employee Attendence Information </h1></center>
<br><br><br>
<hr>
<br>
<center><a href="daywise.php"><button type="button"><font size="4">Day wise Attendence</font></button></a></certer>
<br><br>
<center><a href="attrecord.php"><button type="button"><font size="4">All Attendence Record</font></button></a></certer>
<br><br>
<center><a href="latelist.php"><button type="button"><font size="4">Late List Record</font></button></a></certer>
<br><br>
<center><a href="early_leave.php"><button type="button"><font size="4">Early Leave Record</font></button></a></certer>
<br><br>

 <center><a href = "Admin.php"><input id="cancel" type = "button" value ="Bake to Home"></a></center>

 <br>
<hr>

 <center><footer>Copyright © Md. Erfan Ullah</footer></center>