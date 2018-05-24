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
<center><h1> Customization </h1></center>
<br><br><br>
<hr>
<br>
<center><a href="insertdep.php"><button type="button"><font size="4">Insert New Department</font></button></a></certer>
<br>
<center><a href="showdep.php"><button type="button"><font size="4">Departments</font></button></a></certer>
<br>
<center><a href="set_time.php"><button type="button"><font size="4">Set Office Time</font></button></a></certer>
<br>
<center><a href="offtime.php"><button type="button"><font size="4">Office Time</font></button></a></certer>
<br>

 <center><a href = "Admin.php"><input id="cancel" type = "button" value ="Bake to Home"></a></center>

<br>
<hr>

  <div><footer>Copyright © Md. Erfan Ullah</footer></div>