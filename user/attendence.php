<center><script type="text/javascript" src="../js/time1.js"></script>
<span id="curTime"></span></center>
<link rel="stylesheet" type="text/css" href="user.css">
<?php 
	session_start();
    if (!isset($_SESSION['ID'])){
    header('location:../index.php');
    }
	require_once('../functions/dbconfig.php');				
	require_once('../functions/functions.php');						
	$obj = new cls_func();
  
   $time=$obj->show_set_time();
   $office=$time->fetch_assoc();
   
    
    if (isset($_POST['submit']))
	{
		$ID = $_SESSION['ID'];
		date_default_timezone_set("Asia/Dhaka");
		$Date = date("Y-m-d");
		date_default_timezone_set("Asia/Dhaka");
		$intime = date("H:i:sa");
		
    $result=$obj->check_a_given($ID,$Date);
    $count = $result->num_rows;
    $qry1 = $obj->working_date($Date);
    //$row = $result->fetch_array();


      if ($count == 0){
      	if( $office['intime'] >= $intime)
      	{
      		echo "<div><center>You are One Time</center></div>";
      		$status = "Ontime";
      	}
      	else
      	{
      		echo '<div><font color="red"><center>!!!You Are LATE!!!</center></font></div>';
      		$status = "Late";
      	}
      $qry = $obj->attendence($ID,$Date,$intime,$status);
			if ($qry){
				echo '<div><font color="blue"><center>Successfully Inserted</center></font></div>';
					
			}
			else{
				echo "not posted!";
				}
      
      }
      else
      {
       echo '<div><font color="blue"><center>Already Given</center></font></div>';
        ;
        
      }
		
	}





    if (isset($_POST['logout']))
	{
		$ID = $_SESSION['ID'];
		date_default_timezone_set("Asia/Dhaka");
		$Date = date("Y-m-d");
		date_default_timezone_set("Asia/Dhaka");
		$outtime = date("H:i:sa");
		
    $result=$obj->check_a_given($ID,$Date);
    $count = $result->num_rows;
    $r2=$obj->check_out_count($ID,$Date);
    $count2 = $r2->num_rows;
    //$row = $result->fetch_array();


      if ($count == 1 )
      {
      	if ($count2 == 1)
      	{
          if( $office['outtime'] <= $outtime)
        {
          echo "<div><center>You Left Timely</center></div>";
          $leave_status = "Ontime";
        }
        else
        {
          echo '<div><font color="red"><center>!!!You Left Early!!!</center></font></div>';
          $leave_status = "Early Leave";
        }
            $qry = $obj->attendence_out($outtime,$ID,$leave_status);
			if ($qry){
				echo '<div><font color="red"><center>Successfully Inserted Check Out information</center></font></div>';
					
			}
			else{
				echo "not posted!";
				}
		}
			else{
				  echo '<div><font color="red"><center>Already Check Out</center></font></div>';
			    }	
      
      }
      else
      {
       echo '<div><font color="red"><center>Check In First</center></font></div>';
        ;
        
      }

}

?>


<br>
<center><h1>Daily Time Record</center> </h1>
<font color="red"><center><h4><?php echo "login as ".$_SESSION['username']; ?></h4></center></font>
<br>
<hr>



<center><form enctype="multipart/form-data" method="post" class="form-horizontal">
<button type="in" id="submit" name="submit" class="btn btn-primary">Check In</button></form></center>

<center><form enctype="multipart/form-data" method="post" class="form-horizontal">
<button type="out" id="logout" name="logout" class="btn btn-primary">Check Out</button>
</form></center>

<center><a href="Admin.php?"><button type="button"><font size="4">Back to Home</font></button></a></certer>

<br>
<hr>

 <div><footer>Copyright © Md. Erfan Ullah</footer></div>  