
 <link rel="stylesheet" href="../plugins/file-uploader/css/jquery.fileupload.css">
<link rel="stylesheet" href="../plugins/file-uploader/css/jquery.fileupload-ui.css">
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>

 <script>
    function PreviewImage(upname, prv_id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementsByName(upname)[0].files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById(prv_id).src = oFREvent.target.result;
        };
    };
  
</script>

<?php
require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();
  $qry1=$obj->edit_emp_info($_GET['id']);
  $rec=$qry1->fetch_assoc();
  $qrry=$obj->view_password($rec['ID']); 
  $rec1=$qrry->fetch_assoc();
	
  $qry3=$obj->showdep();
  $i=0;

	if (isset($_POST['submit']))
	{
     function guid() {
     if (function_exists('com_create_guid')) {
                return com_create_guid();
            } else {
                mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
                $charid = strtoupper(md5(uniqid(rand(), true)));
                $hyphen = chr(45); // "-"
                $uuid = chr(123)// "{"
                        . substr($charid, 0, 8) . $hyphen
                        . substr($charid, 8, 4) . $hyphen
                        . substr($charid, 12, 4) . $hyphen
                        . substr($charid, 16, 4) . $hyphen
                        . substr($charid, 20, 12)
                        . chr(125); // "}"
                return $uuid;
            }
  }
    if($_FILES["personal_image"]["name"])
    {
          $path_parts = pathinfo($_FILES["personal_image"]["name"]);
                      $ext = $path_parts['extension'];
                      $pic = trim(guid(), '{}') . '.' . $ext;
    }
    else {$pic = $rec['pic'];}


move_uploaded_file($_FILES['personal_image']['tmp_name'], "../images/$pic");


		$ID = addslashes("$_POST[ID]");
		$Name = addslashes("$_POST[Name]");
		$contact = addslashes("$_POST[contact]");
		$Email = addslashes("$_POST[Email]");
		$Adress = addslashes("$_POST[Adress]");
		$Bdate = addslashes("$_POST[Bdate]");
		$Sex = addslashes("$_POST[Sex]");
		$Salary = addslashes("$_POST[Salary]");
		$dep_id = addslashes("$_POST[dep_id]");
    $password = addslashes("$_POST[password]");

		
    $qry1 = $obj->update_password($password,$ID);
		$qry = $obj->data_update($ID,$Name,$contact,$Email,$Adress,$Bdate,$Sex,$Salary,$dep_id,$pic);
			if ($qry==$qry1){
				echo "Successfully Updated".'</br><a href = "information.php"><input type = "button" value = "View" ></a>';
					exit();
			}
			else{
				echo "not posted!";
				}
	}
?>
<link rel="stylesheet" type="text/css" href="admin.css">




<center><form enctype="multipart/form-data" method="post" class="form-horizontal">
<table style="width:50%">
  <tr>
<center><h2>Edit Employee Information</h2></center>
  </tr>
  
  <tr>
    <th>Employee Name</th>
    <td><input id="Name" name="Name" type="text" value="<?php echo $rec['Name']; ?>" placeholder="Enter Name" required=""></td>
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
    <td><input id="Bdate" name="Bdate" type="date" value="<?php echo $rec['Bdate']; ?>"></td>
  </tr>
  <tr>
    <th>Sex</th>
    <td><select required id="Sex" name="Sex">
    <option value="<?php echo $rec['Sex']; ?>"><?php echo $rec['Sex']; ?></option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select></td>
  </tr>
  <tr>
    <th>Salary</th>
    <td><input id="Salary" name="Salary" type="text" value="<?php echo $rec['Salary']; ?>"></td>
  </tr>
    <tr>
    <th>Department</th>
    <td><select required id="dep_id" name="dep_id">
    <option value="<?php echo $rec['dep_id']; ?>"><?php echo $rec['dep_id']; ?></option>
     <?php
  
  while($con=$qry3->fetch_assoc() )              
            {
  ?>
    <option value="<?php echo $con['dep_id']; ?>"><?php echo $con['NAME']; ?></option> 
    <?php
$i++;
            }
?>
    </select></td>
   
  </tr>
    <tr>
    <th>ID</th>
    <td><input id="ID" name="ID" type="text" value="<?php echo $rec['ID']; ?>"</td>
  </tr>
   <tr>
<th>Picture</th>
  <td>

                    <img id="logo_preview" src="../images/<?php echo $rec['pic']?>" style="height:150px; width:150px; border:2px green solid;"><br><br>                   
                    <input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')">
                    <br><br>
                    

</td>
</tr>
<tr>
    <th>Password</th>
    <td><input id="password" name="password" type="text" value="<?php echo $rec1['password']; ?>"></td>
  </tr>
</table>
<button id="submit" name="submit" class="btn btn-primary">Submit</button>
  <br>
  <a href = "Admin.php"><input type = "button" value = "Cancel" ></a>
  

</form>
</center>

<br>
<hr>

  <center><footer>Copyright © Md. Erfan Ullah</footer></center>
