<?php 
  
  require_once('../functions/dbconfig.php');        
  require_once('../functions/functions.php');           
  $obj = new cls_func();
    session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');}

  //echo $_SESSION['username'];
  $i=0;
  
?>

<script type="text/javascript" src="../js/time1.js"></script>
<span id=curTime></span>


<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="user.css">
<title>
User
</title>
<br><br><br>

<center><h1><font color="indigo">Employee Use</font></h1></center>

 <font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
 <hr>
<br><br>

<font color="blue"><center><h2><?php echo "Wellcome ".$_SESSION['username']; ?></h2></center></font>
<br><br><br>
<center><a href="profile.php?"><button type="button"><font size="4">Watch your Profile</font></button></a></certer>
<br><br>
<center><a href="attendence.php"><button type="button"><font size="4">Give attendence</font></button></a></certer>
<br><br>
<center><a href="information.php"><button type="button"><font size="4">All Employee Information</font></button></a></certer>
<br><br>
<center><a href="department.php"><button type="button"><font size="4">Departments</font></button></a></certer>
<br><br><br><br>
<center><a href = "../logout.php"><input id="cancel" type = "button" value ="Log Out"></a></center>

<br><br><br><br><br>


</html>
</body>

<br>
<hr>

 <div><footer>Copyright © Md. Erfan Ullah</footer></div>  
