<?php
class cls_func{
	
	public function con(){
		$connect = new dbconfig();
		return $connect->connection();
	}
	// Functions for Attendence

	public function working_date($Date){
     	$result = $this->con()->query("INSERT INTO date(Date) VALUES('$Date')");
		return $result;
	}
	public function attendence($ID,$Date,$intime,$status){
     	$result = $this->con()->query("INSERT INTO attendence(ID,Date,intime,status) VALUES('$ID','$Date','$intime','$status')");
		return $result;
	}
	public function attendence_out($outtime,$ID,$leave_status){
     	$result = $this->con()->query("UPDATE attendence set outtime='$outtime', status2='$leave_status' where ID='$ID'");
		return $result;
	}
    public function check_a_given($ID,$Date){
		$result = $this->con()->query("SELECT * FROM `attendence` WHERE ID='$ID' and Date='$Date'");
		return $result;
	}
	public function late(){
		$result = $this->con()->query("SELECT * FROM `attendence` WHERE status='Late'");
		return $result;
	}
	public function early(){
		$result = $this->con()->query("SELECT * FROM `attendence` WHERE status2='Early Leave'");
		return $result;
	}
	public function check_out_count($ID,$Date){
		$result = $this->con()->query("SELECT outtime FROM attendence
        WHERE ID='$ID' and Date='$Date'and outtime IS NULL");
		return $result;
	}
	public function check_daywise($Date){
		$result = $this->con()->query("SELECT * FROM `attendence` WHERE  Date='$Date'");
		return $result;
	}
	public function get_emp_name($ID){
		$result = $this->con()->query("SELECT Name FROM `employee_info` WHERE  ID='$ID'");
		return $result;
	}


	// Function for Password

	public function set_password($ID,$Name,$password){
     	$result = $this->con()->query("INSERT INTO user(ID,username,password,level) VALUES('$ID','$Name','$password','2')");
		return $result;
	}
	public function view_password($ID){
		$result = $this->con()->query("SELECT password from user where ID='$ID'");
		return $result;
	}
	public function update_password($password,$ID){
		$result = $this->con()->query("UPDATE user set password='$password', level='2' where ID='$ID'");
		return $result;
	}
	
	


    public function get_dpname($dep_id){
		$result = $this->con()->query("SELECT NAME from department where dep_id='$dep_id'");
		return $result;
	}
	public function view_depwise_info($dep_id){
		$result = $this->con()->query("SELECT * from employee_info where dep_id='$dep_id'");
		return $result;
	}
	public function total_employee(){
		$result = $this->con()->query("SELECT COUNT(*) FROM `employee_info`");
		return $result;
	}
	
	//Count Functions 

	public function depwise_total_employee($dep_id){
		$result = $this->con()->query("SELECT COUNT(*) FROM `employee_info` WHERE dep_id='$dep_id'");
		return $result;
	}
	public function d_total_Male($dep_id){
		$result = $this->con()->query("SELECT Count(*) FROM `employee_info` WHERE Sex='Male' and dep_id='$dep_id'");
		return $result;
	}
	public function d_total_female($dep_id){
		$result = $this->con()->query("SELECT Count(*) FROM `employee_info` WHERE Sex='Female' and dep_id='$dep_id'");
		return $result;
	}
    public function total_Male(){
		$result = $this->con()->query("SELECT Count(*) FROM `employee_info` WHERE Sex='Male'");
		return $result;
	}
	public function total_female(){
		$result = $this->con()->query("SELECT Count(*) FROM `employee_info` WHERE Sex='Female'");
		return $result;
	}
	public function total_workday(){
		$result = $this->con()->query("SELECT Count(*) FROM `date`");
		return $result;
	}
	public function total_attnd($ID){
		$result = $this->con()->query("SELECT Count(*) FROM `attendence` WHERE ID='$ID'");
		return $result;
	}
	public function total_late($ID){
		$result = $this->con()->query("SELECT Count(*) FROM `attendence` WHERE ID='$ID' and status='Late'");
		return $result;
	}
	public function total_early($ID){
		$result = $this->con()->query("SELECT Count(*) FROM `attendence` WHERE ID='$ID' and status2='Early Leave'");
		return $result;
	}

	//SUM Functions
	
	public function total_salary(){
		$result = $this->con()->query("SELECT SUM(Salary) FROM `employee_info`");
		return $result;
	}
	public function depwise_total_salary($dep_id){
		$result = $this->con()->query("SELECT SUM(Salary) FROM `employee_info` WHERE dep_id='$dep_id'");
		return $result;
	}


	public function all_dep_info(){
		$result = $this->con()->query("SELECT * from department");
		return $result;
	}
	public function view_emp_info(){
		$result = $this->con()->query("SELECT * from employee_info");
		return $result;
	}

    // login function

	public function check($username,$password,$level){
		$result = $this->con()->query("SELECT * FROM `user` WHERE username='$username' and password='$password' and level='$level'");
		return $result;
	}

	//office time
	public function show_set_time(){
     	$result = $this->con()->query("SELECT * FROM office_time");
		return $result;
		}
	public function update_time($intime,$outtime){
     	$result = $this->con()->query("UPDATE office_time set intime='$intime', outtime='$outtime' where o_id='1'");
		return $result;
		}
    
	
    // insert,delete,update
     public function dep_insert($Name,$location,$dep_id){
     	$result = $this->con()->query("INSERT INTO department(NAME,LOCATION,dep_id) VALUES('$Name','$location','$dep_id')");
		return $result;
		}
	public function showdep(){
     	$result = $this->con()->query("SELECT * FROM department");
		return $result;
		}
	public function show_selected_dep($id){
     	$result = $this->con()->query("SELECT * FROM department where dep_id='$id'");
		return $result;
		}
	public function dep_up($Name,$location,$dep_id){
     	$result = $this->con()->query("UPDATE department set NAME='$Name', LOCATION='$location' where dep_id='$dep_id'");
		return $result;
		}
	public function delete_dep($dep_id){
     	$result = $this->con()->query("DELETE FROM department where dep_id='$dep_id'");
		return $result;
		}
		


	public function emp_insert($Name,$contact,$Email,$Adress,$Bdate,$Sex,$Salary,$dep_id,$pic){

        if ($pic == '') {
               $pic = "no_image.png";
            }

		$result = $this->con()->query("INSERT INTO employee_info(Name,contact,Email,Adress,Bdate,Sex,Salary,dep_id,pic) VALUES('$Name','$contact','$Email','$Adress','$Bdate','$Sex','$Salary','$dep_id','$pic')");
		return $result;
		}

	public function select_emp_id($Name){
		$result = $this->con()->query("SELECT ID from employee_info where Name='$Name'");
		return $result;
	}


	public function data_update($ID,$Name,$contact,$Email,$Adress,$Bdate,$Sex,$Salary,$dep_id,$pic){
		$result = $this->con()->query("UPDATE employee_info set Name='$Name', contact='$contact', Email='$Email', Adress='$Adress', Bdate='$Bdate', Sex='$Sex', Salary='$Salary', dep_id='$dep_id' , pic='$pic' WHERE ID='$ID'");
		return $result;
	}
	public function edit_personal_info($ID,$contact,$Email,$Adress){
		$result = $this->con()->query("UPDATE employee_info set contact='$contact', Email='$Email', Adress='$Adress'
		 WHERE ID='$ID'");
		return $result;
	}
	

    public function edit_emp_info($ID){
		$result = $this->con()->query("SELECT * from employee_info where ID='$ID'");
		return $result;
	}

	public function invidual_emp_info($ID){
		$result = $this->con()->query("SELECT * from employee_info where ID='$ID'");
		return $result;
	}

	public function delete_emp_info($ID){
		$result = $this->con()->query("DELETE from employee_info where ID='$ID'");
		return $result;
	}
	public function delete_emp_pass($ID){
		$result = $this->con()->query("DELETE from user where ID='$ID'");
		return $result;
	}
	


	// Search Query function
		public function search($query){
		$result = $this->con()->query("SELECT * FROM employee_info WHERE (ID LIKE '%".$query."%'
							OR `Name` LIKE '%".$query."%'
								OR `contact` LIKE '%".$query."%'
									OR `Email` LIKE '%".$query."%') order by id");
		return $result;
	}

	public function search_depwise($dep_id,$query){
		$result = $this->con()->query("SELECT * FROM employee_info WHERE dep_id='$dep_id' and (ID LIKE '%".$query."%'
							OR `Name` LIKE '%".$query."%'
								OR `contact` LIKE '%".$query."%'
									OR `Email` LIKE '%".$query."%') order by id");
		return $result;
	}



	}
	?>