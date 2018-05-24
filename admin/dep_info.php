<?php
// Start the session
session_start();
?>
<?php 
	
	require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();

    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }

    $_SESSION["favcolor"] =$_GET['id'];
	$qry=$obj->view_depwise_info($_GET['id']);
    $qry1=$obj->get_dpname($_GET['id']);
    $rec=$qry1->fetch_assoc();
    //echo  $_SESSION["favcolor"];
    $id=$_GET['id'];
    $i=0;
    $qry2=$obj->depwise_total_employee($id);
    $qry3=$obj->depwise_total_salary($id);
    $qry4=$obj->d_total_female($id);
    $qry5=$obj->d_total_Male($id);

?>
<link rel="stylesheet" type="text/css" href="admin.css">



<center><h1><?php echo $rec['NAME']; ?> Department  Information</center> </h1>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
<form method="GET" action='search_dep_info.php?id='>
 

        <input type="text" name="query"  placeholder="Search Employee">
        <button type="search">Search</button>
    </form>
    <a href = "dep_list_pdf.php"><input type="button" value="Get All Employee List" ></a>
	<table style="width:100%">
  <tr>
    <th>Employee ID</th>
    <th>Name</th> 
    <th>Contact</th>
    <th>Email</th>
    <th>Adress</th>
    <th>Bdate</th>
    <th>Sex</th>
    <th>Salary</th>
    <th>Picture</th>
    <th>Department ID</th>
    <th>Actions</th>
  </tr>



  <?php
  while($rec=$qry->fetch_assoc())							
						{
  ?>
  <tr>
    <td><?php echo $rec['ID']; ?></td>
    <td><?php echo $rec['Name']; ?></td>
    <td><?php echo $rec['contact']; ?></td>
    <td><?php echo $rec['Email']; ?></td>
    <td><?php echo $rec['Adress']; ?></td>
    <td><?php echo $rec['Bdate']; ?></td>
    <td><?php echo $rec['Sex']; ?></td>
    <td><?php echo $rec['Salary']; ?></td>
    <td>
    <img id="logo_preview" src="../images/<?php echo $rec['pic'];?>" style="height:50px; width:50px; border:1px green solid;"><br><br>
    </td>
    <td><?php echo $rec['dep_id']; ?></td>
    <td><a href='edit.php?id=<?php echo $rec['ID']?>'> Edit</a>
    <a href='delete.php?id=<?php echo $rec['ID']?>'> Delete</a></td>

  </tr>
<?php
$i++;
						}
?>
<tr>
 <th><font size="4" > Total employee </font></th>
<th><font color="blue">
  <?php 
$rec=$qry2->fetch_assoc();
echo $rec['COUNT(*)'];
 ?></font>
  </th>
  <th><font size="4" > Total Salary </font></th>
  <th><font color="blue">
  <?php 
$rec=$qry3->fetch_assoc();
echo $rec['SUM(Salary)'];
 ?></font>
  </th>
  <th><font size="4" > Total Female Employee </font></th>
  <th><font color="blue">
  <?php 
$rec=$qry4->fetch_assoc();
echo $rec['Count(*)'];
 ?></font>
  </th>
  <th><font size="4" > Total Male Employee </font></th>
  <th><font color="blue">
  <?php 
$rec=$qry5->fetch_assoc();
echo $rec['Count(*)'];
 ?></font>
  </th>
  </tr>
</table>
</br>
<br><br>
<center><a href = "department.php"><input type = "button" value = "Back"></a></center>

<br>
<hr>

  <center><footer>Copyright © Md. Erfan Ullah</footer></center>

	
	
	


