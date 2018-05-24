<?php 
	
	require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();

    session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
	
	$qry=$obj->view_emp_info();
    
  
	$i=0;
?>
<link rel="stylesheet" type="text/css" href="admin.css">
<br>
<center><h1>All Employees Attendence Records</h1></center>
<br><br>
<a href = "attrecord_pdf.php"><input type="button" value="Get All Employee Attendence Record " ></a>
<br><br>
<table style="width:100%">
  <tr>
    <th>Employee ID</th>
    <th>Name</th> 
    <th>Total Work Day</th>
    <th>Total Late</th>
    <th>Total Early Leave</th>
    <th>Total present</th>
    <th>Total Absent</th>
    <th>Absent percentage</th>
    
  </tr>
<?php
  
  while($rec=$qry->fetch_assoc() )							
						{
  ?>
  <tr>
    <td><?php echo $rec['ID']; ?></td>
    <td><?php echo $rec['Name']; ?></td>
    <td><?php
     $wrk=$obj->total_workday();
     $tot=$wrk->fetch_assoc();
     echo $tot['Count(*)'];?></td>

     <td><?php
     $pre=$obj->total_late($rec['ID']);
     $late=$pre->fetch_assoc();
     echo $late['Count(*)']; ?> </td>

     <td><?php
     $pre=$obj->total_early($rec['ID']);
     $early=$pre->fetch_assoc();
     echo $early['Count(*)']; ?> </td>

    <td><?php
     $pre=$obj->total_attnd($rec['ID']);
     $att=$pre->fetch_assoc();
     echo $att['Count(*)']; ?></td>

     <td>
     	<?php
       echo $tot['Count(*)'] - $att['Count(*)']; ?> 
     </td>

     <td>
     <?php  $per=($tot['Count(*)'] -$att['Count(*)'])/$tot['Count(*)']*100; 
            echo round($per, 2),"%";    ?>
     </td>
    
  </tr>
  <?php
$i++;
						}
?>
  
  </table>
<br><br><br>
 
   <center><a href = "atten.php"><input id="cancel" type = "button" value ="Back"></a></center>

   <br>
<hr>

 <center><footer>Copyright © Md. Erfan Ullah</footer></center>