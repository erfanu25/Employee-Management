<?php
require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();


$qry=$obj->delete_dep($_GET['id']);
if($qry)
{
	echo"Delete Successful".'</br><a href = "showdep.php"><input type = "button" value = "View" ></a>';
}
?>
<link rel="stylesheet" type="text/css" href="admin.css">

<br>
<hr>

  <div><footer>Copyright © Md. Erfan Ullah</footer></div>