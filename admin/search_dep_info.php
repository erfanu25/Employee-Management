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

     $qry1=$obj->get_dpname($_SESSION["favcolor"]);
    $rec=$qry1->fetch_assoc();
    //echo $_SESSION["favcolor"];
	
	$i=0;
    
?>


<?php
$query = $_GET['query'];
$min_length = 1;
if(strlen($query) >= $min_length){
  $query = htmlspecialchars($query);
    $query = $obj->con()->real_escape_string($query);
    $qry = $obj->search_depwise($_SESSION["favcolor"],$query);
    $res=$qry->num_rows;
  if($res > 0){
?>

<link rel="stylesheet" type="text/css" href="admin.css">

<center><h1><?php echo $rec['NAME']; ?> Department  Information</center> </h1>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
<form method="GET" action="search_dep_info.php">

        <input type="text" name="query" placeholder="Search Employee">

        <button type="submit">Search</button>
    </form>
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
    <td><a href='edit.php?id=<?php echo $rec['ID']?>'> Edit</a></td>
    <td><a href='delete.php?id=<?php echo $rec['ID']?>'> Delete</a></td>

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
            echo "Insert at least one Charecter";
          }
      ?>
</table>
</br>
<br><br>
<center><a href = 'dep_info.php?id=<?php echo $_SESSION["favcolor"]?>'><input type = "button" value = "Back"></a></center>

<br>
<hr>

  <center><footer>Copyright © Md. Erfan Ullah</footer></center>

