<?php 
	
	require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();

   session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }

	$i=0;
?>

<?php
$query = $_GET['query'];
$min_length = 1;
if(strlen($query) >= $min_length){
  $query = htmlspecialchars($query);
    $query = $obj->con()->real_escape_string($query);
    $qry = $obj->search($query);
    $res=$qry->num_rows;
  if($res > 0){
?>

<link rel="stylesheet" type="text/css" href="user.css">

<center><h1>All Employee Information</center> </h1>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>

	<table style="width:100%">
  <tr>
    <th>Employee ID</th>
    <th>Name</th> 
    <th>Contact</th>
    <th>Email</th>
    <th>Adress</th>
    
    <th>Sex</th>
    
     <th>Picture</th>
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
    
    <td><?php echo $rec['Sex']; ?></td>
   
    <td>
    <img id="logo_preview" src="../images/<?php echo $rec['pic'];?>" style="height:50px; width:50px; border:1px green solid;"><br><br>
    </td>

  </tr>
<?php
$i++;

        }
        }
        else 
          {
            echo "<h2>No results<h2>";
          }
        }
        else
          {
            echo "<font color='red' size='5'>Insert at least one Charecter</font>";
          }
      ?>
</table>
</br>

<center><a href = "information.php"><input type = "button" value = "Back"></a></center>

<br>
<hr>

 <div><footer>Copyright © Md. Erfan Ullah</footer></div>  
