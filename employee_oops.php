
<?php
class database{
			 var $connection;
			 function __construct(){
				 $this->connection = new mysqli("192.168.0.63:3306", "vasanth", "SmartWork", "object_db");
			 }
				 function employee_insert(){
					 mysqli_query($this->connection,$query);
				 }
			 function employee_update(){
					 mysqli_query($this->connection,$sql);
				 }
				 function employee_edit(){
					 mysqli_query($this->connection,$selectData);
				 }
				  function employee_delete(){
					 mysqli_query($this->connection,$delete);
				 }
		 }
		 ?>