
<?php
require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();
  session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
	$qry=$obj->show_selected_dep($_GET['id']);
  $rec=$qry->fetch_assoc();
  
	if (isset($_POST['submit']))
	{
		
    
		$Name = addslashes("$_POST[Name]");
		$location = addslashes("$_POST[location]");
		$dep_id = $_GET['id'];
		

		
    
    $qry = $obj->dep_up($Name,$location,$dep_id);
      if ($qry){
        echo "Department Information Successfully Updated".'</br><a href = "showdep.php"><input type = "button" value = "View" ></a>';
          exit();
      }
      else{
        echo "not posted!";
        }   

	   
	}
?>
<link rel="stylesheet" type="text/css" href="admin.css">
<br><br>
<center><h2>Update Department Information</h2></center>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
  <hr>
<center><form enctype="multipart/form-data" method="post" class="form-horizontal">
<table style="width:70%">
  
  
  <tr>
    <th>Department Name</th>
    <td><input  name="Name" type="text" placeholder="Enter Name" value="<?php echo $rec['NAME']; ?>"></td>
  </tr>
  <tr>
    <th>Department Location</th>
    <td><input id="location" name="location" type="text" value="<?php echo $rec['LOCATION']; ?>"></td>
  </tr>
    <tr>
    <th>Department ID</th>
    <td><?php echo $rec['dep_id']; ?></td>
  </tr>
</table>
<button id="submit"  name="submit" class="btn btn-primary">Submit</button>
  <br>
  <a href = "showdep.php"><input type = "button" value = "Cancel" ></a>

</form>

</center>

<br>
<hr>

  <center><footer>Copyright © Md. Erfan Ullah</footer></center>