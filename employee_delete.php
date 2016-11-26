
<?php


									
                              
  $id = $_GET['id'];
  $delete = "DELETE FROM employee_details WHERE id = " . $id . " LIMIT 1";
  $delete = mysqli_query($this->connection,$delete);
 
echo json_encode($delete);

?>
