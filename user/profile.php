<?php 
  
  require_once('../functions/dbconfig.php');        
  require_once('../functions/functions.php');           
  $obj = new cls_func();
  session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }


  $qry1=$obj->invidual_emp_info($_SESSION['ID']);
  $rec=$qry1->fetch_assoc();
  $qry2=$obj->view_password($_SESSION['ID']);
  $rec2=$qry2->fetch_assoc();
//echo $_SESSION['username'];
//echo $_SESSION['ID'];
    $pre=$obj->total_attnd($_SESSION['ID']);
    $wrk=$obj->total_workday();

  $i=0;
  
?>
<link rel="stylesheet" type="text/css" href="user.css">
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
 <hr>

 <center><form enctype="multipart/form-data" method="get" class="form-horizontal">
<table style="width:50%">
  <tr>
<center><h2>Your Information</h2></center>
  </tr>
  <tr><img id="logo_preview" src="../images/<?php echo $rec['pic']?>" style="height:150px; width:150px; border:2px green solid;"><br><br></tr>
  <tr>
    <th>Employee Name</th>
    <td><?php echo $rec['Name']; ?></td>
  </tr>
  <tr>
    <th>Contact</th>
    <td><?php echo $rec['contact']; ?></td>
  </tr>
    <tr>
    <th>Email</th>
    <td><?php echo $rec['Email']; ?></td>
  </tr>
  <tr>
    <th>Adress</th>
    <td><?php echo $rec['Adress']; ?></td>
  </tr>
  <tr>
    <th>Bdate</th>
    <td><?php echo $rec['Bdate']; ?></td>
  </tr>
  <tr>
    <th>Sex</th>
    <td><?php echo $rec['Sex']; ?></td>
  </tr>
  <tr>
    <th>Salary</th>
    <td><?php echo $rec['Salary']; ?></td>
  </tr>
  <tr>
   <th>Department</th>
   <?php $qqr=$obj->get_dpname($rec['dep_id']);
     $rrc=$qqr->fetch_assoc(); ?>
    <td><?php echo $rrc['NAME']; ?></td>
  </tr>
    <tr>
    <th>ID</th>
    <td><?php echo $rec['ID']; ?></td>
  </tr>
   <tr>
<th>Password</th>
  <td>

                                       
        <?php echo $rec2['password']; ?></td> <a href = "chng_pass.php"><input type = "button" value = "Update Information" ></a>           
                
</tr>
<tr>
  <th>Total Work Day<th>
  <?php
  $tot=$wrk->fetch_assoc();
   echo $tot['Count(*)']; ?> 
</tr>
<tr>
  <th>Total Present<th>
  <?php
  $att=$pre->fetch_assoc();
   echo $att['Count(*)']; ?> 
</tr>
<tr>
  <th>Total Absent<th>
  <?php
  
   echo $tot['Count(*)'] - $att['Count(*)']; ?> 
</tr>
</table>
</form>


<center><a href = "admin.php"><input id="cancel" type = "button" value ="Home"></a></center>

<br>
<hr>

 <div><footer>Copyright © Md. Erfan Ullah</footer></div>  