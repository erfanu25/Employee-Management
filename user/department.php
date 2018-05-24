<?php
require_once('../functions/dbconfig.php');             
    require_once('../functions/functions.php');                        
    $obj = new cls_func();

    session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
    
    $qry=$obj->all_dep_info();
    $i=0;
?>

<link rel="stylesheet" type="text/css" href="user.css">
<title>
User
</title>
<br><br>
<center><h1> Departments</center> </h1>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
<br>
<hr>
    <table style="width:100%">

 <?php
  while($rec=$qry->fetch_assoc())                           
                        {
  ?>
<tr>
<a href='dep_info.php?id=<?php echo $rec['dep_id']?>'><center><button><?php echo $rec['NAME']; ?> </button></center> </a> 
 </tr>


<?php
$i++;
                        }
?>
</table>
<br>

<center><a href = "Admin.php"><input id="cancel" type = "button" value ="Bake to Home"></a></center>


<br><br><br><br><br>
<hr>

</html>
</body>

<br>
<hr>

 <div><footer>Copyright © Md. Erfan Ullah</footer></div>  
