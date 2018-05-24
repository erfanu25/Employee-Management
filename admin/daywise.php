<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<center><h1> Day Wise information </h1></center>
<br><br>
<?php 
	
	require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();

    
	$i=0;
	if (isset($_POST['submit'])){
$firstdate = $_POST['firstdatepicker'];
//echo $firstdate;}
     $qry=$obj->check_daywise($firstdate);
     
    

?>




<h3> Information of <?php echo $firstdate; ?> </h3>
<table style="width:100%">
  <tr>
    <th>Employee ID</th>
    <th>Employee Name</th>
    <th>Intime</th> 
    <th>Outtime</th>
    <th>Status</th>
  </tr>
  <tr>
 <?php if($qry){ while($rec=$qry->fetch_assoc() )							
						{
  ?>
<td><?php echo $rec['ID']; ?></td>
<td><?php 
    $qry1=$obj->get_emp_name($rec['ID']);
    $rec1=$qry1->fetch_assoc();
    echo $rec1['Name']; ?></td>
    <td><?php echo $rec['intime']; ?></td>
    <td><?php echo $rec['outtime']; ?></td>
    <td><?php echo $rec['status']; ?></td>
    
 </tr>
 <?php
$i++;
						} }
						else
						{
							echo "enter";
						}
?>

<?php
}
?>
</table>




<center><form enctype="multipart/form-data" method="post" class="form-horizontal">
Inter date: <input type="date" id = "firstdatepicker" name = "firstdatepicker">
<button type="search" id="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<br><br><br><br>


 <center><a href = "atten.php"><input id="cancel" type = "button" value ="Back"></a></center>





</body>
</html>

<br>
<hr>

  <div><footer>Copyright © Md. Erfan Ullah</footer></div>