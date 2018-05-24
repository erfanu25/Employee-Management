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
  session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }

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

move_uploaded_file($_FILES['personal_image']['tmp_name'], "../images/$pic");




		$Name = addslashes("$_POST[Name]");
		$contact = addslashes("$_POST[contact]");
		$Email = addslashes("$_POST[Email]");
		$Adress = addslashes("$_POST[Adress]");
		$Bdate = addslashes("$_POST[Bdate]");
		$Sex = addslashes("$_POST[Sex]");
		$Salary = addslashes("$_POST[Salary]");
		$dep_id = addslashes("$_POST[dep_id]");
    $password = addslashes("$_POST[password]");

    $qry = $obj->emp_insert($Name,$contact,$Email,$Adress,$Bdate,$Sex,$Salary,$dep_id,$pic);

    
    $qry2 = $obj->select_emp_id($Name);
    $rec2=$qry2->fetch_assoc();

    $qry1 = $obj->set_password($rec2['ID'],$Name,$password);
      if ($qry1==$qry){
        echo "Information and password Successfully Inserted".'</br><a href = "information.php"><input type = "button" value = "View" ></a>';
          exit();
      }
      else{
        echo "not posted!";
        }   

		


     
	}
?>
<link rel="stylesheet" type="text/css" href="admin.css">
<br><br>
<center><h2>Input Employee Information</h2></center>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
  <hr>
<center><form enctype="multipart/form-data" method="post" class="form-horizontal">
<table style="width:50%">
  
  
  <tr>
    <th>Employee Name</th>
    <td><input  name="Name" type="text" placeholder="Enter Name" required=""></td>
  </tr>
  <tr>
    <th>Contact</th>
    <td><input id="contact" name="contact" type="text"></td>
  </tr>
    <tr>
    <th>Email</th>
    <td><input id="email" name="Email" type="text"></td>
  </tr>
  <tr>
    <th>Adress</th>
    <td><input id="Adress" name="Adress" type="text"></td>
  </tr>
  <tr>
    <th>Bdate</th>
    <td><input id="Bdate" name="Bdate" type="date"></td>
  </tr>
  <tr>
   
    <th>Sex</th>
    <td><select required id="Sex" name="Sex">
    <option value="">None</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select></td>
  </tr>
  <tr>
    <th>Salary</th>
    <td><input id="Salary" name="Salary" type="text"></td>
  </tr>
 
  <tr>
    <th>Department</th>
    <td><select required id="dep_id" name="dep_id">
     <?php
  
  while($rec=$qry3->fetch_assoc() )              
            {
  ?>
    <option value="<?php echo $rec['dep_id']; ?>"><?php echo $rec['NAME']; ?></option> 
    <?php
$i++;
            }
?>
    </select></td>
   
  </tr>
  <tr>
<th>Picture</th>
  <td>

                    <img id="logo_preview" src="../images/no_image.png" style="height:150px; width:150px; border:2px green solid;"><br><br>                   
                    <input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')">
                    <br><br>
                    

</td>
</tr>
<tr>
    <th>Password</th>
    <td><input id="password" name="password" type="text"></td>
  </tr>
</table>
<button id="submit" width= "20%" name="submit" class="btn btn-primary">Submit</button>
  <br>
  <a href = "Admin.php"><input type = "button" value = "Cancel" ></a>

</form>
</center>

<br>
<hr>

  <center><footer>Copyright © Md. Erfan Ullah</footer></center>