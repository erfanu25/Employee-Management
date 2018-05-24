<?php 
	
	require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();

    session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
	
	$qry=$obj->late();
    
  
	$i=0;
?>
<link rel="stylesheet" type="text/css" href="admin.css">
<br>
<center><h1>Employees All <font color="red">Late</font> Records</h1></center>

<br><br>

<table style="width:100%">
  <tr>
    <th>Employee ID</th>
    <th>Name</th> 
    <th>Date</th>
    <th>Status</th>
  </tr>
<?php
  
  while($rec=$qry->fetch_assoc() )							
						{
  ?>
  <tr>
    <td><?php echo $rec['ID']; ?></td>

    <td><?php 
    $qry1=$obj->get_emp_name($rec['ID']);
    $rec1=$qry1->fetch_assoc();
    echo $rec1['Name']; ?></td>

    <td><?php echo $rec['Date']; ?></td>
    <td><?php echo $rec['status']; ?></td>
    
  </tr>
  <?php
$i++;
						}
?>
  
  </table>
<br><br><br>
  
  <center><a href = "atten.php"><input id="cancel" type = "button" value ="Bake to Home"></a></center>

  <br>
<hr>

  <center><footer>Copyright © Md. Erfan Ullah</footer></center>