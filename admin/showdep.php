<?php 
	
	require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();

    session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
	
	$qry=$obj->showdep();
  
	$i=0;
?>
<link rel="stylesheet" type="text/css" href="admin.css">


<center><h1>All Departments</center> </h1>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
<hr>

    
	<center><table style="width:80%" >
  <tr>
    <th>Deparment Name</th>
     <th>Location</th>
    <th>Department ID</th> 
     <th>Actions</th>
  </tr>



  <?php
  
  while($rec=$qry->fetch_assoc() )							
						{
  ?>
  <tr>
    <td><?php echo $rec['NAME']; ?></td>
    <td><?php echo $rec['LOCATION']; ?></td>
    <td><?php echo $rec['dep_id']; ?></td>
    <td><a href='updep.php?id=<?php echo $rec['dep_id']?>'>Update</a> <a href='dep_delet.php?id=<?php echo $rec['dep_id']?>'> Delete</a></td>

  </tr>

<?php
$i++;
						}
?>
 
</table></center>

 
<br><br>
<center><a href = "cust.php"><input type = "button" value = "Back"></center></a>

<br>
<hr>

  <center><footer>Copyright © Md. Erfan Ullah</footer></center>