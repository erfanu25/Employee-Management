<?php
require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();


$qry=$obj->delete_emp_info($_GET['id']);
$qry1=$obj->delete_emp_pass($_GET['id']);
if($qry == $qry1)
{
	echo"Delete Successful".'</br><a href = "information.php"><input type = "button" value = "View" ></a>';
}
?>
<link rel="stylesheet" type="text/css" href="admin.css">

<br>
<hr>

  <div><footer>Copyright © Md. Erfan Ullah</footer></div>

