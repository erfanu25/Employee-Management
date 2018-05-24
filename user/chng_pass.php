<?php 
  
  require_once('../functions/dbconfig.php');        
  require_once('../functions/functions.php');           
  $obj = new cls_func();
  session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
    $qry1=$obj->edit_emp_info($_SESSION['ID']);
    $rec=$qry1->fetch_assoc();

    $qry1=$obj->view_password($_SESSION['ID']);
    $rec1=$qry1->fetch_assoc();

    if (isset($_POST['submit']))
	{
		$password = addslashes("$_POST[Password]");

    $contact = addslashes("$_POST[contact]");
    $Email = addslashes("$_POST[Email]");
    $Adress = addslashes("$_POST[Adress]");

        $qry3=$obj->edit_personal_info($_SESSION['ID'],$contact,$Email,$Adress);
        $qry2=$obj->update_password($password,$_SESSION['ID']);

        if ($qry2 == $qry3){
        echo "Information Successfully Updated".'</br><a href = "profile.php"><input type = "button" value = "View" ></a>';
          exit();
      }
    }

 ?>
 
<link rel="stylesheet" type="text/css" href="user.css">
<br><br>
<center><h2>Update Your Profile</h2></center>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
 <br>
 <hr>
 <br>

 <center><form enctype="multipart/form-data" method="post" class="form-horizontal">
<table style="width:50%">
  <tr>
    <th>Employee Name</th>
    <td><?php echo $rec['Name']; ?></td>
  </tr>
  <tr>
    <th>Contact</th>
    <td><input id="contact" name="contact" type="text" value="<?php echo $rec['contact']; ?>"></td>
  </tr>
    <tr>
    <th>Email</th>
    <td><input id="Email" name="Email" type="text" value="<?php echo $rec['Email']; ?>"></td>
  </tr>
  <tr>
    <th>Adress</th>
    <td><input id="Adress" name="Adress" type="text" value="<?php echo $rec['Adress']; ?>"></td>
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
  <th>Old Password </th>
  <td><?php echo $rec1['password']; ?></td>
  </tr>
  <tr>
  <th>New Password </th>
  <td><input id="Password" name="Password" type="text" value="<?php echo $rec1['password']; ?>"></td>
  </tr>
  </table>
  <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  <a href = "profile.php"><input type = "button" value = "Cancel" ></a>
  </form>

  <br>
<hr>

 <div><footer>Copyright © Md. Erfan Ullah</footer></div>  
