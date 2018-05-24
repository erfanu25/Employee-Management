<br><br><br>
<font color="red"> <h1>Employee Management System </h1> </font>
<br><br><br>
<script type="text/javascript">
var tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
var d=new Date();
var nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
if(nyear<1000) nyear+=1900;

var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

document.getElementById('clockbox').innerHTML=""+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
}

window.onload=function(){
GetClock();
setInterval(GetClock,1000);
}
</script>
<script type="text/javascript" src="../js/time2.js"></script>
<div id="clockbox"></div>
<br><br><br>

<?php
require_once('functions/dbconfig.php');       
  require_once('functions/functions.php');            
  $obj = new cls_func();
  
  if (isset($_POST['submit']))
  {
    $username = addslashes("$_POST[username]");
    $password = addslashes("$_POST[password]");
    $level = addslashes("$_POST[level]");

    
      $result=$obj->check($username,$password,$level);
      $count = $result->num_rows;
      $row = $result->fetch_array();
    
    
 if ($count == 1){
      session_start();
      $_SESSION['ID']=$row['ID'];
      $_SESSION['username']=$row['username'];
      switch($level)
      {
        case 1:
        header('location:admin/Admin.php?ID='.$row['ID'].'');
        break;
        case 2:
        header('location:user/Admin.php?ID='.$row['ID'].'');
        break;

      }
      
      }
      else
      {
       echo '<font color="red"><center>Invalid Username or Password</center></font>';
        ;
        
      }
    }
  ?>  


<!doctype html>
<html>
<head>
<style>
pre{
    text-align: left;
}
h1 {
    text-align: center;
}
div {
    
    text-align: center;
  border-radius: 10px;
    background-color: rgba(256,356,265,0.3);
    padding: 60px;
  width:400px;
  margin: auto; 
}

div[class=footer]{
background: rgba(153, 255, 204, .3);color:midnightblue; text-align: center; height: 0px;  width:100%;}


h2 {
     color:blue;
}
button[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
button[type=submit]:hover {
    background-color: red;
}


</style>


</head>

<body background="back.jpg">


<div>
<h2> WELCOME </h2>
<br>
<br>
<form enctype="multipart/form-data" method="post" class="form-horizontal">
&nbsp;
&nbsp;
 <br> <br>
  <center><table>
  <tr><td>Username:</td><td><input type="text" name="username"></td></tr>
  <tr><td></td></tr>
  <tr><td>Password:</td><td><input type="password" name="password"></td></tr>
  <tr><td></td></tr>
  <center><tr><td>Type:</td><td><select required id="level" name="level">
  <option value="">None</option>
  <option value="1">Admin</option>
  <option value="2">Employee</option> 
  </td></tr></center>
</select>
  

   </table>
   </center>
<br> <br>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<br><br>
</body>
<div class="footer">
    <footer>Copyright © Md. Erfan Ullah </footer>
</div>
</html>