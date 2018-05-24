

<?php
	class dbconfig{
		public function connection(){
			$conn = new mysqli("127.0.0.1","root","","employee");
			return $conn;
		}
	}
?> 